<?php

namespace App\Http\Controllers;

use App\Mail\NSTApplicationIsAwaitingYourApproval;
use App\Mail\NSTApplicationUpdate;
use App\Registration;
use Facades\App\Log;
use Illuminate\Http\Request;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade as PDF;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['activated'])->only('index');
    }

    public function company()
    {
        $registration = auth()->user()->registration;

        return view('registration-form',compact('registration'));
    }

    public function completeRegistration(Request $request)
    {
        $data = $request->except('_token','terms');

        $data['place_of_businesses'] = serialize($data['place_of_businesses']);

        if(auth()->user()->seedCompany()) {
            $data['name_of_proprietors'] = serialize($data['name_of_proprietors']);
            $data['name_of_board_of_directors'] = serialize($data['name_of_board_of_directors']);
        }

        $data['list_of_crop_to_be_handled'] = serialize($data['list_of_crop_to_be_handled']);
        $data['other_facilities_available'] = serialize($data['other_facilities_available']);

        if($request->hasFile('evidence_of_inc')) {
            $data['evidence_of_inc'] = $this->uploadEvidenceOfIncorporation($request);
        }

        if(!auth()->user()->seedCompany()) {
            if(isset($request->file('trainings')['evidence'])) {
                $data['trainings']['evidence'] = $this->uploadEvidenceOfTraining($request);
            }
        }

        if(isset($data['trainings'])) {
            $data['trainings'] = serialize($data['trainings']);
        }

        $data['application_status'] = 'draft';

        auth()->user()->updateRegistration($data);

        $name = $data['business_name'];

        Log::add("$name submitted a new application");

        $registration  = auth()->user()->registration;

        return view('review',compact('registration'));
    }

    public function submitApplication()
    {
        $name = auth()->user()->registration->business_name;

        Log::add("$name submitted a new application");

        auth()->user()->updateRegistration([
            'application_status' => 'pending'
        ]);

        return redirect()->route('home')->with('notification','Your registration has been submitted for review, expect to hear from NST soon.');
    }

    private function uploadEvidenceOfIncorporation(Request $request)
    {
        $ext = $request->file('evidence_of_inc')->getClientOriginalExtension();
        $fileName = md5(auth()->user()->email . time()) .'.'. $ext;

        $filePath = $request->file('evidence_of_inc')
            ->storeAs('',$fileName,['disk' => 'incorporation']);

        return 'storage/evidence-of-incorporation/'.$filePath;
    }

    private function uploadEvidenceOfTraining(Request $request)
    {
        $files = [];

        foreach ($request->file('trainings')['evidence'] as $evidence){
            $ext = $evidence->getClientOriginalExtension();
            $fileName = md5(auth()->user()->email . time().rand(1,100)) .'.'. $ext;

            $filePath = $evidence->storeAs('',$fileName,['disk' => 'training']);

            $files[] = 'storage/evidence-of-training/'.$filePath;
        }

        return $files;
    }

    public function viewApplications(Registration $registration)
    {
        $registrations = $registration->whereHas('applicant',function($q){
            $q->where('registered',true);
        })->where('application_status','!=','draft')->get();

        $name = auth()->user()->name;

        Log::add("$name is viewing applications list");


        return view('registrations',compact('registrations'));
    }

    public function filterApplications(Request $request,Registration $registration)
    {
        $filters = $request->all();

        $registrations = $registration->filterApplicants($filters);

        $name = auth()->user()->name;

        Log::add("$name is filtering through applications");

        return view('registrations',compact('registrations'));
    }

    public function viewApplication(Registration $registration)
    {
        if(!auth()->user()->is_admin) return abort(403);

        $name = auth()->user()->name;
        $company = $registration->business_name;

        Log::add("$name is viewing $company application");

        return view('view-registration',compact('registration'));
    }

    public function updateApplicationStatus(Registration $registration,Request $request)
    {
        if(!auth()->user()->is_admin) return abort(403);

        $applicant = $registration->applicant;
        $status = $request->get('status');

        $registration->update([
            'application_status' => $status,
            'status_reason' => $request->get('status_reason'),
            'last_reviewed_by_admin' => date('Y-m-d'),
            'certification_start_date' => $request->get('certification_start_date'),
            'certification_end_date' => $request->get('certification_end_date'),
        ]);

        $name = auth()->user()->name;
        $company = $registration->business_name;

        if(auth()->user()->is_dg)
        {
            $certificateID = $registration->certificate_id ?: $registration->generateRef();

            if($status === "approved") {
                $registration->update([
                    'certificate_id' => $certificateID,
                    'qr' => $this->generateQR($registration, $certificateID),
                ]);
            }

            $registration->update([
                'provisional' => 0,
            ]);

            Mail::to($applicant)->send(new NSTApplicationUpdate($registration));

            return redirect()->route('home')->with('notification','Application status successfully updated!');
        }else{
            $registration->update([
                'provisional' => 1,
            ]);

            $dg = config('mail.directory.dg');

            Mail::to($dg)->send(new NSTApplicationIsAwaitingYourApproval($registration));
        }

        Log::add("$name updated $company application status to $status");

        return back()->with('notification','Application status successfully updated!');
    }

    public function updateCategory(Registration $registration,Request $request)
    {
        $registration->applicant()->update($request->only('user_type','type_category'));

        return back()->with('notification','Applicant type was successfully updated!');
    }

    private function generateQR($registration,$certificateID)
    {
        $renderer = new ImageRenderer(
            new RendererStyle(400),
            new SvgImageBackEnd()
        );
        $verifyUrl = route('application.verify',$certificateID);
        $from = $registration->certification_start_date->format('Y/m/d');
        $to = $registration->certification_end_date->format('Y/m/d');

        $detail = "NASC Licensed Seed Producer \n\n";
        $detail .= "Company: {$registration->business_name} \n\n";
        $detail .= "Reg No:{$certificateID} \n\n";
        $detail .= "Validity: {$from} - {$to} \n\n";
        $detail .= "verify using: \n";
        $detail .= "{$verifyUrl}";

        $path = storage_path('app/public/qr-codes/'.$certificateID.'.svg');

        $writer = new Writer($renderer);
        $writer->writeFile($detail,$path);

        return 'storage/qr-codes/'.$certificateID.'.svg';
    }

    public function certificate()
    {
        if(auth()->user()->registration->application_status !== 'approved') return abort(403);

        $registration = auth()->user()->registration;
        $orgName = $registration->business_name;

        $data = ['registration' => $registration];

        return PDF::loadView('certificate', $data)
            ->setPaper('a4', 'landscape')
            ->setWarnings(false)
            ->download("$orgName.pdf");
    }

    public function viewApplicantCertificate(Registration $registration)
    {
        if(!auth()->user()->is_admin) return abort(403);

        $data = ['registration' => $registration];
        $orgName = $registration->business_name;

        //return view('certificate',compact('registration'));
        return PDF::loadView('certificate', $data)
            ->setPaper('a4', 'landscape')
            ->setWarnings(false)
            ->stream("$orgName.pdf");
    }

    public function printApplication(Registration $registration)
    {
        return view('print',compact('registration'));
    }
}
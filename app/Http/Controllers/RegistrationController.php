<?php

namespace App\Http\Controllers;

use App\Registration;
use Illuminate\Http\Request;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

class RegistrationController extends Controller
{
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

        if($request->hasFile('evidence_of_inc')) $data['evidence_of_inc'] = $this->uploadEvidenceOfIncorporation($request);

        if(auth()->user()->communitySeedProducer()) {
            $data['trainings']['evidence'] = $this->uploadEvidenceOfTraining($request);
            $data['trainings'] = serialize($data['trainings']);
        }

        $data['application_status'] = 'pending';

        auth()->user()->updateRegistration($data);

        return back()->with('notification','Your registration has been submitted for review, expect to hear from NST soon.');
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
        })->get();

        return view('registrations',compact('registrations'));
    }

    public function viewApplication(Registration $registration)
    {
        if(!auth()->user()->is_admin) return abort(403);

        return view('view-registration',compact('registration'));
    }

    public function updateApplicationStatus(Registration $registration,Request $request)
    {
        if(!auth()->user()->is_admin) return abort(403);

        $approvedApplications = $registration->where('application_status','approved')->count();
        $approvedApplications += 1;
        $certificateID   = substr('000000'. $approvedApplications,-5);

        $registration->update([
            'application_status' => $request->get('status'),
            'status_reason' => $request->get('reason'),
            'last_reviewed_by_admin' => date('Y-m-d'),
            'certificate_id' => $certificateID,
            'qr' => $this->generateQR($registration, $certificateID)
        ]);

        return back()->with('notification','Application status successfully updated!');
    }

    private function generateQR($registration,$certificateID)
    {
        $renderer = new ImageRenderer(
            new RendererStyle(400),
            new SvgImageBackEnd()
        );

        $detail = 'It is hereby certify that, ';
        $detail .= $registration->business_name;
        $detail .= ' has this '. $registration->updated_at->format('jS') . ' day of '.$registration->updated_at->format('F Y');
        $detail .= ' licensed as a seed producer and seller with';
        $detail .= ' registration no ';
        $detail .=  $certificateID;

        $path = storage_path('app/public/qr-codes/'.$certificateID.'.svg');

        $writer = new Writer($renderer);
        $writer->writeFile($detail,$path);

        return 'storage/qr-codes/'.$certificateID.'.svg';
    }

    public function certificate()
    {
        if(auth()->user()->registration->application_status !== 'approved') return abort(403);

        $registration = auth()->user()->registration;

        return view('certificate',compact('registration'));
    }
}
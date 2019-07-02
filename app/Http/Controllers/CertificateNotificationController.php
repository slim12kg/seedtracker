<?php

namespace App\Http\Controllers;

use App\Mail\CertificateExpirationReminder;
use App\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CertificateNotificationController extends Controller
{
    public function checkForExpiringCertificate(Registration $registration)
    {
        $min = strtotime('yesterday');
        $max = strtotime('30 days');

        $notifiers = $registration
            ->where("certification_end_date",'>',date('Y-m-d',$min))
            ->where("certification_end_date",'<',date('Y-m-d',$max))->get();

        foreach ($notifiers as $notifier){
            Mail::to($notifier->applicant->email)->send(new CertificateExpirationReminder($notifier));
        }
    }
}
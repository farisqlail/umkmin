<?php

namespace App\Http\Controllers;

use App\Mail\AcceptedEmail;
use App\Mail\RejectedMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use App\Models\Email;

class EmailController extends Controller
{
    public function kirimEmail(Request $request)
    {
        $email_desc = [
            'id_user' => $request->id_user,
            'id_product' => $request->id_product,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'date' => $request->date,
            'time1' => $request->time1,
            'time2' => $request->time2,
            'subject' => $request->subject,
            'desc' => $request->desc,
            'status' => 'pending',
            'to_email' => $request->to_email,
            'from_email' => $request->from_email,
        ];

        if (auth()->user()) {
            Email::create($email_desc);

            Mail::to($request->to_email)->send(new SendEmail($email_desc));
            return redirect()->back()->with('status', 'appointment-send');
        } else {
            return redirect('/appointment' . '/' . $request->umkmName)->with('status', 'appointment-failed');
        }
    }


    public function updateEmailAccepted($id)
    {
        $email = Email::findOrFail($id);

        $accepted['status'] = 'accepted';
        Email::where('id', $id)->update($accepted);
        Mail::to($email->from_email)->send(new AcceptedEmail());

        return redirect()->back()->with('succes', 'Email Accepted');
    }

    public function updateEmailRejected(Request $request, $id)
    {
        $email = Email::findOrFail($id);

        $rejected_reason = $request->reason;
        $rejected['status'] = 'rejected';
        Email::where('id', $id)->update($rejected);
        // dd($rejected_reason);
        Mail::to($email->from_email)->send(new RejectedMail($rejected_reason));

        return redirect('/dashboard/email')->with('danger', 'Email Rejected');
    }
}

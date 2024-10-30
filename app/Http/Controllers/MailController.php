<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MentorshipMail;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {
        $toEmail = 'ranjini.forstu@gmail.com';
        $recipientName = 'Recipient'; // Provide the recipient name here

        // Create a new instance of the MentorshipMail mailable
        $mail = new MentorshipMail($recipientName);

        // Send email using Laravel's mail functionality
        try {
            Mail::to($toEmail)->send($mail);
            return redirect()->back()->with('success', 'Email sent successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to send email. Error: ' . $e->getMessage());
        }
    }
}

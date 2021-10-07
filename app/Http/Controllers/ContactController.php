<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use JTelesforoAntonio\LaravelContactForm\Models\ContactMessage;
use JTelesforoAntonio\LaravelContactForm\Notifications\ContactMessage as ContactMessageNotification;

class ContactController extends Controller
{
    /**
     * Show the contact form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showContactForm()
    {
        return view('contact_form::contact');
    }

    /**
     * Send the contact message.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function contact(Request $request)
    {
        $this->validateContactForm($request);
        $contactMessage = $this->saveContactMessage($request);
        if(config('contact_form.send_email_notification')) {
            $this->sendEmailNotification($contactMessage->name, $contactMessage->subject, $contactMessage->email, $contactMessage->message);
        }

        return back()->with('success', 'Your message was sent!');
    }

    /**
     * Validate the request.
     *
     * @param Request $request
     */
    public function validateContactForm(Request $request)
    {
        $this->validate($request, [
            'name'    => 'required',
            'subject' => 'required',
            'email'   => 'required|email',
            'message' => 'required',
        ]);
    }

    /**
     * Save the message.
     *
     * @param Request $request
     * @return ContactMessage;
     */
    public function saveContactMessage(Request $request)
    {
        return ContactMessage::create([
            'name'    => $request->name,
            'subject' => $request->subject,
            'email'   => $request->email,
            'message' => $request->message,
        ]);
    }

    /**
     * @param string $name
     * @param string $subject
     * @param string $email
     * @param string $message
     */
    public function sendEmailNotification($name, $subject, $email, $message)
    {
        Notification::route('mail', config('contact_form.email'))
                    ->notify(new ContactMessageNotification($name, $subject, $email, $message));
    }
}
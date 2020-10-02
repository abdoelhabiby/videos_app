<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Contact;
use App\Models\ContactReply;
use Illuminate\Http\Request;
use App\Mail\ContactReplyMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Dashboard\ContactReplyRequest;

class ContactUsController extends DashboardController
{

    public function __construct(Contact $model)
    {
        parent::__construct($model);

    }


    //----------------- show ------------------------------

    public function show($id)
    {
        $contact = Contact::with('replies')->findOrFail($id);
        return view('dashboard.contacts.show',compact('contact'));
    }

    //----------------- show ------------------------------


    //----------------- reply contact ------------------------------

    public function reply(Contact $contact, ContactReplyRequest $request)
    {
        try {

            $reply = ContactReply::create([
                "reply" => $request->reply,
                "admin_id" => admin()->id,
                "contact_id" => $contact->id
            ]);


             $contact->replied_at = now();
             $contact->save();



            Mail::to($contact->email)->send(new ContactReplyMail($reply));


            return redirect()->back()->with(['success' => 'succes send reply']);



        } catch (\Throwable $th) {

            return $th->getMessage();

            return redirect()->back()->with(['error' => 'sorry try later !']);
        }
    }

    //----------------- reply contact ------------------------------


    //----------------- replyDestroy ------------------------------

    public function replyDestroy(ContactReply $reply)
    {
        try{

            $reply->delete();

            return redirect()->back()->with(['success' => 'succes delete']);


         } catch (\Throwable $th) {


            return redirect()->back()->with(['error' => 'sorry try later !']);
        }
    }
    //----------------- replyDestroy ------------------------------


}

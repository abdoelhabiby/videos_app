<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{

    public function store(ContactRequest $request)
    {
        try {
            Contact::create($request->validated());

            alert()->success('Success', 'succes add messag we wille reponse to your email soooon');


            return redirect()->back();
        } catch (\Throwable $th) {

            alert()->error('Error ', 'sorry tray again later!!');

            return redirect()->back();

        }
    }

}

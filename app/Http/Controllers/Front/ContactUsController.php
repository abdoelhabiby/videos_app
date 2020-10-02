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

            return redirect()->back()->with(['success' => 'succes add messag ewe wille reponse to your email soooon']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'sorry tray again later!!']);

        }
    }

}

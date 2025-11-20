<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function all()
    {
        $contacts = Contact::all();
        return view('admin.contacts.list', ["contacts" => $contacts]);
    }

    public function create()
    {
        return view('showCase.contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'yourMessages' => 'required',
        ]);

        $contact = Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'yourMessages' => $request->input('yourMessages'),
        ]);

        $success = "sent successfully";

        return view('showCase.contact', ['success' => $success]);
    }

    public function delete (string $id){
        $contact = Contact::find($id);
        $contact->delete();
        return redirect("contacts");
    }
}

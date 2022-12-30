<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    
    public function AdminContact(){
        $contacts = Contact::all();
        return view('admin.contact.index',compact('contacts'));
    }

    public function AdminAddContact(){
        return view('admin.contact.create');
    }

    public function AdminStoreContact(Request $request){
        Contact::insert([
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('admin.contact')->with('success','Coontract Inserted Successfully');
    }

    public function Contact(){
        $contacts = DB::table('contacts')->first();
        return view('pages.contact', compact('contacts'));
    }
}

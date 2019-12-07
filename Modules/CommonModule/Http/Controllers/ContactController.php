<?php

namespace Modules\CommonModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CommonModule\Entities\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::all();
        return view('commonmodule::layouts.contactus', ['contacts' => $contact]);
    }

    public function create()
    {
        echo "need";
    }


    public function store(Request $request)
    {
        $data = request()->validate([
            'email' => 'required',
            'title' => 'required',
            'status' => 'required'
        ]);
        \Modules\CommonModule\Entities\Contact::create($data);

        return redirect('dashboard/contact');
    }


    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('commonmodule::layouts.editcontact', ['contacts' => $contact]);
    }


    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'email' => 'required',
            'title' => 'required',
            'status' => 'required'
        ]);
        \Modules\CommonModule\Entities\Contact::where('id', $id)->update($data);

        return redirect('dashboard/contact');
    }


    public function destroy($id)
    {
        Contact::where('id', $id)->delete();
        return redirect('dashboard/contact');
    }
}

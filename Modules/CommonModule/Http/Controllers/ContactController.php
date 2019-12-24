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
        return view('commonmodule::contactus', ['contacts' => $contact]);
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
        return view('commonmodule::editcontact', ['contacts' => $contact]);
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

    public function saveContactMessage(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $data=$request->all();
        $data['status'] = 'pending';
        $message = Contact::create($data);
        if ($message){
            return response()->json(['message'=>'your request has been sent'],200);
        }else{
            return response()->json(['message'=>'There is an error'],400);
        }

    }
}

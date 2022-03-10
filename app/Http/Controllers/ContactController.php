<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Datatables;
use Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use JeroenDesloovere\VCard\Exception;

class ContactController extends Controller
{
    public function getIndex()
    {
        return view('admin.contact.index');
    }

    public function data() 
    {

        $contact_form = Contact::select(['id', 'name', 'email', 'message', 'created_at'])->get();

        return Datatables::of($contact_form)
            ->editColumn('created_at','{{ $created_at->diffForHumans() }}')
            ->add_column('actions',
                '<a href="{{ route(\'preview/contact\', $id) }}"><i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Info Role"></i></a>')
            ->make(true);
    }

    public function getCreate()
    {
        //
    }

    public function postCreate(Request $request)
    {
        // dd($request->all());
        $rules = [
            'name'          => 'required|min:3',
            'email'         => 'required|email',
            'message'       => 'required|max:250',
        ];
        $custom_message = [
            'required'          => 'The :attribute field is required.',
            'email'             => 'We need to know your e-mail address!',
            'min'               => 'At least :attribute characters.',
            'max'               => 'Max :attribute characters.'
        ];

        $validator = Validator::make($request->all(), $rules, $custom_message);

        if($validator->fails()){
            return redirect()->back()
                ->withErrors($validator->errors());
        }

        Contact::create($request->except('_token'));
        return redirect()->back()->with('success', 'Your message send successfully.');
    }

    public function perview($id)
    {
        // try {
            $message = Contact::find($id);        
            return view('admin.contact.preview', compact('message'));

        // } (\Exception $e) {
            
        //     return abort(404, compact('e'));
        // }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

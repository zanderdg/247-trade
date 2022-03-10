<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\FaqRequest;
use App\Models\Faq;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Sentinel;
use Response;
use Image;
use File;
use Datatables;
use Illuminate\Http\Request;
use Validator;
use Redirect;

class FaqController extends AWController {

    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        return view('admin.faq.index');
    }

    public function data()
    {
        $faq = Faq::select(['faq.id', 'faq.question', 'faq.answer', 'faq.created_at']);

        return Datatables::of($faq)
            ->editColumn('created_at','{{ $created_at->diffForHumans() }}')
            ->add_column('actions','
            <a href="{{ route(\'preview/faq\', $id) }}"><i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Info FAQ"></i></a>
            <a href="{{ route(\'update/faq\', $id) }}"><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Edit FAQ"></i></a>
            <a href="{{ route(\'confirm-delete/faq\', $id) }}" data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="remove-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="Delete FAQ"></i></a>
                ')
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {
        return view('admin.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate(Request $request)
    {
        $rules = array(
            'question'         => 'required|min:3',
            'answer'           => 'required|min:3',
        );
        // Create a new validator instance from our validation rules
        $validator = Validator::make($request->all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::back()->withInput()->withErrors($validator);
        }
        $faq = new Faq($request->all());
        $faq->save();

        return redirect('admin/faq');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Preview($id)
    {
        $faq = Faq::where('id', $id)->get();        
        return view('admin.faq.preview', compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getEdit(Faq $faq)
    {
        $templates = getTemplates();

        $image_fields = ['image'];

        return view('admin.faq.edit', compact('faq', 'templates', 'image_fields'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function postEdit(Request $request, Faq $faq)
    {
        $rules = array(
            'question'         => 'required|min:3',
            'answer'           => 'required|min:3',
        );
        // Create a new validator instance from our validation rules
        $validator = Validator::make($request->all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::back()->withInput()->withErrors($validator);
        }
        $faq->update($request->except('_method'));

        return redirect('admin/faq');
    }

    /**
     * Remove page.
     *
     * @param $website
     * @return Response
     */
    public function getModalDelete(Faq $faq)
    {
        $model = 'faq';
        $confirm_route = $error = null;
        try {
            $confirm_route =  route('delete/faq',['id'=>$faq->id]);
            return View('admin/layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
        } catch (GroupNotFoundException $e) {

            $error = trans('Faq/message.error.delete', compact('id'));
            return View('admin/layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function getDelete(Faq $faq)
    {
        $faq->delete();
        return redirect('admin/faq');
    }

}

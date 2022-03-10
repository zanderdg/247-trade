<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\TestimonialRequest;
use App\Models\Testimonial;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Sentinel;
use Response;
use Image;
use File;
use Datatables;
use App\Models\Notifications;
use Illuminate\Http\Request;
use Validator;
use Redirect;


class TestimonialController extends AWController {

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        return view('admin.testimonial.index');
    }

    public function data()
    {
        $testimonial = Testimonial::select(['testimonial.id', 'testimonial.title', 'testimonial.designation','testimonial.created_at']);

        return Datatables::of($testimonial)
            ->editColumn('created_at','{{ $created_at->diffForHumans() }}')
            ->add_column('actions','<a href="{{ route(\'update/testimonial\', $id) }}"><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Edit Testimonial"></i></a>
                                    <a href="{{ route(\'confirm-delete/testimonial\', $id) }}" data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="remove-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="Delete Testimonial"></i></a>
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
        $templates = getTemplates();
        $image_fields = ['image'];
        return view('admin.testimonial.create', compact('image_fields', 'templates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate(Request $request)
    {
        // dd( $request->all());
        $rules = array(
            'title'                 => 'required|min:3',
            'designation'           => 'required|min:3',
            // 'testimonial_image'     =>  'required'
        );
        // Create a new validator instance from our validation rules
        $validator = Validator::make($request->all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::back()->withInput()->withErrors($validator);
        }
        $testimonial = Testimonial::create([
            'title'             => $request->title,
            'designation'       => $request->designation,
            'content'           => $request->content,
            'testimonial_image' => $request->testimonial_image ? $request->testimonial_image : 'default.png',
            'is_home'           => $request->is_home ? 1 : 0
        ]);
        $testimonial->save();

        return redirect('admin/testimonial');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getEdit(Testimonial $testimonial)
    {
        $templates = getTemplates();

        $image_fields = ['image'];

        return view('admin.testimonial.edit', compact('testimonial', 'templates', 'image_fields'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function postEdit(Request $request, Testimonial $testimonial)
    {
        $rules = array(
            'title'                 => 'required|min:3',
            'designation'           => 'required|min:3',
            'testimonial_image'     =>  'required'
        );
        // Create a new validator instance from our validation rules
        $validator = Validator::make($request->all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::back()->withInput()->withErrors($validator);
        }
        $testimonial->update($request->except('_method'));

        return redirect('admin/testimonial');
    }

    /**
     * Remove page.
     *
     * @param $website
     * @return Response
     */
    public function getModalDelete(Testimonial $testimonial)
    {
        $model = 'testimonial';
        $confirm_route = $error = null;
        try {
            $confirm_route =  route('delete/testimonial',['id'=>$testimonial->id]);
            return View('admin/layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
        } catch (GroupNotFoundException $e) {

            $error = trans('testimonial/message.error.delete', compact('id'));
            return View('admin/layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function getDelete(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect('admin/testimonial');
    }

}

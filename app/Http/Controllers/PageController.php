<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\PageRequest;
use App\Models\Page;
use App\Models\PageMeta;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Sentinel;
use Response;
use Image;
use File;
use Datatables;
use Illuminate\Http\Request;
use Validator;
use Redirect;


class PageController extends AWController {

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

        //$action = $route->getActionName();

        //if (Sentinel::hasAccess(['page.create']))
        //{
            return view('admin.page.index');
        //}
        //return redirect('admin/page');//->withErrors('Permission denied.');
    }

    public function data()
    {
        $pages = Page::select(['id', 'title', 'short_title', 'slug', 'status', 'created_at'])->where('status', '<>', 3);

        return Datatables::of($pages)
            ->editColumn('slug','<a href="{{ URL::to($slug) }}">{{ URL::to($slug) }}</a>')
            ->editColumn('status','@if($status)
                                Enable
                            @else
                                Disable
                            @endif')
            ->editColumn('created_at','{{ $created_at->diffForHumans() }}')
            ->add_column('actions','<a href="{{ route(\'update/page\', $id) }}"><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Delete page"></i></a>
                                    <a href="{{ route(\'confirm-delete/page\', $id) }}" data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="remove-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="Delete Page"></i></a>
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
        $image_fields = ['image', 'banner_image'];

        return view('admin.page.create', compact('image_fields', 'templates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate(Request $request)
    {
        $rules = array(
            'title'       => 'required|min:3',
            'short_title' => 'required|min:3',
            'order'       => 'required|integer',
            'status'      => 'required|integer',
            'content'     => 'required'
        );
        // Create a new validator instance from our validation rules
        $validator = Validator::make($request->all(), $rules);
        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::back()->withInput()->withErrors($validator);
        }
        
        $page = new Page($request->all());
        $page->created_by = Sentinel::getUser()->id;

        if ($page->key_points) {
            $dataArray = [];
            foreach ($page->key_points as $key => $value) {
                 $dataArray[$key] = array(
                    'key_points'    => $value
                );
            }
            $page->key_points = json_encode($dataArray);
        }
        if ($page->program_image) {
            //print_r($page->program_image);
            $dataArray2 = [];
            foreach ($page->program_image as $key => $value) {
                 $dataArray2[$key] = array(
                    'program_image'    => $value
                );
            }
            $page->program_image = json_encode($dataArray2);
        }
        if ($page->program_heading) {
            $dataArray3 = [];
            foreach ($page->program_heading as $key => $value) {
                 $dataArray3[$key] = array(
                    'program_heading'    => $value
                );
            }
            $page->program_heading = json_encode($dataArray3);
        }
        if ($page->program_link) {
            $dataArray3 = [];
            foreach ($page->program_link as $key => $value) {
                 $dataArray3[$key] = array(
                    'program_link'    => $value
                );
            }
            $page->program_link = json_encode($dataArray3);
        }
        if ($page->program_sorting) {
            $dataArray3 = [];
            foreach ($page->program_sorting as $key => $value) {
                 $dataArray3[$key] = array(
                    'program_sorting'    => $value
                );
            }
            $page->program_sorting = json_encode($dataArray3);
        }
        if ($page->program_text) {
            $dataArray4 = [];
            foreach ($page->program_text as $key => $value) {
                 $dataArray4[$key] = array(
                    'program_text'    => $value
                );
            }
            $page->program_text = json_encode($dataArray4);
        }

        $page->save();
        Page::where('status','=',3)->delete();

        return redirect('admin/page');
    }

    /**
     * Store a newly preview created resource in storage.
     *
     * @return Response
     */
    public function postCreatePreview(Page $pageData)
    {
        $page = new Page(\Request::all());
        if ($page->key_points) {
            $dataArray = [];
            foreach ($page->key_points as $key => $value) {
                 $dataArray[$key] = array(
                    'key_points'    => $value
                );
            }
            $page->key_points = json_encode($dataArray);
        }  
        if ($page->program_image) {
            //print_r($page->program_image);
            $dataArray2 = [];
            foreach ($page->program_image as $key => $value) {
                 $dataArray2[$key] = array(
                    'program_image'    => $value
                );
            }
            $page->program_image = json_encode($dataArray2);
        }
        if ($page->program_heading) {
            $dataArray3 = [];
            foreach ($page->program_heading as $key => $value) {
                 $dataArray3[$key] = array(
                    'program_heading'    => $value
                );
            }
            $page->program_heading = json_encode($dataArray3);
        }
        if ($page->program_link) {
            $dataArray3 = [];
            foreach ($page->program_link as $key => $value) {
                 $dataArray3[$key] = array(
                    'program_link'    => $value
                );
            }
            $page->program_link = json_encode($dataArray3);
        }
        if ($page->program_sorting) {
            $dataArray3 = [];
            foreach ($page->program_sorting as $key => $value) {
                 $dataArray3[$key] = array(
                    'program_sorting'    => $value
                );
            }
            $page->program_sorting = json_encode($dataArray3);
        }
        if ($page->program_text) {
            $dataArray4 = [];
            foreach ($page->program_text as $key => $value) {
                 $dataArray4[$key] = array(
                    'program_text'    => $value
                );
            }
            $page->program_text = json_encode($dataArray4);
        }      
        $page->status = 3;
        $page->created_by = Sentinel::getUser()->id;
        $pageData->where('status','=', 3)->delete();
        $page->save();
        return redirect($page->slug."?preview=true");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getEdit(Page $page)
    {
        $templates = getTemplates();

        $keyPointsData = json_decode($page->key_points);
        $program_imageData = json_decode($page->program_image);
        $program_headingData = json_decode($page->program_heading);
        $program_textData = json_decode($page->program_text);
        $program_linkData = json_decode($page->program_link);
        $program_sortingData = json_decode($page->program_sorting);

        $image_fields = ['image','banner_image','imageh1','imageh2','imageh3','imageh4', 'about_placeholder1', 'about_placeholder2', 'about_image1', 'about_image2', 'about_image3', 'about_image4', 'about_image5', 'about_image6', 'about_image7', 'about_image8', 'about_image9', 'owner_image1', 'owner_image2', 'owner_image3'];

        return view('admin.page.edit', compact('page', 'templates', 'image_fields','keyPointsData', 'program_imageData', 'program_headingData', 'program_textData', 'program_linkData', 'program_sortingData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function postEdit(Request $request, Page $page)
    {
        $rules = array(
            'title'       => 'required|min:3',
            'short_title' => 'required|min:3',
            'order'       => 'required|integer',
            'status'      => 'required|integer',
            'content'     => 'required'
        );
        // Create a new validator instance from our validation rules
        $validator = Validator::make($request->all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::back()->withInput()->withErrors($validator);
        }
        if ($request->key_points) {
            $dataArray = [];
            foreach ($request->key_points as $key => $value) {
                 $dataArray[$key] = array(
                    'key_points'    => $value
                );
            }
            $request['key_points'] = json_encode($dataArray);
        }
        /////////
        if ($request->program_image) {
            //print_r($request->program_image);
            $dataArray2 = [];
            foreach ($request->program_image as $key => $value) {
                 $dataArray2[$key] = array(
                    'program_image'    => $value
                );
            }
            $request['program_image'] = json_encode($dataArray2);
        }
        if ($request->program_heading) {
            $dataArray3 = [];
            foreach ($request->program_heading as $key => $value) {
                 $dataArray3[$key] = array(
                    'program_heading'    => $value
                );
            }
            $request['program_heading'] = json_encode($dataArray3);
        }
        if ($request->program_link) {
            $dataArray3 = [];
            foreach ($request->program_link as $key => $value) {
                 $dataArray3[$key] = array(
                    'program_link'    => $value
                );
            }
            $request['program_link'] = json_encode($dataArray3);
        }
        if ($request->program_sorting) {
            $dataArray3 = [];
            foreach ($request->program_sorting as $key => $value) {
                 $dataArray3[$key] = array(
                    'program_sorting'    => $value
                );
            }
            $request['program_sorting'] = json_encode($dataArray3);
        }
        if ($request->program_text) {
            $dataArray4 = [];
            foreach ($request->program_text as $key => $value) {
                 $dataArray4[$key] = array(
                    'program_text'    => $value
                );
            }
            $request['program_text'] = json_encode($dataArray4);
        }

//print_r($request->program_text);exit();


        $page->update($request->except('_method'));
        $page->where('status','=',3)->delete();

        return redirect('admin/page');
    }

    /**
     * Remove page.
     *
     * @param $website
     * @return Response
     */
    public function getModalDelete(Page $page)
    {
        $model = 'page';
        $confirm_route = $error = null;
        try {
            $confirm_route =  route('delete/page',['id'=>$page->id]);
            return View('admin/layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
        } catch (GroupNotFoundException $e) {

            $error = trans('page/message.error.delete', compact('id'));
            return View('admin/layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function getDelete(Page $page)
    {
        $page->delete();
        return redirect('admin/page');
    }

}

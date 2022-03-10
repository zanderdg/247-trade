<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Category;
use Datatables;
use App\Http\Controllers\Controller;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view('admin.sub_categories.index');
    }

    public function data()
    {
        $subCat = SubCategory::select(['id', 'name', 'slug', 'status', 'created_at']);

        return Datatables::of($subCat)
            ->editColumn('created_at','{{ $created_at->diffForHumans() }}')
            ->editColumn('status','@if($status) Publish @else Unpublish @endif')
            ->add_column('actions',
                '<a href="{{ route(\'preview/subcategory\', $id) }}"><i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Edit Sub_category"></i></a>
                <a href="{{ route(\'update/subcategory\', $id) }}"><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Edit Sub_category"></i></a>
                <a href="{{ route(\'confirm-delete/subcategory\', $id) }}" data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="remove-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="Delete Sub_category"></i></a>
            ')
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        $categories = Category::where('status', '=', 1)->get();

        return view('admin.sub_categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postCreate(Request $request)
    {

        $data = [
            'category_id'       => $request->category_id,
            'name'              => strtolower($request->name),
            'description'       => $request->description,
            'status'            => $request->status === null ? '0' : '1',
        ];

        SubCategory::create($data);
        return view('admin.sub_categories.index')->with(['message' => 'Category add successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Preview($id)
    {
        $sub_category = SubCategory::where('id', $id)->get();
        $category = Category::where('id', $sub_category[0]->category_id)->get();

        return view('admin.sub_categories.preview', compact('sub_category', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEdit($id)
    {
        $sub_category = SubCategory::findOrFail($id);
        $categories = Category::where('status', '=', 1)->get();

        return view('admin.sub_categories.edit', compact('sub_category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postEdit(Request $request, $id)
    {
        $data = [
            'category_id'       => $request->category_id,
            'name'              => strtolower($request->name),
            'description'       => $request->description,
            'status'            => $request->status === null ? '0' : '1',
        ];

        SubCategory::where('id', $id)->update($data);
        return view('admin.sub_categories.index')->with(['message' => 'Category update successfully.']);
    }

    /**
     * Remove page.
     *
     * @param $website
     * @return Response
     */
    public function getModalDelete(SubCategory $sub_categories)
    {
        $model = 'sub_categories';
        $confirm_route = $error = null;
        try {
            $confirm_route =  route('delete/subcategory',['id' => $sub_categories->id]);
            return View('admin/layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
        } catch (GroupNotFoundException $e) {

            $error = trans('sub_categories/message.error.delete', compact('id'));
            return View('admin/layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function getDelete(SubCategory $subCategory)
    {
        $subCategory->delete();
        return redirect('admin/subcategory');
    }
}

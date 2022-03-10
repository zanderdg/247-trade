<?php

namespace App\Http\Controllers;

use Datatables;
use App\Http\Requests;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view('admin.categories.index');
    }

    public function data()
    {
        $cat = Category::select(['id', 'name', 'slug', 'status', 'created_at']);

        return Datatables::of($cat)
            ->editColumn('created_at','{{ $created_at->diffForHumans() }}')
            ->editColumn('status','@if($status) Publish @else Unpublish @endif')
            ->add_column('actions',
                '<a href="{{ route(\'preview/category\', $id) }}"><i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Info Category"></i></a>
                <a href="{{ route(\'update/category\', $id) }}"><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Edit Category"></i></a>
                <a href="{{ route(\'confirm-delete/category\', $id) }}" data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="remove-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="Delete Category"></i></a>
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
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postCreate(Request $request)
    {
        // if ($request->hasFile('cat_icon')) {
        //     $iconName = $request->cat_icon->getClientOriginalName();            
        //     $destination = base_path() . '/public/uploads/icons';
        //     $request->file('cat_icon')->move($destination, $iconName);
        // } else {
        //     return redirect()->back();
        // }

        $data = [
            'name'              => strtolower($request->name),
            'description'       => $request->description,
            'status'            => $request->status === null ? '0' : '1',
            'icon'              => $request->cat_icon,
        ];

        Category::create($data);
        return view('admin.categories.index')->with(['message' => 'Category add successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Preview($id)
    {
        $category = Category::where('id', $id)->get();
        $sub_category = SubCategory::where('id', $category[0]->id)->get();
        
        return view('admin.categories.preview', compact('category', 'sub_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
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
        // if ($request->hasFile('cat_icon')) {
        //     $iconName = $request->cat_icon->getClientOriginalName();            
        //     $destination = base_path() . '/public/uploads/icons';
        //     $request->file('cat_icon')->move($destination, $iconName);
        // } else {
        //     $category_icon = Category::find($id)->icon;
        //     if($category_icon == null){
        //         return redirect()->back()->with('error', 'Iocn is requried!');
        //     } else {
        //         $iconName = $category_icon;
        //     }
        // }

        $data = [
            'name'              => strtolower($request->name),
            'description'       => $request->description,
            'status'            => $request->status === null ? '0' : '1',
            'icon'              => $request->cat_icon,
        ];

        Category::where('id', $id)->update($data);
        return view('admin.categories.index')->with(['message' => 'Category update successfully.']);
    }

    /**
     * Remove page.
     *
     * @param $website
     * @return Response
     */
    public function getModalDelete(Category $category)
    {
        $model = 'categories';
        $confirm_route = $error = null;
        try {
            $confirm_route =  route('delete/category',['id' => $category->id]);
            return View('admin/layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
        } catch (GroupNotFoundException $e) {

            $error = trans('categories/message.error.delete', compact('id'));
            return View('admin/layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function getDelete(Category $category)
    {
        $category->delete();
        return redirect('admin/category');
    }

    public function categories(Request $request) {

        $categories = Category::where('status', '=', 1)->orderBy('name')->get();
        // if($request->is('categories')) {
            return view('site.categories', compact('categories'));
        // } else {
        //     return view('template.parts.trade&service', compact('categories'));
        // }

    }

    public function SearchServices(Request $request) {
        if($request->get('query')) {
            $query = $request->get('query');
            $data = DB::table('categories')
                ->where('name', 'LIKE', "%{$query}%")
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row) { 
                $output .= '<li><a href="#">'.$row->name.'</a></li>'; 
            }
            $output .= '</ul>';
            return $output;
        }
        return 'something get worng';
    }
}

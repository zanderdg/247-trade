<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Datatables;
use App\Models\Permission;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Sentinel;

class RolesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        Sentinel::check();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view('admin.roles.index');
    }

    public function data(){
        
        $roles = Role::select(['id', 'name', 'slug', 'created_at'])->get();

        return Datatables::of($roles)
            ->editColumn('created_at','{{ $created_at->diffForHumans() }}')
            // ->editColumn('slug', '<a href="{{ url('/').$slug }}">slug</a>')
            ->add_column('actions',
                '<a href="{{ route(\'preview/role\', $id) }}"><i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Info Role"></i></a>
                <a href="{{ route(\'update/role\', $id) }}"><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Edit Role"></i></a>
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postCreate(Request $request)
    {
        $role = Role::create($request->all());
        return redirect()->route('roles')->with(['message' => 'Role is create successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Preview($id)
    {
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEdit($id)
    {
        $routeList = \Route::getRoutes();

        $routes = [];
        foreach ($routeList as $value) {
            $routes[] = $value->getName();
        }

        $GETRoutes = array_filter($routes);

        if($id){
            $role = Role::findOrFail($id)->toArray();
            $permissions = (Array)json_decode($role['permissions']);
            $rolePermissions = (object)array_merge($role,['permissions' => $permissions]);
            $getAllPermissions = Permission::all();
            foreach($getAllPermissions as $getAllPermission){
                $models[$getAllPermission->model][] = $getAllPermission;
            }
            
            return view('admin.roles.edit', compact('rolePermissions', 'models', 'GETRoutes'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

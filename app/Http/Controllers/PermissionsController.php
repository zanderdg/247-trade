<?php

namespace App\Http\Controllers;

use Datatables;
use App\Models\Role;
use App\Models\Permission;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePermissionRequest;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $createPermissions = $this->existingRoles();
        return view('admin.permissions.index', compact('createPermissions'));
    }

    public function data() {

        $permissions = Permission::select(['id', 'title', 'slug', 'description', 'model', 'created_at'])->get();

        return Datatables::of($permissions)
            ->editColumn('created_at','{{ $created_at->diffForHumans() }}')
            // ->editColumn('slug', '<a href="{{ url('/').$slug }}">slug</a>')
            ->add_column('actions',
                '<a href="{{ route(\'preview/permission\', $id) }}"><i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Info Role"></i></a>
                <a href="{{ route(\'update/permission\', $id) }}"><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Edit Role"></i></a>
            ')
            ->make(true);
    }

    protected function existingRoles() {
        $existingRole = Role::all();
        for($i=0; $i < count($existingRole); $i++){
            $premission = json_decode($existingRole[$i]->permissions);
            $existingRole[$i]->permissions = $premission;
        }
        return $existingRole;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    { 
        $routeList = \Route::getRoutes();
        $permissions = Permission::all();

        $routes = [];
        foreach ($routeList as $value) {
            $routes[] = $value->getName();
        }
        $GETRoutes = array_filter($routes);
        
        if($permissions != null) {
            foreach($permissions as $permission){
                $RoutesArray = array_search($permission->slug, $GETRoutes);
                unset($GETRoutes[$RoutesArray]);
            }
        }
        
        $restOfRoutes = array_values($GETRoutes);
        $values = count($restOfRoutes);
        $perTimes = 10;
        $totalLoop = $values/$perTimes;
        $perSkip = 0;
        $totalLoops = $totalLoop;
        
        $RoutesArray = [];
        for ($i=0; $i < $totalLoops ; $i++) { 
            $RoutesArray[] = array_slice($restOfRoutes, $perSkip, $perTimes);
            $perSkip = $perSkip + $perTimes;
        }

        return view('admin.permissions.create', compact('restOfRoutes', 'RoutesArray', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postCreate(Request $request)
    {
        dd($request->all());


        $permission = Permission::create($request->all());
        return redirect()->route('permissions')->with(['message' => 'Permission is create successfully.']);
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
        dd($id);
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

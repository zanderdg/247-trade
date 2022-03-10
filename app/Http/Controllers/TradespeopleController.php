<?php

namespace App\Http\Controllers;

use Datatables;
use App\Models\User;
use Sentinel;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cartalyst\Sentinel\Laravel\Facades\Activation;

class TradespeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view('admin.tradespeople.index');
    }

    public function data() {

        $user = User::whereNotIn('users.id', [1])
            ->leftJoin('role_users', 'role_users.user_id', '=', 'users.id')
            ->whereIn('role_users.role_id', [3])
            ->select(['users.id', 'users.first_name', 'users.last_name', 'users.email_verified_at', 'users.email', 'users.created_at'])
            ->get();

        return Datatables::of($user)
            // ->addIndexColumn()
            ->editColumn('created_at','{{ $created_at->diffForHumans() }}')
            ->editColumn('status', '@if($email_verified_at != "") Completed @else Incompleted @endif')
            // ->add_column('actions',
            //     '<a href="{{ route(\'tradespeople/update\', $id) }}"><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Edit Category"></i></a>
            // ')
            ->make(true);
    }

    // <a href="{{ route(\'preview/category\', $id) }}"><i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Info Category"></i></a>
    // <a href="{{ route(\'update/category\', $id) }}"><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Edit Category"></i></a>
    // <a href="{{ route(\'confirm-delete/category\', $id) }}" data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="remove-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="Delete Category"></i></a>

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

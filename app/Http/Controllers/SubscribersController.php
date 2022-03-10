<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Datatables;
use Validator;

class SubscribersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view('admin.subscriber.index');
    }

    public function data() {

        $subscribers = Subscriber::select(['id', 'email', 'created_at'])->get();

        return Datatables::of($subscribers)
            ->editColumn('created_at','{{ $created_at->diffForHumans() }}')
            ->add_column('actions',
                '<a href="{{ route(\'preview/permission\', $id) }}"><i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Info Role"></i></a>
                <a href="{{ route(\'update/permission\', $id) }}"><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Edit Role"></i></a>
            ')
            ->make(true);
    }

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
    public function getSubscribe(Request $request)
    {
        if($request->ajax()){
            $rules = ['email' => 'required|email|unique:subscribers'];
            $customMessages = [
                'required' => 'The :attribute field is required.',
                'email' => 'Enter proper email.',
                'unique' => 'Already Subscribed.',
            ];
            $validator = Validator::make($request->all(), $rules, $customMessages);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors(), 'code' => 0]);
            }

            Subscriber::create($request->except('_token'));
            return response()->json(['message' => 'Thankyou For Subscription', $request->email, 'code' => 1]);
        } else {
            echo 'something went wrong!';
        }
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

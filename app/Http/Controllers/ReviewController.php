<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id, $tradeperson_id) {

        if ($request->isMethod('post')) {
            $user = User::find($id);
            $tradeperson = User::find($tradeperson_id);
            if($user->roles[0]->slug == 'homeowner' && $tradeperson->roles[0]->slug == 'tradeperson') {
                Review::create([
                    'job_id'            => $request->obj,
                    'homeowner_id'      => $user->id,
                    'tradeperson_id'      => $tradeperson->id,
                    'comment'            =>  $request->review,
                    'point'            =>  $request->rate,
                ]);

                return redirect()->back();
            }
        }
        return abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}

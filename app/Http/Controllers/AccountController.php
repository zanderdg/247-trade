<?php

namespace App\Http\Controllers;

use Sentinel;
use App\Models\User;
use App\Http\Requests;
use App\Models\Category;
use App\Models\GoogleData;
use function Stringy\create;
use Illuminate\Http\Request;
use App\Models\AccountSetting;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AccountController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function getIndex() {
        $user = Sentinel::getUser();
        if($user->roles[0]->slug != 'admin') {
            if($user->roles[0]->slug == 'tradeperson') {
                $account_setting = Sentinel::getUser()->account_setting;
                if($account_setting != null) {
                    $account_setting->services = json_decode($account_setting->services);
                    return view('site.setting.index', compact('account_setting', 'user'));
                }
                return view('site.setting.index', compact('user'));
            } else if($user->roles[0]->slug == 'homeowner'){
                return view('site.setting.index', compact('user'));
            }
        }else if($user->roles[0]->slug == 'homeowner') {
            return Redirect::route('client-login')->with(['info' => 'Need to login']);
        }
    }

    public function getEditService(Request $request) {
        if($request->ajax()) {
            $account_setting = Sentinel::getUser()->account_setting;
            $services = Category::where('status', 1)->get();

            if($account_setting != null) {
                $attaSerives = $account_setting->services = json_decode($account_setting->services);
                $html = view('site.setting.edit', compact('services', 'attaSerives'))->render();
                
                return response()->json(['statusCode' => 200, 'data' => $html]);
            } else {
                $attaSerives = null;
                $html = view('site.setting.edit', compact('services', 'attaSerives'))->render();
            }
            
            return response()->json(['statusCode' => 200, 'data' => $html]);
        }
        return false;
    }
    public function postEditService(Request $request, $id) {
        if(Sentinel::getUser()->id == $id && Sentinel::getUser()->roles[0]->slug == 'tradeperson') {
            // dd($request->all());
            // $rules = [
            //     'services' => 'requried|array|min:1|max:3',
            //     'services.*' => 'requried|string|distinct'
            // ];
            // $messages = [
            //     'required'              => 'The :attribute field is required.',
            //     'services.min'          => 'Minimum 1 services services required.',
            //     'services.max'          => 'Maximum 3 characters services required.',
            // ];

            // dd(Sentinel::getUser()->account_setting->created_at == '');
            if(Sentinel::getUser()->account_setting){
                $setting = AccountSetting::where('user_id', $id)->update([
                    'user_id'       => Sentinel::getUser()->id,
                    'Services'      => json_encode($request->services),
                ]);
            } else {
                $setting = AccountSetting::create([
                    'user_id'       => Sentinel::getUser()->id,
                    'Services'      => json_encode($request->services),
                ]);
            }

            return Redirect::route('account_setting')->with('success', 'Edit has been updated successfully.');
        }

        return Redirect::route('account_setting');
    }
    public function destroy($id) {
        //
    }
    // public function getCoordinates() {
        //     $user = Sentinel::getUser();
        //     if(Sentinel::check()) {
        //         $data = [
        //             'user' => isset($user) ? $user : null,
        //             'userDetails' => isset($user->userDetails) ? $user->userDetails : null,
        //             'gData' => isset($user->gdata) ? json_decode($user->gdata->coordinates) : null 
        //         ];
        //         return response()->json(['statusCode' => 200, 'data' => $data]);
        //     } else {
        //         $data = 'Nothing get form database.';
        //         return response()->json(['statusCode' => 404, 'data' => $data]);
        //     }
    // }
    public function postEditWorkArea(Request $request) {

        if($request->isMethod('post') && Sentinel::check()){
            $is_found = GoogleData::where('user_id', $request->id)->first();
            if(!$is_found){
                GoogleData::create([
                    'user_id'       => $request->id,
                    'coordinates'   => json_encode($request->data),
                ]);
                return response()->json(['statusCode' => 200, 'success' => 'work area successfully save.']);
            } else {
                GoogleData::where('user_id', $request->id)->update([
                    'coordinates'   => json_encode($request->data)
                ]);
                return response()->json(['statusCode' => 200, 'success' => 'work area successfully updated.']);
            }
        } else {
            return response()->json(['statusCode' => 404, 'danger' => 'There is some problem, please contact to administrator.']);
        }
    }
    public function updatePassword(Request $request) {
        if($request->ajax()) {
            $user = Sentinel::getUser();
            if (Hash::check($request->oldpass, $user->password)) {
                $user->password = Hash::make($request->newpass);
                $user->save();
            
                return response()->json(['statusCode' => 200, 'success' => 'Your password change successfully.']);
            } else {
                return response()->json(['statusCode' => 400, 'error' => 'Invalid old password.']);
            }
        }
    }
    public function deleteAccount(Request $request) {
        if($request->ajax()) {
            $userID = Sentinel::getUser()->id;
            $user = User::find($userID);
            if($user->roles[0]->slug == "homeowner") {
                $jobs = $user->jobs;
                foreach ($jobs as $job) {
                    $job = Job::find($job->id);
                    $job->delete();
                }
                $user->delete();
                $user->userDetails->delete();
            } else {
                $user->delete();
                $user->userDetails->delete();
            }
            Sentinel::Logout();
            return response()->json(true, 200);
        } else {
            return response(null)->setStatusCode(400);
        }
        
    }
    public function notificationStatus(Request $request) {
        
        $user = Sentinel::getUser();
        if($user->roles[0]->slug == 'tradeperson') {
            if($request->notificationType == "pushNotification") {
                $res = $user->update([
                    'notification_allowed'  => $request->notificationStatus
                ]);
            } 
            if($request->notificationType == "textNotification") {
                $res = $user->update([
                    'sms_allowed'           => $request->notificationStatus
                ]);
            } 
            if($request->notificationType == "emailNotification") {
                $res = $user->update([
                    'email_allowed'         => $request->notificationStatus
                ]);
            }
            
            if($res) {
                return response()->json([
                    "success"   => true,
                    "message"   => "Notification Status Updated.",
                    "data"      => $res
                ], 202);
            } else {
                return response()->json([
                    "success"   => false,
                    "message"   => "Notification Status fail to update.",
                    "data"      => $res
                ], 400);
            }
        }
        
    }

}

<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\SiteSettingRequest;
use App\Models\SiteSetting;
use App\Models\Location;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Sentinel;
use Response;
use Image;
use File;

class SiteSettingController extends AWController {

    protected $locations;

    public function __construct(Location $locations)
    {
        parent::__construct();
        $this->locations         = $locations;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getSetting()
    {
        $data = new SiteSetting;
        $data = $data->first();
        $image_fields = ['image'];
        $locationDD = $this->locations->lists('name','id');
        $male_shirt_sizesdata = json_decode($data->male_shirt_sizes);
        $female_shirt_sizesdata = json_decode($data->female_shirt_sizes);

        //print_r($male_shirt_sizesdata);

        return view('admin.setting.site_settings', compact('data', 'locationDD', 'image_fields', 'male_shirt_sizesdata', 'female_shirt_sizesdata'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function postSetting(SiteSettingRequest $request, SiteSetting $site_setting)
    {
        if ($request->male_shirt_sizes) {
            $dataArray2 = [];
            foreach ($request->male_shirt_sizes as $key => $value) {
                 $dataArray2[$key] = array(
                    'male_shirt_sizes'    => $value
                );
            }
            $request['male_shirt_sizes'] = json_encode($dataArray2);
        }
        if ($request->female_shirt_sizes) {
            $dataArray3 = [];
            foreach ($request->female_shirt_sizes as $key => $value) {
                 $dataArray3[$key] = array(
                    'female_shirt_sizes'    => $value
                );
            }
            $request['female_shirt_sizes'] = json_encode($dataArray3);
        }

        $site_setting->whereId(1)->update($request->except('_token'));

        //return redirect('admin/site_setting')->withInput()->with('success', 'Site Settings updated successfully.');
        return redirect('admin/site_setting')->with('success', 'Site Settings updated successfully.');
    }

}

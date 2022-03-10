<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\ConfigurationRequest;
use App\Http\Requests\ThemeOptionRequest;
use App\Setting;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Sentinel;
use Response;
use Image;
use File;

class SettingController extends AWController {

    public function __construct()
    {
        Sentinel::check();
        parent::__construct();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getThemeOption()
    {
        $theme_options = Setting::select(['id', 'option_name', 'option_value'])->where('option_type', 'theme_option')->get();

        foreach ($theme_options as $key => $theme_option) {
            $data[$theme_option->option_name] = $theme_option->option_value;
        }

        $image_fields = ['site_logo'];

        return view('admin.setting.theme_option', compact('data', 'image_fields'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function postThemeOption(ThemeOptionRequest $request, Setting $setting)
    {
        foreach ($request->all() as $option_name => $option_value) {
            $setting->where('option_name', $option_name)
                    ->where('option_type', 'theme_option')
                    ->update(['option_value' => $option_value]);
        }

        return redirect('admin/theme_option')->withInput()->with('success', 'Theme opptions updated successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getConfiguration()
    {
        $configurations = Setting::select(['id', 'option_name', 'option_value'])->where('option_type', 'configuration')->get();

        foreach ($configurations as $key => $configuration) {
            $data[$configuration->option_name] = $configuration->option_value;
        }

        return view('admin.setting.configuration', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function postConfiguration(ConfigurationRequest $request, Setting $setting)
    {
        foreach ($request->all() as $option_name => $option_value) {
            $setting->where('option_name', $option_name)
                    ->where('option_type', 'configuration')
                    ->update(['option_value' => $option_value]);
        }

        return redirect('admin/configuration')->withInput()->with('success', 'Site configuration updated successfully.');
    }

}

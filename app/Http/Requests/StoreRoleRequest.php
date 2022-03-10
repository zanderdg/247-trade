<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class StoreRoleRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Sentinel::check()){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required|min:7',
            'slug'          => 'required',
            // 'description'   => ,
            // 'permissions'         => 'required',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'             => 'Role name is required.',
            'name.min'                  => 'Minimum 7 charater at least.',
            'slug.required'             => 'Slug is required.',
        ];
    }
}

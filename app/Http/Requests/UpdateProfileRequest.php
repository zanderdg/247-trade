<?php

namespace App\Http\Requests;

use Sentinel;
use App\Http\Requests\Request;

class UpdateProfileRequest extends Request
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
            'bio'           => 'string|max:1000',
            'dob'           => 'date',
            'gender'        => 'string',
            'state'         => 'string',
            'city'          => 'string',
            'address'       => 'string',
            'postal'        => 'string|min:4|max:12',
            'country'       => 'string'
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
            'postal.min'        => 'Postal code min lenght is :min.',
            'postal.max'        => 'Postal code max lenght is :max.',
            'postal.alpha_num'  => 'This field accept alphanumeric.',
            'alpha_num'         => ':attribute not accept special characters.',
            'bio.max'           => 'This field character lenght is :max.',
            'required'          => ':attribute is required.'
        ];
    }
}

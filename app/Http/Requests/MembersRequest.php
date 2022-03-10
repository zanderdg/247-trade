<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MembersRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'asking_price'       => 'required|min:3',
			// 'content' => 'required|min:3',
			// 'status'      => 'required|integer',
		];
	}

	public function messages()
{
    return [
        'asking_price.required' => 'A title is required',
        'body.required'  => 'A message is required',
    ];
}

}

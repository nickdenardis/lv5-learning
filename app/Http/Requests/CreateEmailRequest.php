<?php namespace Incremently\Http\Requests;

use Incremently\Http\Requests\Request;

class CreateEmailRequest extends Request {

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
			'title' => 'required|min:8',
            'body' => 'required',
		];
	}

}

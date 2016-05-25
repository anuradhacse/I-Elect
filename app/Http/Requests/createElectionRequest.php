<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class createElectionRequest extends Request
{
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
            'name' => 'required|max:255',
            'details' => 'required',
            'start_date' => 'required|date',
            'start_time'=>'required',
            'end_date'=>'required|date',
            'end_time'=>'required',

        ];
    }
}

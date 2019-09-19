<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsertOptionRequest extends FormRequest
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
            'vote_id'   => ['required','numeric','min:1','exists:votes,id'],
            'enable'    => ['boolean'],
            'title'     => ['required'],
            'order'     => ['numeric','min:0'],
        ];
    }
}

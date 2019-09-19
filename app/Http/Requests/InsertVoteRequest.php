<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsertVoteRequest extends FormRequest
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
            'owner_id'      => ['required','numeric','min:1','exists:users,id'],
            'category_id'   => ['required','numeric','min:1','exists:categories,id'],
            'enable'        => ['boolean'],
            'subject'       => ['required'],
            'order'         => ['numeric','min:0'],
            'valid_since'   => ['date'] ,
            'valid_until'   => ['date'] ,
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Rules\Active;
use App\Rules\Enable;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InsertUserVote extends FormRequest
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
     * @param Request $request
     * @return array
     */
    public function rules(Request $request)
    {
        $voteID = $request->input('vote_id');
        return [
            'user_id'    => ['required'],
            'vote_id'    => ['required' , new Active],
            'option_id'  => ['required' , new Enable , Rule::exists('options','id')->where('vote_id', $voteID)],
        ];
    }
}

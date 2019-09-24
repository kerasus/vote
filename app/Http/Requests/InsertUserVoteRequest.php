<?php

namespace App\Http\Requests;

use App\Rules\Active;
use App\Rules\Enable;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InsertUserVoteRequest extends FormRequest
{
    private $voteID;

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
        return [
            'user_id'    => ['required','min:1' , Rule::unique('user_vote_option')->where(function ($query)  {
                return $query->where('vote_id', $this->voteID );
            })],
            'vote_id'    => ['required' , new Active],
            'option_id'  => ['required' , new Enable , Rule::exists('options','id')->where('vote_id', $this->voteID)],
        ];
    }

    public function prepareForValidation()
    {
        $input = $this->request->all();
        $this->voteID = $input['vote_id'];
        $input['user_id'] = request()->user()->id;
        $this->replace($input);
        parent::prepareForValidation();
    }
}

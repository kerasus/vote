<?php

namespace App\Http\Controllers\Api;

use App\Classes\Response as myResponse;
use App\Http\Requests\InsertUserVoteRequest;
use App\Option;
use App\Repositories\UserVoteOptionRepo;
use App\Traits\HTTPRequestTrait;
use App\UserVoteOption;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class UserVoteOptionContoller extends Controller
{
    use HTTPRequestTrait;

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return string
     */
    public function index(Request $request)
    {
        return UserVoteOptionRepo::getRecords($request->all())->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param InsertUserVoteRequest $request
     * @return Response
     */
    public function store(InsertUserVoteRequest $request)
    {
        $option = Option::Find($request->input('option_id'));
        if(!isset($option)){
            return response()->json($this->setErrorResponse(myResponse::OPTION_NOT_EXISTS, __('The given data was invalid.'),
                'option_id' ,[__('validation.exists' , ['attribute' => __('validation.attributes.option_id')])]) , Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if(!$option->enable){
            return response()->json($this->setErrorResponse(myResponse::OPTION_NOT_ACTIVE, __('The given data was invalid.'),
                'option_id' , [__('validation.enable' , ['attribute' => __('validation.attributes.option_id')])]
            ) , Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $vote = $option->vote;
        if(!isset($vote)){
            return response()->json($this->setErrorResponse(myResponse::VOTE_NOT_EXISTS, __('The given data was invalid.'),
                'vote_id' , [__('validation.exists' , ['attribute' => __('validation.attributes.vote_id')])]) , Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if( !$vote->enable ||
            (isset($vote->valid_since) && $vote->valid_since > Carbon::now('Asia/Tehran')) ||
            (isset($vote->valid_until) && $vote->valid_until < Carbon::now('Asia/Tehran')) )
        {
            return response()->json($this->setErrorResponse(myResponse::VOTE_NOT_ACTIVE, __('The given data was invalid.'),
                'vote_id' , [__('validation.active' , ['attribute' => __('validation.attributes.vote_id')])]) , Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if(UserVoteOptionRepo::hasUserVoted($request->user()->id, $vote->id)->get()->isNotEmpty()){
            return response()->json($this->setErrorResponse(myResponse::USER_HAS_VOTED_BEFORE, __('The given data was invalid.'),
                'user_id' , [__('validation.custom.user_id.unique')]) , Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $request->offsetSet('vote_id', $option->vote_id );
        $request->offsetSet('user_id', $request->user()->id );
        $userVoteOption = UserVoteOption::create($request->all());
        if(isset($userVoteOption)){
            return response()->json([
                'message'   => __('messages.database_success_insert' , ['resource' => 'رای کاربر']),
                'vote'      => $userVoteOption->vote ,
                'category'  =>  $userVoteOption->vote->category,
            ]);
        }

        return response()->json($this->setErrorResponse(myResponse::DATABASE_ERROR_ON_INSERTING_USER_VOTE, __('messages.database_error_insert' , ['resource'=>'رای کاربر'])) , Response::HTTP_INTERNAL_SERVER_ERROR);

    }

    /**
     * Display the specified resource.
     *
     * @param UserVoteOption $userVoteOption
     * @return UserVoteOption
     */
    public function show(UserVoteOption $userVoteOption)
    {
        return $userVoteOption;
    }
}

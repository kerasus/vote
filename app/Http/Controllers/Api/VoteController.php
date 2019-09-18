<?php

namespace App\Http\Controllers\Api;

use App\Classes\Response as myResponse;
use App\Http\Requests\InsertVoteRequest;
use App\Traits\HTTPRequestTrait;
use App\Vote;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class VoteController extends Controller
{
    use HTTPRequestTrait;

    public function index(Request $request){
        return Vote::where('owner_id' , $request->user()->id)->get();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Vote $vote
     * @return Vote
     */
    public function show(Request $request , Vote $vote)
    {
        return $vote;
    }

    public function store(InsertVoteRequest $request){
        $vote = Vote::create($request->all());
        if(isset($vote)){
            return response()->json([
                'message' => __('messages.database_success_insert' , ['resource' => 'سوال']) ,
                'vote'    => $vote,
            ]);
        }

        return response()->json($this->setErrorResponse(myResponse::DATABASE_ERROR_ON_INSERTING_VOTE, __('messages.database_error_insert' , ['resource'=>'سوال'])) , Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function update(Request $request , Vote $vote){
        if($vote->update($request->all())){
            return response()->json([
                'message' => __('messages.database_success_update' , ['resource' => 'سوال']) ,
                'vote'    => $vote,
            ]);
        }

        return response()->json($this->setErrorResponse(myResponse::DATABASE_ERROR_ON_UPDATING_VOTE, __('messages.database_error_update' , ['resource'=>'سوال'])) , Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Removes the specified resource.
     *
     * @param Request $request
     * @param Vote $vote
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Request $request , Vote $vote){
        if($vote->delete()){
            return response()->json([
                'message' => __('messages.database_success_delete' , ['resource' => 'سوال']) ,
            ]);
        }

        return response()->json($this->setErrorResponse(myResponse::DATABASE_ERROR_ON_DELETING_VOTE, __('messages.database_error_delete' , ['resource'=>'سوال'])) , Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}

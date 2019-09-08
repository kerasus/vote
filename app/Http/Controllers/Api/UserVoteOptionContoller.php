<?php

namespace App\Http\Controllers\Api;

use App\Classes\Response as myResponse;
use App\Http\Requests\InsertUserVote;
use App\Option;
use App\Repositories\UserVoteOptionRepo;
use App\Traits\HTTPRequestTrait;
use App\UserVoteOption;
use App\Vote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return UserVoteOptionRepo::getRecords($request->all())->get()->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InsertUserVote $request)
    {
//        $userID = $request->user()->id;
        $userID = $request->input('user_id');
        $voteID = $request->input('vote_id');
        $hasUserVoted = $this->hasUserVoted($userID , $voteID);
        if($hasUserVoted){
            return response()->json($this->setErrorResponse(myResponse::USER_HAS_VOTED_BEFORE, 'User has voted for this question before'));
        }

        $userVoteOption = new UserVoteOption($request->all());
        if($userVoteOption->save()){
            return response()->json([
                'vote' => $userVoteOption->vote ,
                'category'  =>  $userVoteOption->vote->category,
                'message' => 'User vote stored successfully'
            ]);
        }else{
            return response()->json($this->setErrorResponse(myResponse::COULD_NOT_INSERT_USER_VOTE, 'Could not insert user vote'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param UserVoteOption $userVoteOption
     * @return UserVoteOption
     */
    public function show(Request $request, UserVoteOption $userVoteOption)
    {
        return $userVoteOption;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function hasUserVoted(int $userID, int $voteID):bool
    {
        return UserVoteOptionRepo::getRecords([
            'user_id' => $userID ,
            'vote_id' => $voteID ,
        ])->get()->isNotEmpty();
    }
}

<?php

namespace App\Http\Middleware;

use App\Classes\Response as myResponse;
use App\Repositories\UserVoteOptionRepo;
use App\Traits\HTTPRequestTrait;
use Closure;

class HasUserVoted
{
    use HTTPRequestTrait;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//      $userID = $request->user()->id;
        $userID = $request->input('user_id');
        $voteID = $request->input('vote_id');
        $hasUserVoted = $this->hasUserVoted($userID , $voteID);
        if($hasUserVoted){
            return response()->json($this->setErrorResponse(myResponse::USER_HAS_VOTED_BEFORE, 'User has voted for this question before'));
        }

        return $next($request);
    }

    private function hasUserVoted(int $userID, int $voteID):bool
    {
        return UserVoteOptionRepo::getRecords([
            'user_id' => $userID ,
            'vote_id' => $voteID ,
        ])->get()->isNotEmpty();
    }


}

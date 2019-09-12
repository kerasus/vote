<?php

namespace App\Http\Middleware;

use App\Classes\Response as myResponse;
use App\Repositories\UserVoteOptionRepo;
use App\Traits\HTTPRequestTrait;
use Closure;
use Illuminate\Http\Response;

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
        if(UserVoteOptionRepo::hasUserVoted($userID , $voteID)->get()->isNotEmpty()){
            return response()->json($this->setErrorResponse(myResponse::USER_HAS_VOTED_BEFORE, __('User has voted for this question before')) , Response::HTTP_CONFLICT);
        }

        return $next($request);
    }
}

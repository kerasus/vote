<?php

namespace App\Http\Controllers\Api;

use App\Vote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VoteController extends Controller
{
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
}

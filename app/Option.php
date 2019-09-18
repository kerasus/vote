<?php

namespace App;

use App\Repositories\UserVoteOptionRepo;
use App\Traits\ScopeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Auth;

/**
 * @property mixed tmp_count
 * @property mixed vote
 * @property mixed vote_id
 * @property mixed id
 */
class Option extends Model
{
    use ScopeTrait;

    protected $appends = [
      'ratio',
        'hasUserChosen'
    ];

    protected $fillable = [
        'vote_id',
        'title',
        'enable',
        'order',
        'tmp_count',
    ];

    public function vote(){
        return $this->belongsTo(Vote::Class);
    }

    public function users(){
        return $this->hasManyThrough(User::Class , UserVoteOption::Class);
    }

    public function getRatioAttribute(){
        $vote = $this->vote()->first();
        if(!isset($vote) || $vote->tmp_count == 0){
            return 0;
        }

        return (int)(($this->tmp_count / $vote->tmp_count)*100);
    }

    public function getHasUserChosenAttribute():?bool{
        if(!Auth::check()){
            return null;
        }

        /** @var User $user */
        $user = Auth::user();
        if(UserVoteOptionRepo::hasUserChosenOption($user->id , $this->id)->get()->isNotEmpty()){
            return true;
        }

        return false;
    }
}

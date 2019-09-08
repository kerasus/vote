<?php

namespace App;

use App\Traits\ScopeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * @property mixed tmp_count
 * @property mixed vote
 * @property mixed vote_id
 */
class Option extends Model
{
    use ScopeTrait;

    protected $appends = [
      'ratio',
    ];

    protected $fillable = [
        'vote_id',
        'title',
        'tmp_count',
        'order',
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
}

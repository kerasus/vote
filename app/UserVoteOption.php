<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed vote
 * @property mixed option
 */
class UserVoteOption extends Model
{
    use SoftDeletes;

    protected $table='user_vote_option';

    protected $with = [
       'user',
       'vote',
       'option'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id' ,
        'vote_id' ,
        'option_id' ,
    ];

    public function user(){
        return $this->belongsTo(User::Class);
    }

    public function vote(){
        return $this->belongsTo(Vote::Class);
    }

    public function option(){
        return $this->belongsTo(Option::Class);
    }
}

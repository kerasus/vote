<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserVoteOption extends Model
{
    protected $table='user_vote_option';

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
        return $this->belongsToMany(User::Class);
    }

    public function vote(){
        return $this->belongsToMany(Vote::Class);
    }

    public function option(){
        return $this->belongsToMany(Option::Class);
    }
}

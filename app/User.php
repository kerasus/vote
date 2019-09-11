<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property mixed first_name
 * @property mixed last_name
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'foreign_id' ,
        'UUID' ,
        'first_name' ,
        'last_name' ,
        'mobile' ,
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function votes(){
        return $this->hasManyThrough(Vote::Class , UserVoteOption::Class);
    }

    public function options(){
        return $this->hasManyThrough(Option::Class , UserVoteOption::Class);
    }

    public function ownedVotes(){
        return $this->hasMany(User::Class);
    }

    public function getFullNameAttribute(){
        return $this->first_name.' '.$this->last_name;
    }
}
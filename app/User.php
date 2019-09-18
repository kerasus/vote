<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

/**
 * @property mixed first_name
 * @property mixed last_name
 * @property mixed id
 */
class User extends Authenticatable
{
    use SoftDeletes , Notifiable , HasApiTokens;

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
        'national_code',
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

    public function getAppToken()
    {
        $tokenResult = $this->createToken(config('app.name'));

        return [
            'access_token'     => $tokenResult->accessToken,
            'token_type'       => 'Bearer',
            'token_expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
        ];
    }

}

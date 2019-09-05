<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
        'subject',
        'valid_since',
        'valid_until',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'valid_since' => 'datetime',
        'valid_until' => 'datetime',
    ];

    public function options(){
        return $this->hasMany(Option::Class);
    }

    public function users(){
        return $this->hasManyThrough(User::Class , UserVoteOption::Class);
    }
}

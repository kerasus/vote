<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed owner
 */
class Vote extends Model
{
    protected $fillable = [
        'subject',
        'valid_since',
        'valid_until',
        'tmp_count',
    ];

    protected $appends = [
        'owner' ,
        'options',
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

    public function owner(){
        return $this->belongsTo(User::Class , 'owner_id' , 'id');
    }

    public function getOptionsAttribute(){
        return $this->options()->get();
    }

    public function getOwnerAttribute(){
        return $this->owner()->first();
    }
}

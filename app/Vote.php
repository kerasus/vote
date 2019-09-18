<?php

namespace App;

use App\Repositories\UserVoteOptionRepo;
use App\Traits\ScopeTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * @property mixed owner
 * @property mixed id
 */
class Vote extends Model
{
    use ScopeTrait;

    protected $fillable = [
        'owner_id',
        'category_id',
        'subject',
        'enable',
        'order' ,
        'valid_since',
        'valid_until',
        'tmp_count',
    ];

    protected $appends = [
        'owner' ,
        'options',
        'hasUserVoted'
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

    public function category(){
        return $this->belongsTo(Category::Class);
    }

    public function getOptionsAttribute(){
        return $this->options()->orderBy('order')->enable()->get();
    }

    public function getOwnerAttribute(){
        return $this->owner()->first();
    }

    public function getMostSelectedOptionCountAttribute(){
        return $this->options()->enable()->orderByDesc('tmp_count')->first()->tmp_count;
    }

    public function scopeActive(Builder $query):Builder{
        return $query->enable()->valid();
    }

    public function getHasUserVotedAttribute():?bool{
        if(!Auth::check()){
            return null;
        }
        /** @var User $user */
        $user = Auth::user();
        if(UserVoteOptionRepo::hasUserVoted($user->id , $this->id)->get()->isNotEmpty()){
            return true;
        }

        return false;
    }
}

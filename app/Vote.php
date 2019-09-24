<?php

namespace App;

use App\Http\Controllers\Api\VoteController;
use App\Repositories\UserVoteOptionRepo;
use App\Traits\ScopeTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed owner
 * @property mixed id
 */
class Vote extends Model
{
    use SoftDeletes;
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
        'hasUserVoted',
        'action',
        'mostSelectedOptionCount',
    ];

    protected $hidden = [
        'owner_id',
        'category_id',
        'enable',
        'valid_since',
        'valid_until',
        'deleted_at',
        'created_at',
        'updated_at',
        'owner'
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
        return $this->options()->orderByDesc('tmp_count')->orderBy('order')->enable()->get();
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
        if(!auth('api')->check()){
            return null;
        }
        /** @var User $user */
        $user = auth('api')->user();
        if(UserVoteOptionRepo::hasUserVoted($user->id , $this->id)->get()->isNotEmpty()){
            return true;
        }

        return false;
    }

    public function getActionAttribute(){
        return [
            'show'   => action([VoteController::class, 'show'] , $this),
            'update' => action([VoteController::class, 'update'] , $this),
            'delete' => action([VoteController::class, 'destroy'] , $this),
        ];
    }
}

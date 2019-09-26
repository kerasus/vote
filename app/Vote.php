<?php

namespace App;

use App\Http\Controllers\Api\VoteController;
use App\Repositories\UserVoteOptionRepo;
use App\Traits\ScopeTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Vote
 *
 * @property mixed owner
 * @property mixed id
 * @property int $id
 * @property int|null $owner_id آی دی کاربر ایجاد کننده سوال
 * @property int|null $category_id دسته سوال
 * @property string|null $subject صورت سوال
 * @property int $enable فعال یا غیرفعال بودن سوال
 * @property int $order ترتیب سوال
 * @property \Illuminate\Support\Carbon|null $valid_since تاریخ شروع نظرسنجی
 * @property \Illuminate\Support\Carbon|null $valid_until تاریخ پایان نظرسنجی
 * @property int $tmp_count تعداد کل دفعات شرکت کردن در این سوال
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Category|null $category
 * @property-read mixed $action
 * @property-read mixed $has_user_voted
 * @property-read mixed $most_selected_option_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Option[] $options
 * @property-read \App\User|null $owner
 * @property-read int|null $options_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vote active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vote enable()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vote newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Vote onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vote query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vote valid()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vote whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vote whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vote whereEnable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vote whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vote whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vote whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vote whereTmpCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vote whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vote whereValidSince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vote whereValidUntil($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Vote withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Vote withoutTrashed()
 * @mixin \Eloquent
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

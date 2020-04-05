<?php

namespace App;

use App\Http\Controllers\Api\OptionController;
use App\Repositories\UserVoteOptionRepo;
use App\Traits\ScopeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Option
 *
 * @property mixed tmp_count
 * @property mixed vote
 * @property mixed vote_id
 * @property mixed id
 * @property int $id
 * @property int $vote_id آی دی سوال نظرسنجی که دارای این گزینه است
 * @property string|null $title عنوان گزینه
 * @property int $enable فعال یا غیر فعال بودن گزینه
 * @property int $order ترتیب گزینه
 * @property int $tmp_count تعداد دفعات امتخاب شدن این گزینه
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read mixed $action
 * @property-read mixed $has_user_chosen
 * @property-read mixed $ratio
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @property-read \App\Vote $vote
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Option enable()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Option newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Option newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Option onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Option query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Option valid()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Option whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Option whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Option whereEnable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Option whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Option whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Option whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Option whereTmpCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Option whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Option whereVoteId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Option withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Option withoutTrashed()
 * @mixin \Eloquent
 */
class Option extends Model
{
    use SoftDeletes;
    use ScopeTrait;

    protected $fillable = [
        'vote_id',
        'title',
        'enable',
        'order',
        'tmp_count',
    ];

    protected $appends = [
        'ratio',
        'hasUserChosen',
        'action',
    ];

    protected $hidden = [
        'vote_id',
        'enable',
        'deleted_at',
        'created_at',
        'updated_at'
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

    public function getHasUserChosenAttribute():?bool{
        if(!auth('api')->check()){
            return null;
        }

        /** @var User $user */
        $user = auth('api')->user();
        if(UserVoteOptionRepo::hasUserChosenOption($user->id , $this->id)->get()->isNotEmpty()){
            return true;
        }

        return false;
    }

    public function getActionAttribute(){
        return [
            'show'   => action([OptionController::class, 'show'] , $this),
            'update' => action([OptionController::class, 'update'] , $this),
            'delete' => action([OptionController::class, 'destroy'] , $this),
        ];
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\UserVoteOption
 *
 * @property mixed vote
 * @property mixed option
 * @property int $id
 * @property int $user_id آی دی کاربر نظر دهنده
 * @property int $vote_id آی دی سوال نظرسنجی
 * @property int $option_id آی ئی گزینه انتخاب شده
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Option $option
 * @property-read \App\User $user
 * @property-read \App\Vote $vote
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserVoteOption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserVoteOption newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\UserVoteOption onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserVoteOption query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserVoteOption whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserVoteOption whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserVoteOption whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserVoteOption whereOptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserVoteOption whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserVoteOption whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserVoteOption whereVoteId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\UserVoteOption withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\UserVoteOption withoutTrashed()
 * @mixin \Eloquent
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

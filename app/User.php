<?php

namespace App;

use App\Classes\Verification\MustVerifyMobileNumber;
use App\Traits\MustVerifyMobileNumberTrait;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

/**
 * App\User
 *
 * @property mixed first_name
 * @property mixed last_name
 * @property mixed id
 * @property int $id
 * @property int|null $foreign_id آی دی کاربر در سایت خارجی
 * @property string|null $UUID آی یونیورسال
 * @property string|null $first_name نام کوچک
 * @property string|null $last_name نام خانوادگی
 * @property string|null $mobile شماره موبایل کاربر
 * @property string|null $mobile_verified_code کد احراز هویت موبایل
 * @property string|null $mobile_verified_at تاریخ احراز هویت موبایل
 * @property string|null $national_code کد ملی کاربر
 * @property string|null $email آدرس ایمیل
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read int|null $clients_count
 * @property-read mixed $full_name
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Option[] $options
 * @property-read int|null $options_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $ownedVotes
 * @property-read int|null $owned_votes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Vote[] $votes
 * @property-read int|null $votes_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereForeignId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereMobileVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereMobileVerifiedCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereNationalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUUID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\User withoutTrashed()
 * @mixin \Eloquent
 */
class User extends Authenticatable implements MustVerifyEmail , MustVerifyMobileNumber
{
    use SoftDeletes , Notifiable , HasApiTokens , MustVerifyMobileNumberTrait;

    protected $redirectTo = '/';
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
        if(!isset($this->firstName) && !isset($this->lastName)){
            return null;
        }

        return ucfirst($this->firstName).' '.ucfirst($this->lastName);
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

    public function routeNotificationForPhoneNumber()
    {
        return ltrim($this->mobile, '0');
    }
}

<?php

namespace App;

use App\Http\Controllers\Api\CategoryController;
use App\Traits\ScopeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Category
 *
 * @property int $id
 * @property string|null $name نام دسته
 * @property string|null $display_name نام قابل نمایش دسته
 * @property int $order ترتیب دسته
 * @property int $enable فعال یا غیرفعال بودن دسته
 * @property int $isDefault آیا آکاردیون دسته به صورت پیش فرض باز شود یا خیر
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read mixed $action
 * @property-read mixed $sorted_votes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Vote[] $votes
 * @property-read int|null $votes_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category enable()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Category onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category valid()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereEnable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Category withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Category withoutTrashed()
 * @mixin \Eloquent
 */
class Category extends Model
{
    use SoftDeletes;
    use ScopeTrait;

    protected $fillable = [
        'name',
        'display_name',
        'order',
        'enable',
        'isDefault',
    ];

    protected $appends = [
        'sorted_votes',
        'action',
    ];

    protected $hidden = [
        'votes',
        'deleted_at',
        'enable',
        'created_at',
        'updated_at',
    ];

    public function votes(){
        return $this->hasMany(Vote::Class);
    }

    public function getSortedVotesAttribute(){
        return $this->votes()->active()->orderBy('order')->get()->sortByDesc('most_selected_option_count')->values();
    }

    public function getActionAttribute(){
        return [
            'show'   => action([CategoryController::class, 'show'] , $this),
            'update' => action([CategoryController::class, 'update'] , $this),
            'delete' => action([CategoryController::class, 'destroy'] , $this),
        ];
    }
}

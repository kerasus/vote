<?php

namespace App;

use App\Http\Controllers\Api\CategoryController;
use App\Traits\ScopeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    use ScopeTrait;

    protected $fillable = [
        'name',
        'display_name',
        'order',
        'enable',
    ];

    protected $appends = [
        'sorted_votes',
        'action',
    ];

    protected $hidden = [
        'votes',
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

<?php

namespace App;

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
    ];

    protected $hidden = [
        'votes',
    ];

    public function votes(){
        return $this->hasMany(Vote::Class);
    }

    public function getSortedVotesAttribute(){
        return $this->votes()->active()->orderBy('order')->get()->sortByDesc('most_selected_option_count');
    }
}

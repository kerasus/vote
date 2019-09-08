<?php

namespace App;

use App\Traits\ScopeTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use ScopeTrait;

    protected $fillable = [
        'name',
        'display_name',
        'order',
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

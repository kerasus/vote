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
    ];

    protected $appends = [
        'votes',
    ];

    public function votes(){
        return $this->hasMany(Vote::Class);
    }

    public function getVotesAttribute(){
        return $this->votes()->active()->get();
    }
}

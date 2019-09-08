<?php


namespace App\Traits;


use Illuminate\Database\Eloquent\Builder;

trait ScopeTrait
{
    public function scopeEnable(Builder $query):Builder{
        return $query->where('enable' , 1);
    }

}

<?php


namespace App\Traits;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

trait ScopeTrait
{
    public function scopeEnable(Builder $query):Builder{
        return $query->where('enable' , 1);
    }

    public function scopeValid(Builder $query):Builder{
        return $query->where(function (Builder $q){
            $q->whereNull('valid_since')
                ->orWhere('valid_since', '<=' , Carbon::now());
        })->where(function (Builder $q2){
            $q2->whereNull('valid_until')
                ->orWhere('valid_until', '>=' , Carbon::now());
        });
    }
}

<?php


namespace App\Repositories;


use App\Category;
use Illuminate\Database\Eloquent\Builder;

class CategoryRepo
{
    public static function getEnableCategories():Builder{
        return Category::enable()->orderBy('order');
    }
}

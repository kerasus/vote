<?php


namespace App\Repositories;


use App\Category;
use Illuminate\Database\Query\Builder;

class CategoryRepo
{
    public static function getEnableCategories():Builder{
        return Category::enable();
    }
}

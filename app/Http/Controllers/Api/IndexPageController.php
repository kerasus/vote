<?php

namespace App\Http\Controllers\Api;

use App\Repositories\CategoryRepo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexPageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return string
     */
    public function __invoke(Request $request)
    {
        return CategoryRepo::getEnableCategories()->get();
    }
}

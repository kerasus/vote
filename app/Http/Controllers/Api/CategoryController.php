<?php

namespace App\Http\Controllers\Api;

use App\Classes\Response as myResponse;
use App\Http\Requests\InsertCategoryRequest;
use App\Traits\HTTPRequestTrait;
use App\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    use HTTPRequestTrait;

    public function index(Request $request){
        return Category::all();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Category $category
     * @return Category
     */
    public function show(Request $request , Category $category)
    {
        return $category;
    }

    public function store(InsertCategoryRequest $request){
        $category =Category::create($request->all());
        if(isset($category)){
            return response()->json([
                'message'   => __('messages.database_success_insert' , ['resource' => 'دسته']) ,
                'category'  => $category,
            ]);
        }

        return response()->json($this->setErrorResponse(myResponse::DATABASE_ERROR_ON_INSERTING_CATEGORY, __('messages.database_error_insert' , ['resource'=>'دسته'])) , Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function update(Request $request , Category $category){
        if($category->update($request->all())){
            return response()->json([
                'message'  => __('messages.database_success_update' , ['resource' => 'دسته']) ,
                'category' => $category,
            ]);
        }

        return response()->json($this->setErrorResponse(myResponse::DATABASE_ERROR_ON_UPDATING_CATEGORY, __('messages.database_error_update' , ['resource'=>'دسته'])) , Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Removes the specified resource.
     *
     * @param Request $request
     * @param Category $category
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Request $request , Category $category){
        if($category->delete()){
            return response()->json([
                'message' => __('messages.database_success_delete' , ['resource' => 'دسته']) ,
            ]);
        }

        return response()->json($this->setErrorResponse(myResponse::DATABASE_ERROR_ON_DELETING_CATEGORY, __('messages.database_error_delete' , ['resource'=>'دسته'])) , Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}

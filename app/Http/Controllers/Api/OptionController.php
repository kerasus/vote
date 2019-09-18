<?php

namespace App\Http\Controllers\Api;

use App\Classes\Response as myResponse;
use App\Http\Requests\InsertOptionRequest;
use App\Option;
use App\Traits\HTTPRequestTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class OptionController extends Controller
{
    use HTTPRequestTrait;
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Collection
     */
    public function index(Request $request)
    {
        $options = Option::query();

        $vote_id = $request->get('vote_id');
        if(isset($vote_id)){
            $options->where('vote_id' , $vote_id );
        }

        return $options->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(InsertOptionRequest $request)
    {
        if(Option::create($request->all())){
            return response()->json([
                'message' => __('messages.database_success_insert' , ['resource' => 'گزینه']) ,
            ]);
        }

        return response()->json($this->setErrorResponse(myResponse::DATABASE_ERROR_ON_INSERTING_OPTION, __('messages.database_error_insert' , ['resource'=>'گزینه'])) , Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Display the specified resource.
     *
     * @param Option $option
     * @return Response
     */
    public function show(Option $option)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Option $option
     * @return Response
     */
    public function update(Request $request, Option $option)
    {
        if($option->update($request->all())){
            return response()->json([
                'message' => __('messages.database_success_update' , ['resource' => 'سوال']) ,
            ]);
        }

        return response()->json($this->setErrorResponse(myResponse::DATABASE_ERROR_ON_UPDATING_OPTION, __('messages.database_error_update' , ['resource'=>'سوال'])) , Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Option $option
     * @return Response
     * @throws \Exception
     */
    public function destroy(Option $option)
    {
        if($option->delete()){
            return response()->json([
                'message' => __('messages.database_success_delete' , ['resource' => 'گزینه' ]) ,
            ]);
        }

        return response()->json($this->setErrorResponse(myResponse::DATABASE_ERROR_ON_DELETING_OPTION, __('messages.database_error_delete' , ['resource'=>'گزینه'])) , Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}

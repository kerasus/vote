<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Enable implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $model = ucfirst(explode('_' , $attribute)[0]);
        $obj = call_user_func('\App\Repositories\\'.$model.'Repo::getRecords' , ['id'=>$value] );
        $obj = $obj->enable()->first();
        return (isset($obj));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.enable');
    }
}

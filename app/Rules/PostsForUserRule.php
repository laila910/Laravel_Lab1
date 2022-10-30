<?php

namespace App\Rules;

use Illuminate\Support\Facades\DB;

use Illuminate\Contracts\Validation\Rule;
// use Illuminate\Contracts\Validation\DataAwareRule;
// use Illuminate\Contracts\Validation\ValidatorAwareRule;


class PostsForUserRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $data = [];
    public function __construct()
    {
        //
    }
    // public function setData($data)
    // {
    //     $this->data = $data;
 
    //     return $this;
    // // }
    // public function setValidator($validator)
    // {
    //     $this->validator = $validator;
 
    //     return $this;
    // }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

    //     $count=DB::table('users')->where($attribute,$value)->count();
    //    return $count >= 3;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "you can\'t create more than 3 posts";
    }
}

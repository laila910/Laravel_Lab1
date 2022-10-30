<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\DB;


use App\Rules\PostsForUserRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreAndUpdateStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   
        // dd(StoreAndUpdateStoreRequest::segments(),$this->method());  to get the method 
        if( $this->method()=='PUT' ) {
            
            return [ 
                'title' => 'required|min:3',
                'description' => 'required|min:5', 
                'user_id' =>'exists:posts',
                'image'=>"image|mimes:png,jpg|max:2048"
            ];
        }else{
           
        return [
            'title' => 'sometimes|required|min:3|unique:posts',
            'description' => 'sometimes|required|min:5',  
            'user_id'=>'sometimes|exists:posts',//new PostsForUserRule
            'image'=>['sometimes','image','mimes:png,jpg','max:2048']
        ]; 
        }
    }
    public function messages()
    {
        return [
            'title.required' => '* Post Title is Required :(',
            'title.min' => '* Post Title must be greater than 3 characters ',
            'description.required'=>'* Post Description is Required :(',
            'description.min'=>'* Post Description Must be greater Than 5 characters',
            'title.unique'=>'* Post Title is already exist :(', 
        ];
    }
}

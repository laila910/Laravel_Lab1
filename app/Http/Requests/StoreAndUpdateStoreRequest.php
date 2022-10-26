<?php

namespace App\Http\Requests;

use App\Models\Post;
use App\Models\User;

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
            'title' => ['required','min:3','unique:posts'],
            'description' => ['required','min:5'],  
            'user_id'=>['exists:users'] ,
            'image'=>['image','mimes:png,jpg','max:2048']
            
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

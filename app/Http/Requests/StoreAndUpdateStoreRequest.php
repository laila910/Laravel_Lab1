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
        
        if( count( StoreAndUpdateStoreRequest::segments() ) > 1 ) {
          
            $post_id = StoreAndUpdateStoreRequest::segments()[1];
            // dd($this->post);
            return [
                'title' => 'required|min:3|unique:posts,title',
                'description' => 'required|min:5,description', 
                'user_id' =>'exists:posts,user_id',
                'image'=>"image|mimes:png,jpg|max:2048,image"
                // 'postImage'=>'image|mimes:jpg,png|max:2048,postImage'.$post_id
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
            // exists:users
            'title.required' => '* Post Title is Required :(',
            'title.min' => '* Post Title must be greater than 3 characters ',
            'description.required'=>'* Post Description is Required :(',
            'description.min'=>'* Post Description Must be greater Than 5 characters',
            'title.unique'=>'* Post Title is already exist :(',
           

        ];
    }
}

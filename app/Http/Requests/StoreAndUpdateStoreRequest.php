<?php

namespace App\Http\Requests;

use App\Models\Post;

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
        if( count( StoreAndUpdateStoreRequest::segments() ) > 1 ) {     
            $post_id = StoreAndUpdateStoreRequest::segments()[1];
            return [
                'title' => 'required|min:3|unique:posts,title,' . $post_id,
                'description' => 'required|min:5,description,' . $post_id,   
            ];
    }else{
        return [
            'title' => ['required','min:3','unique:posts'],
            'description' => ['required','min:5'],   
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
            'title.unique'=>'* Post Title is already exist :('
        ];
    }
}

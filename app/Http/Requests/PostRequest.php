<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->path() == 'post/add'){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'title' => 'required|max:25',
            'content' => 'required',
            'category' => 'max:20',
        ];
    }

    public function messages(){
        return [
            'title.required' => 'タイトルを入力してください',
            'title.max' => 'タイトルは最大25文字までです。',
            'content.required' => '内容を入力してください',
            'category.max' => 'カテゴリーは最大25文字までです。',
        ];
    }
}

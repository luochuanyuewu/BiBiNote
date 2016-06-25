<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateNoteRequest extends Request
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
        return [
            'title' => 'required|max:10',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'本宝宝不允许你不写标题',
            'title.max'=>'本宝宝不允许标题太长',
            'content.required'=>"本宝宝不允许你不写内容"
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateCategoryRequest extends Request
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
            'name' => 'required|max:10',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'握了棵草,你要创建分类却不写分类名字是什么意思?',
            'name.max'=>'本宝宝只允许最长10个字的分类名',
        ];
    }
}

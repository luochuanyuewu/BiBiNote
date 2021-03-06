<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateUserRequest extends Request
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
            'name' => 'required|max:30',
            'email' => 'required',
            'avatar_id' => 'image|dimensions:max_width=500,max_height=500,min_width=100,min_height:100',
            'qq' => 'max:15',
        ];
    }


    public function messages()
    {
        return [
            'name.required'=>'笨蛋,你难道没有名字吗?',
            'name.max'=>'你的名字是不是太长了点?',
            'email'=>'你把你的email地址搞空了你怎么登录呢?',
            'avatar_id.image'=>'你得找一张萌萌哒图片当你的头像,而不是其他的什么鬼~',
            'avatar_id.dimensions'=>"你的头像不符合标准,头像必须在100X100到500X500之间",
            'qq.max'=>'本宝宝目前还没有见过这么长的QQ..',
        ];
    }
}

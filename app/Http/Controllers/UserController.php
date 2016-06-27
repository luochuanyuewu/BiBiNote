<?php

namespace App\Http\Controllers;

use App\Avatar;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function edit()
    {
        //找到对应的用户并传入profiles.edit视图
        $user = Auth::user();
        return view('users.edit', compact('user'));
    }

    /**
     * 处理个人帐户资料的更新
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request)
    {
        $user = Auth::user();
        $input = $request->all();

        if ($request->has('password')) {
            $input = $request->all();
            //为密码加密;
            $input['password'] = bcrypt(trim($request->password));
        } else {
            $input = $request->except('password');
        }

        //如果有文件存在,则处理文件
        if ($file = $request->file('avatar_id')) {

            if ($user->avatar) {
                $filePath = public_path() . $user->avatar->path;
//                $filePath = iconv('utf-8', 'gbk', $filePath);
//                return $filePath;
                unlink($filePath);//删除该用户原有的图片
                $user->avatar->delete();
            }
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
//            $file->move('images', iconv('utf-8', 'gbk', $name));
            $avatar = Avatar::create(['path' => $name]);

            $input['avatar_id'] = $avatar->id;
        }

//            return $input;
        //更新找到的用户的数据
        $user->update($input);
        //flash类型的Session只会出现一次就失效
        Session::flash('updated_user', '用户更新成功!');
        return redirect('note');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }
}

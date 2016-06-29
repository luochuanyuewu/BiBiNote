<?php

namespace App\Http\Controllers;

use App\Avatar;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use ErrorException;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

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
                //如果删除文件失败,则把文件名转码后再删除。
                try {
                    unlink($filePath);
                } catch (ErrorException $e) {
                    $encodedFilePath = iconv('utf-8', 'gb2312', $filePath);
                    unlink($encodedFilePath);//删除该用户原有的图片
                }
                $user->avatar->delete();
            }

            $name = time() . $file->getClientOriginalName();
            //移动图片,如果无法移动,就把文件名编码后再移动
            try {
                $file->move('images', $name);
            } catch (FileException $e) {
                $encodedName = iconv('utf-8', 'gb2312', $name);
                $file->move('images', $encodedName);
            }
            $avatar = Avatar::create(['path' => $name]);

            $input['avatar_id'] = $avatar->id;
        }

//            return $input;
        //更新找到的用户的数据
        $user->update($input);
        //flash类型的Session只会出现一次就失效
        Session::flash('updated_user', '用户更新成功!');
        return redirect(route('user.edit',$user->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $notes = $user->notes()->where('is_public', 1)->get();
        if ($user)
            return view('users.show', compact('user','notes'));
        else
            return '你要查看的用户不存在';
    }
}

<?php

namespace App\Http\Controllers;

use App\Note;
use App\Category;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class NoteController extends Controller
{

    /**
     * 显示所有帖子
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        //返回当前用户的所有帖子,并按照创建时间逆序排列
        $notes = $user->notes()->orderBy('created_at', 'desc')->get();

        $categories = Auth::user()->categories()->lists('name', 'id')->all();
//        return $notes;
        return view('notes.index', compact('notes', 'categories','user'));
    }

    /**
     * 显示特定帖子
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //找到对应的帖子
        $note = Note::find($id);
        //检测是否存在以及公开
        if( !$note or !($note->isPublic()))
            return '你要查找的内容不存在或没有被公开';
        else
            return view('notes.show',compact('note'));
    }


    /**
     * 存储新帖子到数据库
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateNoteRequest $request)
    {
        $input = $request->all();
        $input = $input + ['user_id' => Auth::user()->id];

        Note::create($input);
        Session::flash('created_note', '吐槽创建成功!');

//        return $input;
        return redirect(route('note.index'));
    }

    /**
     * 显示特定帖子的编辑界面
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note = Auth::user()->notes()->where('id', $id)->first();
        $categories = Auth::user()->categories()->lists('name', 'id')->all();
//        return $note;
        return view('notes.edit', compact('note', 'categories'));
    }

    /**
     * 更新特定帖子
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UpdateNoteRequest $request, $id)
    {
        $note = Auth::user()->notes()->where('id', $id)->first();
        $note->update($request->all());
        Session::flash('updated_note', '吐槽更新成功!');

//        return $request->all();
        return redirect('note');
    }

    /**
     * 删除特定帖子
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = Auth::user()->notes()->where('id', $id)->first();
        if ($note) {
            $note->delete();
            Session::flash('deleted_note', '吐槽删除成功!');
        } else
            return '你正在操作的资源不属于你或者不存在,所以你无法执行此操作';
        return redirect('note');

    }

    /**
     * 设置特定帖子的公开性
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|string
     */
    public function setPublic($id)
    {
        //找到对应的note
        $note = Auth::user()->notes()->where('id',$id)->first();

//        return $note;
        if(!$note)
            return '你正在操作的资源不属于你或者不存在,所以你无法执行此操作';

        if($note->is_public == 1)
        {
            $note->update(['is_public'=>0]);
        }
        else
        {
            $note->update(['is_public'=>1]);
        }

        return redirect('note');

    }

}

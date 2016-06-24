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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        //返回当前用户的所有笔记,并按照创建时间逆序排列
        $notes = $user->notes()->orderBy('created_at', 'desc')->get();

        $categories = Auth::user()->categories()->lists('name', 'id')->all();
//        return $notes;
        return view('notes.index', compact('notes', 'categories','user'));
    }

    /**
     * Store a newly created resource in storage.
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
     * Show the form for editing the specified resource.
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
     * Update the specified resource in storage.
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
     * Remove the specified resource from storage.
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

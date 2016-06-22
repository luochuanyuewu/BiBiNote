<?php

namespace App\Http\Controllers;

use App\Note;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

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
        //返回当前用户的所有笔记
//        $notes = Note::all('user_id');
        $notes = $user->notes->all();

//        return $notes;
        return view('notes.index',compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input = $input + ['user_id'=>Auth::user()->id];

        Note::create($input);
//        return $input;
        return redirect(route('note.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
//        return $note;
        return view('notes.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $note = Auth::user()->notes()->where('id', $id)->first();
        $note->update($request->all());

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
        if($note)
            $note->delete();
        else
            return '你正在操作的资源不属于你或者不存在,所以你无法执行此操作';
        return redirect('note');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $note = Auth::user()->notes()->where('id', $id)->first();
        $note->delete();
//        return $note;

        return redirect('/home');

    }
}

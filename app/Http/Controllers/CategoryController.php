<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Auth::user()->categories->all();
//        return $tags;
        return view('categories.index',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateCategoryRequest $request)
    {
        $categories = Auth::user()->categories->all();
        foreach ($categories as $category)
        {
            if($category->name == trim($request->name))
                return redirect('category');
        }
        Category::create(['name'=>$request->name,'user_id'=>Auth::user()->id]);

        return redirect('category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        //返回当前用户的所有笔记,并按照创建时间逆序排列
        $notes = $user->notes()->orderBy('created_at', 'desc')->get();

        $categories = Auth::user()->categories()->lists('name', 'id')->all();
//        return $notes;
        //找到当前用户的对应分类id号的所有notes
        $notes = Auth::user()->notes()->where('category_id',$id)->orderBy('created_at','desc')->get();
        return view('notes.index', compact('notes', 'categories','user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //将所有拥有此分类的note全部重置为未分类
        $notes = Auth::user()->notes()->where('category_id',$id)->get();
        if (count($notes) > 0)
        {
            foreach ($notes as $note)
            {
                $note->update(['category_id'=>0]);
            }
        }
//        return $notes;
        //从当前登录的用户的所有分类当中找到要删除的。
        $category = Auth::user()->categories()->where('id',$id)->first();
        $category->delete();

        return redirect('category');
//        return $category;

    }

    

}

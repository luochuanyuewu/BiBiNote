<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{

    /**
     * 显示所有分类
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
     *存储一个新的分类
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
            {
                Session::flash('existed_category', '已经有这个分类了!');
                return redirect('category');
            }
        }
        Category::create(['name'=>$request->name,'user_id'=>Auth::user()->id]);
        Session::flash('created_category', '分类创建成功!');
        return redirect('category');
    }

    /**
     * 按特定分类显示所有帖子
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
     * 删除某个分类
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
        Session::flash('deleted_category', '分类删除成功!');
        return redirect('category');
//        return $category;

    }

    

}

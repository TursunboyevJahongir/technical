<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('article.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|string',
        ]);
        $text = $request->all();
        Auth::user()->articles()->create($text);
        return redirect('home');
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 4. Методы и строгая типизация:
     */
    public function show(Article $article)
    {
        return view('article.show',compact(['article']));
    }

    //3. Мягкое удаление:
    public function destroy(Article $article){
        $author = $article->user()->first();
        $user = Auth::id();
        if(!is_null($article->deleted_at))
        return redirect()->back()->with('error','This article was previously deleted');
        $verify = new Article();
        $verify->isAuthor($author->id,$user);
        if($verify->isAuthor($author->id,$user)){
            Article::destroy($article->id);
            return redirect()->back()->with('message','Deleted');
        }
        return redirect()->back()->with('error','You are not an author');
    }
}

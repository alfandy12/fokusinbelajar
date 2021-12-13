<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function index()
    {
        //tampilkan view Article
        $article = DB::table('articles');
        if (request('search')) {
            $article->where('title', 'like', '%' . request('search') . '%');
        }
        return view('article/index', [
            "articles" => $article->orderBy('updated_at', 'desc')->paginate(6),
           "popularItem" => Article::orderBy('read', 'desc')->take(5)->get(),
        ]);
    }
    public function show(Article $article)
    {
        //ambil data berdasarkan id artikel yang sedang di buka
        $article = Article::find($article->id);
        //Article::where('id',$article->id)->increment('read', 1);
        $article->timestamps = false;
        $article->update(['read' => $article->read + 1]);
        $article->save();
        //kembalikan ke view
        return view('/article/detail', [
            'article' => $article,
            'popularItem' => Article::orderBy('read', 'desc')->take(5)->get(),
            //ambil data sesuai datetime terbaru
            'articleNew' => Article::orderBy('updated_at', 'desc')->limit(6)->get(),
            ]);
    }


   
}

<?php

namespace App\Http\Controllers;


use App\Models\Article;
use App\Models\Category;
use App\Models\Multicourse;
use App\Models\Singlecourse;
use App\Models\User;



class DashboardController extends Controller
{
    public function index()
    {   
        $single = Singlecourse::all()->count();
        $multi = Multicourse::all()->count();
        $Articles = Article::all()->count();
        $users = User::all()->count();
        $category = Category::all();
        return view('admin/dashboard', [
            'countSinglecourse' => $single,
            'countMulticourse' => $multi,
            'countArticles' => $Articles,
            'countUsers' => $users,
            'categories' => $category
            
         

        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Singlecourse;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class SinglecourseController extends Controller
{

    public function index()
    {
        //
        $singlecourse = Singlecourse::latest()->paginate(8)->withQueryString();
        if (request('search')) {
            $singlecourse = Singlecourse::latest()->where('title', 'like', '%' .request('search'). '%')
                ->orWhere('channel_name', 'like', '%' . request('search') . '%')->paginate(8);
                $singlecourse->appends(['search' => request('search')]);
        }
        $category = Category::all();
        return view('singlecourse/index', [
            'singlecourse' => $singlecourse,
            'categories' => $category,
            /* 'requestSearch' => $requestName, */
        ]);
    }

    public function show($slug)
    {
        //
        $singleDetail = Singlecourse::where('slug', $slug)->firstOrFail();
        return view('singlecourse/detail', [
            'singleDetail' => $singleDetail
        ]);
    }
    public function category(Category $category, $slug)
    {
        $categoryAll = Category::all();
        $singleById = Category::where('slug', $slug)->firstOrFail();
        $singlecourse = DB::table('singlecourses')->latest();
            if (request('search')) {
                $singlecourse = Singlecourse::latest()->where('title', 'like', '%' .request('search'). '%')
                    ->orWhere('channel_name', 'like', '%' . request('search') . '%');
                   
            }
        return view('singlecourse/category', [
            'singlecourse' => $singlecourse->latest()->where('category_id', $singleById->id)
            ->paginate(8)->appends(['search' => request('search')]),
            'categories' => $singleById,
            'categoryAll' => $categoryAll
        ]);
    }
}

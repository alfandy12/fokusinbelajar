<?php

namespace App\Http\Controllers;

use App\Models\Multicourse;
use App\Models\Category;
use App\Models\Linkmulticourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MulticourseController extends Controller
{
    //
    public function index()
    {
        $multi = Multicourse::latest()->paginate(8)->withQueryString();
        if (request('search')) {
            $multi = Multicourse::latest()->where('title', 'like', '%' .request('search'). '%')
                ->orWhere('channel_name', 'like', '%' . request('search') . '%')->paginate(8);
            $multi->appends(['search' => request('search')]);
            
        }
        $category = Category::all();
        return view('multicourse/index', [
            'multiCourse' => $multi,
            'categories' => $category,
        ]);
    }
    public function video($slug, $eps)
    {
        $multiId = Multicourse::where('slug', $slug)->firstOrFail();
        $allMulti = Linkmulticourse::where('multicourse_id', $multiId->id)->get();
        $video = Linkmulticourse::where('multicourse_id', $multiId->id)
            ->where('eps', $eps)
            ->first();
           /*  dd($video); */
        return view('multicourse/video', [
            'video' => $video,
            'allMulti' => $allMulti,
        ]);
    }
    public function category($slug)
    {
        $categoryAll = Category::all();
        $multiById = Category::where('slug', $slug)->firstOrFail();
        $multicourse = Multicourse::latest();
            if (request('search')) {
                $multicourse = Multicourse::latest()->where('title', 'like', '%' .request('search'). '%')
                    ->orWhere('channel_name', 'like', '%' . request('search') . '%');
                   
            }
        return view('multicourse/category', [
            'multiCourse' => $multicourse->latest()->where('category_id', $multiById->id)
            ->paginate(8)->appends(['search' => request('search')]),
            'categories' => $multiById,
            'categoryAll' => $categoryAll
        ]);
    }
}

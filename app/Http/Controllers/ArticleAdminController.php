<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\DB;

class ArticleAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //kembalikan view
        $article = DB::table('articles');
        if (request('search')) {
            $article->where('title', 'like', '%' . request('search') . '%');
        }
        return view('admin/article/index', [
            'articles' =>  $article->paginate(8),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //tampilkan form create
        
        return view('admin/article/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //ddd($request);
        
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'thumbnail' => 'required|image|file|max:8192',
            'slug' => 'required',
            'description' => 'required',
        ]);
        $imageName = time().'.'.$request->thumbnail->getClientOriginalExtension();
        $request->thumbnail->move(public_path('articles/'), $imageName);
    

        $Article = new Article;
        $Article->title = $validateData['title'];
        $Article->thumbnail =  $imageName;
        $Article->slug = $validateData['slug'];
        $Article->description  = $validateData['description'];
        $Article->save();

    
        return redirect('/admin-article')->with('success', 'Data has been successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article, $id)
    {
        $articleDetail = Article::find($id);

        return view('/admin/article/detail', [
            'article' => $articleDetail,
        ]);
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article, $id)
    {
        //
        $article = Article::find($id);
        return view('admin/article/edit', [
            'article' => $article,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article, $id)
    {
      
         //Validasi request
         $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required',
            'thumbnail' => 'image|file|max:8192',
            'description' => 'required',

        ]);
        // jika ada file thumbnail masukan gambar baru tetapi harus menghapus file lama
        if ($request->file('thumbnail')) {
            if ($request->deleteOldImage) {
                # hapus gambar
                $storageImage = 'articles/'.$request->deleteOldImage ;
                // lalu delete gambar lama
                unlink($storageImage);
            }
            
            # validasikan jika ada request dari thmbnail
            $imageName = time().'.'.$request->thumbnail->getClientOriginalExtension();
            $request->thumbnail->move(public_path('articles/'), $imageName);
        } else {
            $imageName = $request->deleteOldImage ;
        }
       
        // cari berdasarkan id
        $searchArticle = Article::find($id);
        /* ddd($searchArticle); */
        // ubah data berdasarkan request yang sudah di validasi
        $searchArticle->title = $validatedData['title'];
        $searchArticle->slug = $validatedData['slug'];
        $searchArticle->thumbnail =  $imageName;
        $searchArticle->description  = $validatedData['description'];
        //save
        $searchArticle->update();
        return redirect('/admin-article')->with('success', 'Data Telah Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article, Request $request, $id)
    {
        // periksa apakah ada request image
        if ($request->deleteImage) {
            // ambil directory sama nama imagenya
            $storageImage = 'articles/'.$request->deleteImage ;
            // lalu delete
            unlink($storageImage);
        }
        /* dd($storageImage); */
    // Hapus
    Article::destroy($id);
    return redirect('/admin-article')->with('success', 'Data has been successfully deleted');
    }
    //check slug
    public function checkSlug(Request $request)
    {
        // service slug ambil dari request
        $slug = SlugService::createSlug(Article::class, 'slug', $request->title);
        // kembalikan dalam bentuk json ke dalam method slug

        return response()->json(['slug' => $slug]);
    }
}

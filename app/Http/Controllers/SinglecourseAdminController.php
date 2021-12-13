<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Singlecourse;
use Illuminate\Http\Request;

class SinglecourseAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $singlecourse = Singlecourse::latest()->paginate(8)->withQueryString();
        if (request('search')) {
            $singlecourse = Singlecourse::where('title', 'like', '%' .request('search'). '%')
                ->orWhere('channel_name', 'like', '%' . request('search') . '%')->latest()->paginate(8);
                
        }
        return view('admin/singlecourse/index', [
            'singlecourse' => $singlecourse,
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = Category::all();
        return view('admin/singlecourse/create', [
            'categories' => $category,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validateData = $request->validate([
            'link' => 'required|unique:singlecourses',
            'category_id' => 'required',
        ]);

        $link = $validateData['link'];
        //pisahkan link dengan slash
        $ambil = explode("/", $link);
        //setting rest api dan masukan link yang sudah di pisahkan
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://www.googleapis.com/youtube/v3/videos?part=snippet&id=' . $ambil[3] . '&key=AIzaSyCKFv6glrhNxVwnDk8dgGDZhOdj9E2Q-Fs');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($result, true);
        $idVideo =  $result['items'][0]['id'];
        //ambil title video
        $titleVideo = $result['items'][0]['snippet']['title'];
        //ambil thumbnail video
        $thumbnail =  $result['items'][0]['snippet']['thumbnails']['standard']['url'];
        //ambil nama channel video
        $linkChannel =  $result['items'][0]['snippet']['channelId'];
        //ambil id channel video
        $namaChannel =  $result['items'][0]['snippet']['channelTitle'];
        //ambil descripsi
        $description = $result['items'][0]['snippet']['description'];

    
        $newSinglecourse = new Singlecourse;
        $newSinglecourse->category_id = $validateData['category_id'];
        $newSinglecourse->link = $validateData['link'];
        $newSinglecourse->title = $titleVideo;
        $newSinglecourse->description = $description;
        $newSinglecourse->thumbnail =  $thumbnail;
        $newSinglecourse->channel_name = $namaChannel;
        $newSinglecourse->channel_id = $linkChannel;
        $newSinglecourse->slug = $idVideo;
        $newSinglecourse->save();

        return redirect('/admin-singlecourse')->with('success', 'Data has been successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Singlecourse  $singlecourse
     * @return \Illuminate\Http\Response
     */
    public function show(Singlecourse $singlecourse, $slug)
    {
        //
        $singleDetail = Singlecourse::where('slug', $slug)->firstOrFail();

        return view('admin/singlecourse/detail', [
            'singleDetail' => $singleDetail,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Singlecourse  $singlecourse
     * @return \Illuminate\Http\Response
     */
    public function edit(Singlecourse $singlecourse, $slug)
    {
        //
        $singleEdit = Singlecourse::where('slug', $slug)->firstOrFail();
        $category = Category::all();
        return view('admin/singlecourse/edit', [
            'singleEdit' => $singleEdit,
            'categories' => $category,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Singlecourse  $singlecourse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Singlecourse $singlecourse, $slug)
    {
        // cari data berdasarkan single course slug
        $singleUpdateById = Singlecourse::where('slug', $slug)->firstOrFail();

        // temukan data dengan id 
        $changeSinglecourse = Singlecourse::find($singleUpdateById->id);
        
        // validasikan
        $validateData = $request->validate([
            'link' => 'required|unique:singlecourses,link,' . $singleUpdateById->id,
            'category_id' => 'required',
        ]);

        $link = $validateData['link'];
        //pisahkan link dengan slash
        $ambil = explode("/", $link);
        //setting rest api dan masukan link yang sudah di pisahkan
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://www.googleapis.com/youtube/v3/videos?part=snippet&id=' . $ambil[3] . '&key=AIzaSyCKFv6glrhNxVwnDk8dgGDZhOdj9E2Q-Fs');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($result, true);
        $idVideo =  $result['items'][0]['id'];
        //ambil title video
        $titleVideo = $result['items'][0]['snippet']['title'];
        //ambil thumbnail video
        $thumbnail =  $result['items'][0]['snippet']['thumbnails']['standard']['url'];
        //ambil nama channel video
        $linkChannel =  $result['items'][0]['snippet']['channelId'];
        //ambil id channel video
        $namaChannel =  $result['items'][0]['snippet']['channelTitle'];
        //ambil descripsi
        $description = $result['items'][0]['snippet']['description'];
        
        $changeSinglecourse->category_id = $validateData['category_id'];
        $changeSinglecourse->link = $validateData['link'];
        $changeSinglecourse->title = $titleVideo;
        $changeSinglecourse->description = $description;
        $changeSinglecourse->thumbnail =  $thumbnail;
        $changeSinglecourse->channel_name = $namaChannel;
        $changeSinglecourse->channel_id = $linkChannel;
        $changeSinglecourse->slug = $idVideo;
        $changeSinglecourse->update();
        return redirect('/admin-singlecourse')->with('success', 'Data has been successfully edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Singlecourse  $singlecourse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Singlecourse $singlecourse, $slug)
    {
        //
        $singleDeleteById = Singlecourse::where('slug', $slug)->firstOrFail();
        Singlecourse::destroy($singleDeleteById->id);
        return redirect('/admin-singlecourse')->with('success', 'Data has been successfully deleted');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Linkmulticourse;
use App\Models\Multicourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MulticourseAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $multi = Multicourse::latest()->paginate(8)->withQueryString();
        if (request('search')) {
            $multi = Multicourse::where('title', 'like', '%' .request('search'). '%')
                ->orWhere('channel_name', 'like', '%' . request('search') . '%')->latest()->paginate(8);
        }
        return view('admin/multicourse/index', [
            'multicourse' => $multi,

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
        return view('admin/multicourse/create', [
            'categories' => $category
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
            'link' => 'required|unique:multicourses',
            'category_id' => 'required',
        ]);

        $link = $validateData['link'];
        //pisahkan link dengan =
        $ambil = explode("=", $link);
        //setting rest api dan masukan link yang sudah di pisahkan
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, 'https://youtube.googleapis.com/youtube/v3/playlistItems?part=snippet%2CcontentDetails&maxResults=50&playlistId=' . $ambil[1] . '&key=AIzaSyCKFv6glrhNxVwnDk8dgGDZhOdj9E2Q-Fs');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($result, true);
        //ambil title video
        $titleVideo = $result['items'][0]['snippet']['title'];
        //ambil thumbnail video
        $thumbnail =  $result['items'][0]['snippet']['thumbnails']['standard']['url'];
        //ambil nama channel video
        $namaChannel =  $result['items'][0]['snippet']['channelTitle'];
        //ambil descripsi
        $description = $result['items'][0]['snippet']['description'];
        //ambil ID channel 
        $idChannel = $result['items'][0]['snippet']['channelId'];


        $newMulticourse = new Multicourse;
        $newMulticourse->category_id = $validateData['category_id'];
        $newMulticourse->link = $link;
        $newMulticourse->title = $titleVideo;
        $newMulticourse->description = $description;
        $newMulticourse->thumbnail = $thumbnail;
        $newMulticourse->channel_name = $namaChannel;
        $newMulticourse->channel_id = $idChannel;
        $newMulticourse->slug = $ambil[1];
        $newMulticourse->save();
        $id = $newMulticourse->id;

        $totalVideo = $result['pageInfo']['totalResults'];
        $eps = 1;
        for ($i = 0; $i < $totalVideo; $i++) {
            $newLinkmulti = new Linkmulticourse;
            $newLinkmulti->multicourse_id = $id;
            $newLinkmulti->link = $result['items'][$i]['snippet']['resourceId']['videoId'];
            $newLinkmulti->title = $result['items'][$i]['snippet']['title'];
            $newLinkmulti->thumbnail = $result['items'][$i]['snippet']['thumbnails']['standard']['url'];;
            $newLinkmulti->description = $result['items'][$i]['snippet']['description'];;
            $newLinkmulti->eps = $eps++;
            $newLinkmulti->save();
        }

        return redirect('/admin-multicourse')->with('success', 'Data has been successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Multicourse  $multicourse
     * @return \Illuminate\Http\Response
     */
    public function show(Multicourse $multicourse, $slug)
    {
        //

        $multiDetail = Multicourse::where('slug', $slug)->firstOrFail();
        $linkMulti = Linkmulticourse::where('multicourse_id', $multiDetail->id)->get();
        $link = DB::table('linkmulticourses')->where('multicourse_id', $multiDetail->id)
            ->orderBy('eps', 'ASC')->get();
        return view('admin/multicourse/detail', [
            'linkmulti' => $linkMulti,
            'multiDetail' => $multiDetail
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Multicourse  $multicourse
     * @return \Illuminate\Http\Response
     */
    public function edit(Multicourse $multicourse, $slug)
    {
        //
        $multiEdit = Multicourse::where('slug', $slug)->firstOrFail();
        $category = Category::all();
        return view('admin/multicourse/edit', [
            'multiEdit' => $multiEdit,
            'categories' => $category,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Multicourse  $multicourse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Multicourse $multicourse, $slug)
    {
        //
        // cari data berdasarkan single course slug
        $multiUpdateById = Multicourse::where('slug', $slug)->firstOrFail();

        // temukan data dengan id 
        $changeMulticourse = Multicourse::find($multiUpdateById->id);

        $validateData = $request->validate([
            'link' => 'required|unique:multicourses,link,' . $multiUpdateById->id,
            'category_id' => 'required',
        ]);

        $link = $validateData['link'];
        //pisahkan link dengan =
        $ambil = explode("=", $link);
        //setting rest api dan masukan link yang sudah di pisahkan
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://youtube.googleapis.com/youtube/v3/playlistItems?part=snippet%2CcontentDetails&playlistId=' . $ambil[1] . '&key=AIzaSyCKFv6glrhNxVwnDk8dgGDZhOdj9E2Q-Fs');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($result, true);
        //ambil title video
        $titleVideo = $result['items'][0]['snippet']['title'];
        //ambil thumbnail video
        $thumbnail =  $result['items'][0]['snippet']['thumbnails']['standard']['url'];
        //ambil nama channel video
        $namaChannel =  $result['items'][0]['snippet']['channelTitle'];
        //ambil descripsi
        $description = $result['items'][0]['snippet']['description'];
         //ambil ID channel 
         $idChannel = $result['items'][0]['snippet']['channelId'];

        $changeMulticourse->category_id = $validateData['category_id'];
        $changeMulticourse->link = $link;
        $changeMulticourse->title = $titleVideo;
        $changeMulticourse->description = $description;
        $changeMulticourse->thumbnail = $thumbnail;
        $changeMulticourse->channel_name = $namaChannel;
        $changeMulticourse->channel_id = $idChannel;
        $changeMulticourse->slug = $ambil[1];
        $changeMulticourse->Update();
        return redirect('/admin-multicourse')->with('success', 'Data has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Multicourse  $multicourse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Multicourse $multicourse, $slug)
    {
        //
        $multiDeleteById = Multicourse::where('slug', $slug)->firstOrFail();
        $multiDeleteById->linkmulticourse()->delete();
        Multicourse::destroy($multiDeleteById->id);
        return  redirect('/admin-multicourse')->with('success', 'Data has been successfully deleted');
    }
}

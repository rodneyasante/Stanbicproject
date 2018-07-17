<?php

namespace App\Http\Controllers;

use Image as Intervention;
use App\Image;
use Illuminate\Http\Request;
use Auth;
use Response;

class ImageController extends Controller
{

    public function __construct()
  {
    $this->middleware('admin', ['except' => ['index', 'show']]);
  }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category = $request->cid;
        if($request->src){
            $images = Image::all()->where('imageable_type',$request->src);
        } else {
            $images = Image::all();
        }
        return view('galleries.index')->withImages($images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		if(Auth::guest()) {
			Session::flash('warning', 'In order to upload material, you need to be logged in');
			return redirect()->route('login');
		}
		return view('galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		    if($request->hasFile('file')){
                $image = $request->file('file');
    			$id = Image::store($image, Auth::user())->id;
    			return Response::json($id);
    		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $gallery)
    {
      //return Response::json("E:/osucc2/storage/app/public".$gallery->location);
        $image = Intervention::make('C:\xampp\htdocs\StanbicProject/storage/app/public/'.$gallery->location);
        return dd($image->size());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $gallery)
    {
        $gallery->erase();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::latest()->paginate(5);
        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'content'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg,webp,svg',
        ]);
        $image=$request->file('image');
        $name_gen=hexdec(uniqid());
        $img_ext=strtolower($image->getClientOriginalExtension());
        $img_name=$name_gen.'.'.$img_ext;
        $up_location='images/';
        $last_img=$up_location.$img_name;
        $image->move($up_location,$img_name);
        Post::insert([
            'title'=>$request->title,
            'content'=>$request->content,
            'image'=>$last_img,

        ]);
         return redirect()->back();



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $posts=Post::find($id);
        return view('post.edit',compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'content'=>'required',
        ]);
        $old_img=$request->old_img;
        $image=$request->file('image');
        $name_gen=hexdec(uniqid());
        $img_ext=strtolower($image->getClientOriginalExtension());
        $img_name=$name_gen.'.'.$img_ext;
        $up_location='images/';
        $last_img= $up_location.$img_name;
        $image->move( $up_location,$img_name);
        unlink($old_img);

        Post::find($id)->update([
            'title'=>$request->title,
            'content'=>$request->title,
            'image'=>$last_img,
        ]);
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts=Post::find($id);
        if($posts->image!==null){
            unlink(public_path($posts->image));
        }
        $posts->delete();
        return redirect()->back();
    }


//peginetion and search


public function paginetion(Request $request){
    $posts=Post::latest()->paginate(5);
    return view('post.paginetion',compact('posts'))->render();

}


public function searchPost(Request $request){
    $posts=Post::where('title','like','%'.$request->search_string.'%')
    ->orderBy('id','desc')
    ->paginate(5);
    if($posts->count()>=1){
        return view('post.paginetion',compact('posts'))->render();
    }else{
        return response()->json([
            'status'=>'Nothing Found',
        ]);
    }

}

}

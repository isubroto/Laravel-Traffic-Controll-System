<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accr=DB::table('account_record')->get();
        return view('accident.accident',compact('accr'));
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
            'tagno'=>'required',
            'D_NAME'=>'required|min:5',
            'ACC_TYPE'=>'required|min:5',
            'Fines'=>'required|numeric',
            'Date'=>'required',
            'Jail'=>'required',
        ]);
        $post=new Post;
        $post->tagno=$request->tagno;
        $post->D_NAME=$request->D_NAME;
        $post->ACC_TYPE=$request->ACC_TYPE;
        $post->Fines=$request->Fines;
        $post->Jail=$request->Jail;
        $post->Date=$request->Date;
        $post->save();
        return back()->with('success','Tax Details has been Added');
    }
    public function Create()
    {
        $tag=DB::table('cars')->select('cars.tagno')->get();
        return view('accident.create',compact('tag'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $posts=Post::all();
        return view('show',['posts'=>$posts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id=Crypt::decryptString($id);
        $tag=DB::table('cars')->select('cars.tagno')->get();
        $posts=Post::find($id);
        return view('accident.edit',compact(['tag','posts'])); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'tagno'=>'required',
            'D_NAME'=>'required|min:5',
            'ACC_TYPE'=>'required|min:5',
            'Fines'=>'required|numeric',
            'Date'=>'required',
            'Jail'=>'required',
        ]);
        $post=Post::find(crypt::decryptString($request->id));
        $post->tagno=$request->tagno;
        $post->D_NAME=$request->D_NAME;
        $post->ACC_TYPE=$request->ACC_TYPE;
        $post->Fines=$request->Fines;
        $post->Jail=$request->Jail;
        $post->Date=$request->Date;
        $post->save();
        return back()->with('success','Tax Details has been Added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find(crypt::decryptString($id));
        $post->delete();
        return back()->with('success','Tax Details has been Added');

         
    }
}

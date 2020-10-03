<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Categories;
use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fetch data
        $paginate = Post::paginate(10);
        $post = Post::orderBy('created_at', 'desc')->get();
        return view('posts.index', ['paginate' => $paginate, 'post' => $post]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Categories::all();
        return view('posts.create', compact('cat'));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $post = Post::where('title' ,'like' , '%'.$search. '%')->orWhere('name', 'like', '%'.$search.'%')->get();
     
        // $post = Post::where('name' ,'like' , '%'.$search. '%')->get();
        return view('posts.index', ['post' => $post ]);
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
        'name' => 'required',
        'title' => 'required',
        'body' => 'required',
        'category_id' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        
        ]);

       // $user_id = auth()->id();
       // $request['user_id'] = $user_id;

       if($request->hasFile('image')){
        $fileName = $request->image->getClientOriginalName();
         $fileStore = $fileName.'_'.time().'_'.rand();
       }
      
       $request->image->storeAs('postImages', $fileStore , 'public');
       

       $post = new Post;
       $post->name = $request->name;
       $post->title = $request->title;
       $post->body = $request->body;
       $post->user_id = auth()->id();
       $post->category_id = $request->category_id;
       $post->post_img = $fileStore;
       $post->save();
       
       
       
    
       
       // Post::create($request->all());

       // $post->post_img = $fileName;
       // $post->save();
       return redirect()->route('post.index')->with('success', 'Post Created Successfully!..');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $cat = Categories::all();
        return view('posts.edit', ['post' => $post , 'cat' => $cat]);
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

        $validatedData =  $request->validate([
        'title' => 'required',
        'body' => 'required',
        'category_id' => 'required',
        ]);

       Post::whereId($id)->update($validatedData);
       return redirect()->route('home')->with('success', 'Post Update Successfully!..');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('home')->with('success', 'Post Deleted Successfully!..');


    }
}

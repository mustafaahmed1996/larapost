<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

       $posts =  auth()->user()->posts()->orderBy('created_at', 'desc')->get();

        return view('home', compact('posts'));
    }

    public function profile(Request $request)
    {
        $request->validate([
          'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if($request->hasFile('image')){

            $fileName = $request->image->getClientOriginalName();
            if(auth()->user()->avatar){
                Storage::delete('/public/images/'. auth()->user()->avatar);
            }
            $request->image->storeAs('images', $fileName, 'public');

            auth()->user()->update(['avatar' => $fileName ]);
        }
        return redirect()->back()->with('success', 'Profile has been updated..!');


    }
}

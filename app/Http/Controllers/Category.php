<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\Post;
class Category extends Controller
{
    public function index(){

    	$category =  Categories::all();
    	return view('category', compact('category'));
    }

    public function store(Request $request)
    {
    	$validateData = $request->validate([
    		'cat_name' => 'required|max:255|unique:categories',
    	]);

    	Categories::create($validateData);
    	return redirect()->back()->with('success', 'Successfully Created..!');
    }

    // public function destroy($id){
    //  //   $category = Categories::find($id);
    // 	// $category->delete();
    // 	dd('delete');
    // }
}

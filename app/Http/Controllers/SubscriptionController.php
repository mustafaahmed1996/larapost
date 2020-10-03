<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index(){

    	return view('payment');
    }
    public function create(Request $request){

    	dd($request->stripeToken);
    }
}

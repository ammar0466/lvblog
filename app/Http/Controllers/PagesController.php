<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    //
    public function showAboutPage(){
    	return view('about');
    }

    public function showContactPage(){
    	return view('contact');
    }
}

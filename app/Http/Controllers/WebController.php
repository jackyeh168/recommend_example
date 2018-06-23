<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    //
    public function getHotelList()
    {
        return view('contents.hotel_list');
    }
	
	public function getInquire()
    {
        return view('contents.Inquire');
    }

    public function getLandscape()
    {
        return view('contents.landscape');
    }

    public function getRelation()
    {
        return view('contents.relation');
    }

    public function getRecommend()
    {
        return view('contents.recommend');
    }

    public function getComment()
    {
        return view('contents.comment');
    }    
    
    public function getHotel()
    {
        return view('contents.hotel');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}

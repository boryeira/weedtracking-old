<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feed;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $feeds = Feed::orderBy('updated_at','desc')->simplePaginate(16);

        return view('home')->with('feeds', $feeds);
    }
    public function us()
    {
        return view('us');
    }
}

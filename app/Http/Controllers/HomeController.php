<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boxes_backgrounds = ['bg-aqua', 'bg-green', 'bg-yellow', 'bg-red'];
        $places = Place::with('sensors')->get();
        return view('admin.dashboard')
        ->with(['places' => $places, 'boxes_backgrounds' => $boxes_backgrounds]);
    }
}

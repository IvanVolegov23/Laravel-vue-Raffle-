<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Raffle;

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
        $raffles = Raffle::latest()->paginate(10);
  
        return view('home',compact('raffles'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Menu;

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
        $coffee = DB::table('menu')
                        ->select('*')
                        ->where('category','=','Coffee')
                        ->get();
        $tea = DB::table('menu')
                        ->select('*')
                        ->where('category','=','Tea')
                        ->get();
        $iceBlended = DB::table('menu')
                        ->select('*')
                        ->where('category','=','Iced Blended')
                        ->get();
        $smoothie = DB::table('menu')
                        ->select('*')
                        ->where('category','=','Smoothie')
                        ->get();
        $toppings = DB::table('topping')
                        ->select('*')
                        ->get();
        return view('orderpage',compact('coffee', 'tea', 'iceBlended','smoothie','toppings'));
    }
}

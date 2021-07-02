<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuItemController extends Controller
{
    function show(){
        $data = Menu::all();
        return view('home',['drinks' => $data]);
        // $coffeeData = DB::table('menu')
        //                 ->select('*')
        //                 ->where('category','=','Coffee')
        //                 ->get();
        // return view('coffee',['coffees'=>$coffeeData]);

        // $iceBlendedData = DB::table('menu')
        //                 ->select('*')
        //                 ->where('category','=','Ice Blended')
        //                 ->get();
        // return view('coffee',['iceBlended'=>$iceBlendedData]);
    }
}

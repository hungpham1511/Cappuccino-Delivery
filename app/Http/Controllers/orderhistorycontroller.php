<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\auth;
use App\Models\DetailReceipt;
use App\Models\User;


class OrderhistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   /*public function order()
    {
        $receipt = receipt::orderby('idUser','desc')->paginate(10);
        return view('orderhistory')->with(compact('receipt'));
    } */

    public function index(Request $request)
    {
       // $user = auth::user();
       // $id = auth::id();
       // $receipt = DB::table('detail_receipt')->join('menu', 'detail_receipt.idDrink', '=', 'menu.idDrink')->get();
       // $receipt = DB::table('detail_receipt')->join('receipt', 'detail_receipt.idReceipt', '=', 'receipt.idReceipt')->get();
        // $receipt = DB::table('detail_receipt')->join('users', 'detail_receipt.idUser', '=', 'users.idUser')->get();
   
        // $receipt = receipt::where('idUser',receipt::get('idUser'))->orderby('idReceipt','desc')->paginate(10);
       // $receipt = DB::table('receipt')->join('detail_receipt', 'receipt.idReceipt', '=', 'detail_receipt.idReceipt')->get();
        $receipt = DB::table('receipt')->where('idUser',auth::id())
        ->select('*')
        ->get();
        $detail = DB::table('detail_receipt')
        ->select('*')
        ->get();
        $menu = DB::table('menu')
        ->select('*')
        ->get();
        $topping = DB::table('topping')
        ->select('*')
        ->get();
        $detailTopping = DB::table('detail_topping')
        ->select('*')
        ->get();
        $detailWeekly = DB::table('detail_weekly_book')
        ->select('*')
        ->get();
        return view('orderhistory',compact('receipt','detail','menu','topping', 'detailWeekly', 'detailTopping'));
    
    }


    
}

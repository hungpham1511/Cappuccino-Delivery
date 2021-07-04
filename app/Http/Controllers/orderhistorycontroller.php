<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DetailReceipt;


class orderhistorycontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $receipt = DB::table('detail_receipt')->join('menu', 'detail_receipt.idDrink', '=', 'menu.idDrink')->get();
        $receipt = DB::table('detail_receipt')->join('receipt', 'detail_receipt.idReceipt', '=', 'receipt.idReceipt')->get();
        // $receipt = DB::table('detail_receipt')->join('users', 'detail_receipt.idUser', '=', 'users.idUser')->get();

        // $receipt = receipt::where('idUser',Session::get('idUser'))->orderBy('idReceipt', 'desc')->paginate(10);

   /*   $Name = receipt::where('idDrink',Session::get('idDrink'))->select('name')-> get();
        $Amount = receipt::where('idReceipt',Session::get('idReceipt'))->select('Amount')-> get();
        $Date = receipt::where('idReceipt',Session::get('idReceipt'))->select('receiptDate')-> get();
        $Price = receipt::where('idReceipt',Session::get('idReceipt'))->select('Price')-> get();
        $Total = receipt::where('idReceipt',Session::get('idUser'))->select('Total')-> get();   */ 

        
        return view('orderhistory',compact('receipt'));
    }


    
}

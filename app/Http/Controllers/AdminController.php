<?php

namespace App\Http\Controllers;
use App\Models\DetailReceipt;
use App\Models\Receipt;
use App\Models\DetailWeeklyBook;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;
use App\Models\User;
use DateTime;
use Auth;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminauth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(Request $request)
    {
        $receipt = DB::table('receipt')->where('idUser',Auth::id())->select('idReceipt','idUser','receiptDate','payment','status','total')->get();
        
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
        $dt = Carbon::today();

        $condition = true;
        $receipts = Receipt::when($condition, function ($query) use ($dt) {
            return $query->where('receiptDate', $dt);
        })
        ->get();
        
        return view('admin.dashboard', compact('receipts','receipt','detail','menu','topping', 'detailWeekly', 'detailTopping'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            
    }
}
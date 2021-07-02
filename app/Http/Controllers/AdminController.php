<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\DetailWeeklyBook;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;

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
        $receipts = Receipt::where([
            ['idReceipt', '!=', Null],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('idReceipt', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
        ->orderBy("idReceipt")
        ->paginate(10);
        
        //$check = array();
        //foreach($check as $key => $value){
        //    $value = 1;
        //}
        $check = array();
        foreach ($receipts as $r) {
            foreach($check as $key => $value){
                if (Carbon::parse($r['receiptDay'])->isToday()==true)
                {
                    $check = $r;
                } 
            }
            
        }
        return view('admin.dashboard', compact('check'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
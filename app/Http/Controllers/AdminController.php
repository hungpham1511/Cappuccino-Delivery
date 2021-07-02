<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\DetailWeeklyBook;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;
use DateTime;



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
                    $query->orWhere(Carbon::parse($r['receiptDate'])->isToday()==true)->get();
                }
            }]
        ])
        ->orderBy("idReceipt")
        ->paginate(10);

        $dt = Carbon::today();

        $condition = true;
        $check = Receipt::when($condition, function ($query) use ($dt) {
            return $query->where('receiptDate', $dt);
        })
        ->get();
        
        return view('admin.dashboard', compact('receipts','check'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
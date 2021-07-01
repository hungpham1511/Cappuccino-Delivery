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
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        $day = Carbon::now()->day;
        
        foreach ($receipts as $key) {
        
            $y = Carbon::parse($key['receiptDay'])->year;
            $m = Carbon::parse($key['receiptDay'])->month;
            $d = Carbon::parse($key['receiptDay'])->day;
            if ($year == $y && $month == $m&& $day == $d)
            {
                $data = $key;
            }
        }
        return view('admin.dashboard', compact('receipts','data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
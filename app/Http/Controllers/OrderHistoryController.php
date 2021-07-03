<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;

class OrderHistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminauth');
    }

    public function index(Request $request)
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

        return view('admin.receipts.index_order', compact('receipts'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
        

    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'receiptDate'=> 'required',
            'status'=> 'required',
            'amount' => 'required',
            'price' => 'required',
            'total' => 'required',
            
        ]);
    }
    public function history(){
        $getorder = Order::where('idUser', Session::get('idUser'))->orderby('idReceipt', 'DESC')->get();
        return view('pages.history.history')->with(compact('getorder'));


    }

}

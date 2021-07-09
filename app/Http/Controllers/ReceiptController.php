<?php

namespace App\Http\Controllers;
use App\Models\DetailReceipt;
use App\Models\Receipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;
use App\Models\User;
use Auth;

class ReceiptController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminauth');
    }
    
    public function index(Request $request)
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

        return view('admin.receipts.index_order', compact('receipts','receipt','detail','menu','topping', 'detailWeekly','detailTopping'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.receipts.CreateOrder');
    }

    public function store(Request $request)
    {
        $request->validate([
            'receiptDate' => 'required',
            'payment' => 'required',
            'status' => 'required',
            'total' => 'required'
        ]);

        Receipt::create($request->all());

        return redirect()->route('receipts.index')
            ->with('success', 'Congratulate! Order has been created successfully.');
    }

    public function edit(Receipt $receipt)
    {
        return view('admin.receipts.EditOrder', compact('receipt'));
    }
    
    public function update(Request $request, Receipt $receipt)
    {
        $request->validate([
            'receiptDate' => 'required',
            'payment' ,
            'status' ,
            'total' => 'required'
        ]);
        $receipt->update($request->all());

        return redirect()->route('receipts.index')
            ->with('success', 'Congratulate! Order has been updated successfully.');
    }
    
    public function destroy(Receipt $receipt)
    {
        $receipt->delete();

        return redirect()->route('receipts.index')
            ->with('success', 'Order has been deleted successfully.');
    }
}

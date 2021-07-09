<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;

class ReceiptController extends Controller
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

    public function create()
    {
        return view('admin.receipts.CreateOrder');
    }

    public function store(Request $request)
    {
        $request->validate([
            'receiptDate' => 'required',
            'payment' => 'required',
            'note' => 'required',
            'status' => 'required',
            'total' => 'required'
        ]);

        Receipt::create($request->all());

        return redirect()->route('receipts.index')
            ->with('success', 'Congratulate! Order has been created successfully.');
    }

    public function show(Receipt $receipt)
	{
        $receipt = Receipt::with('detail_receipt')->get();
        // $receipt = DB::table('receipt')
        //                 ->join('detail_receipt', 'receipt.idReceipt', '=', 'detail_receipt.idReceipt')
        //                 ->select('*')
        //                 ->get();
		return view('admin.receipts.ShowDetail',compact('receipt'));
	}

    public function edit(Receipt $receipt)
    {
        return view('admin.receipts.EditOrder', compact('receipt'));
    }
    
    public function update(Request $request, Receipt $receipt)
    {
        $request->validate([
            'receiptDate' => 'required',
            'payment' => 'required',
            'note' => 'required',
            'status' => 'required',
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

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;


class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminauth');
    }
    
    public function index(Request $request)
    {
        $orders = Order::where([
            ['IdReceipt', '!=', Null],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('IdReceipt', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
        ->orderBy("IdReceipt")
        ->paginate(10);

        return view('admin.orders.index_order', compact('orders'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.orders.CreateOrder');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ReceiptDate' => 'required',
            'Payment' => 'required',
            'Note' => 'required',
            'Status' => 'required',
            'Total' => 'required'
        ]);

        Order::create($request->all());

        return redirect()->route('orders.index')
            ->with('success', 'Congratulate! Order has been created successfully.');
    }

    public function edit(Order $order)
    {
        return view('admin.orders.EditOrder', compact('order'));
    }
    
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'ReceiptDate' => 'required',
            'Payment' => 'required',
            'Note' => 'required',
            'Status' => 'required',
            'Total' => 'required'
        ]);
        $order->update($request->all());

        return redirect()->route('orders.index')
            ->with('success', 'Congratulate! Order has been updated successfully.');
    }
    
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Order has been deleted successfully.');
    }
}

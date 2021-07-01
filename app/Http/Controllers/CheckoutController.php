<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('checkout');
    }

    public function createreceipt(Request $request)
    {
        error_log('Some message here.');
        $isWeeklyBook = $request->input('isWeeklyBook');
        $mon = $request->input('mon');
        $tue = $request->input('tue');
        $wed = $request->input('wed');
        $thu = $request->input('thu');
        $fri = $request->input('fri');
        $sat = $request->input('sat');
        $sun = $request->input('sun');
        if ($isWeeklyBook == true)
            DB::table('detail_weekly_book')->insert(
                array('mon' => $mon, 'tue' => $tue, 'wed' => $wed)
            );
        if ($request->input('submit')) {
            error_log('Some message here.');
        }
    }
}

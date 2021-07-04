<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

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

    public function create(Request $request)
    {
        //add weeklybook
        if ($request->input('isWeeklyBook') == true) $isWeeklyBook = 1;
            else $isWeeklyBook = 0;
        if ($isWeeklyBook == 1) {
            if ($request->input('mon') == true) $mon = 1;
            else $mon = 0;
            if ($request->input('tue') == true) $tue = 1;
            else $tue = 0;
            if ($request->input('wed') == true) $wed = 1;
            else $wed = 0;
            if ($request->input('thu') == true) $thu = 1;
            else $thu = 0;
            if ($request->input('fri') == true) $fri = 1;
            else $fri = 0;
            if ($request->input('sat') == true) $sat = 1;
            else $sat = 0;
            if ($request->input('sun') == true) $sun = 1;
            else $sun = 0;
            $startDay = $request->input('startdate');
            $endDay = $request->input('enddate');
            $time = $request->input('time');
            DB::table('detail_weekly_book')->insertGetId(
                array('mon' => $mon, 'tue' => $tue, 'wed' => $wed, 'thu' => $thu, 'fri' => $fri, 'sat' => $sat, 'sun' => $sun, 'startDay' => $startDay, 'finishDay' => $endDay, 'deliveryTime' => $time)
            );
        }
        if ($request->input('isWeeklyBook') == true) $idDetailWeeklyBook = DB::table('detail_weekly_book') -> max('idDetailWeeklyBook'); 
            else $idDetailWeeklyBook = 0;
        //add receipt
        $idUser = Auth::user()->idUser;
        if ($request->input('paymentmethod')=="cod") $payment = 1;
            else $payment = 2;
        $timecurrent = date("Y/m/d");
        $name = $request->input('name');
        $address = $request->input('address');
        $phone = $request->input('number');
        $note = $request->input('note');
        $promotion = DB::table('promotion') 
        ->select('idPromotion')
        ->where('promotionCode','=', $request->input('promotion'))
        ->value('idPromotion');
        DB::table('receipt')->insertGetId(
            array('idDetailWeeklyBook' => $idDetailWeeklyBook, 'isWeeklyBook' => $isWeeklyBook, 'note' => $note, 'idPromotion' => $promotion, 'name' => $name, 'address' => $address, 'phone' => $phone, 'payment' => $payment, 'receiptDate' => $timecurrent, 'idUser' => $idUser)
        );
        $idReceipt = DB::table('receipt') -> max('idReceipt'); 
        return $idUser;

        //add detail drink
        $drink = $_COOKIE['drink'];
        $drinkslipt = explode("-", $drink);
        foreach ($drinkslipt as $detaildrink) {
            $info = explode (" ", $detaildrink);
        }

        $coffee = DB::table('menu')
            ->select('*')
            ->where('category', '=', 'Coffee')
            ->get();
        $tea = DB::table('menu')
            ->select('*')
            ->where('category', '=', 'Tea')
            ->get();
        $iceBlended = DB::table('menu')
            ->select('*')
            ->where('category', '=', 'Ice Blended')
            ->get();
        $smoothie = DB::table('menu')
            ->select('*')
            ->where('category', '=', 'Smoothie')
            ->get();
        return view('orderpage', compact('coffee', 'tea', 'iceBlended', 'smoothie'));
    }
}

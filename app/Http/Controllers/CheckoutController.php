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
        $promotion = DB::table('promotion')
                        ->select('*')
                        ->get();
        $idUser = Auth::user()->idUser;
        $user = DB::table('users')
                ->select('*')
                ->where('idUser','=', $idUser)
                ->get();
        return view('checkout', compact('promotion', 'user'));
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
            else $idDetailWeeklyBook = null;

        //add receipt
        $idUser = Auth::user()->idUser;
        if ($request->input('paymentmethod')=="cod") $payment = 1;
            else if ($request->input('paymentmethod')=="momo") $payment = 2;
                else $payment = 3;    
        $timecurrent = date("Y/m/d");
        $name = $request->input('name');
        $address = $request->input('address');
        $phone = $request->input('number');
        $note = $request->input('note');
        $promotion = DB::table('promotion') 
        ->select('idPromotion')
        ->where('promotionCode','=', $request->input('promotion'))
        ->value('idPromotion');
        if ($promotion != 0) 
            $promoStatus = DB::table('promotion') 
            ->select('status')
            ->where('promotionCode','=', $request->input('promotion'))
            ->value('status');
        DB::table('receipt')->insertGetId(
            array('idDetailWeeklyBook' => $idDetailWeeklyBook, 'isWeeklyBook' => $isWeeklyBook, 'note' => $note, 'idPromotion' => $promotion, 'name' => $name, 'address' => $address, 'phone' => $phone, 'payment' => $payment, 'receiptDate' => $timecurrent, 'idUser' => $idUser)
        );
        $idReceipt = DB::table('receipt') -> max('idReceipt'); 

        //add detail drink
        $totalprice = 0;
        $drink = $_COOKIE['drink'];
        $drinkslipt = explode("-", $drink);
        array_pop($drinkslipt);
        foreach ($drinkslipt as $detaildrink) {
            $info = explode (" ", $detaildrink);
            $price = DB::table('menu') 
            ->select('price')
            ->where('idDrink','=', $info[0])
            ->value('price');
            if ($info[1]=="S") $price -= 5000;
            if ($info[1]=="L") $price += 5000;
            if ($info[1]=="S") $size = 1;
            if ($info[1]=="M") $size = 2;
            if ($info[1]=="L") $size = 3;
            DB::table('detail_receipt')->insertGetId(
                array('idReceipt' => $idReceipt, 'idDrink' => $info[0], 'size' => $size, 'amount' => $info[count($info)-1])
            );
            $idDetailReceipt = DB::table('detail_receipt') -> max('idDetailReceipt'); 
            for ($i = 2; $i < count($info)-2; $i++) {
                DB::table('detail_topping')->insertGetId(
                    array('idTopping' => $info[$i], 'idDetailReceipt' => $idDetailReceipt)
                );
                $price += DB::table('topping') 
                ->select('price')
                ->where('idTopping','=', $info[$i])
                ->value('price');
            }
            $price *= $info[count($info)-1];
            $totalprice += $price;
            DB::table('detail_receipt') 
            -> where('idDetailReceipt', $idDetailReceipt)
            -> update(['price' => $price]);
        }
        if ($promotion != 0 && $promoStatus == 1) {
            if (DB::table('promotion')
            ->select('promotionType')
            ->where('idPromotion', '=', $promotion)
            ->value('promotionType') == 0) {
                $percent = DB::table('promotion')
                ->select('percentPromo')
                ->where('idPromotion', '=', $promotion)
                ->value('percentPromo');
                $totalprice *= ((100-$percent)/100);
            }
            else {
                $moneyDiscount = DB::table('promotion')
                ->select('moneyPromo')
                ->where('idPromotion', '=', $promotion)
                ->value('moneyPromo');
                $totalprice -= $moneyDiscount;
            }
        }
        $totalprice += 5000;
        DB::table('receipt') 
        -> where('idReceipt', $idReceipt)
        -> update(['total' => $totalprice]);
        return redirect()->route('orderpage');
    }
}

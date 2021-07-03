<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function create(Request $request)
    {
        $dark = $_COOKIE['laravel_session'];
        $dark2 = '1 S 5 1';
        $dark2slipt = explode(" ", $dark2);

        return count($dark2slipt);
        $isWeeklyBook = $request->input('isWeeklyBook');
        if ($isWeeklyBook == true) {
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

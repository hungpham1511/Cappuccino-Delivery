<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;

class PromotionController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminauth');
    }
    
    public function index(Request $request)
    {
        $data = Promotion::where([
            ['promotionCode', '!=', Null],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('promotionCode', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
        ->orderBy("idPromotion", 'desc')
        ->paginate(10);


        return view('admin.promotion.index', compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.promotion.CreatePromotion');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'promotionType'=> 'required',
            'promotionCode'=> 'required',
            'percentPromo',
            'moneyPromo',
            'expireDay'=> 'required',
        ]);
        $data = $request->all();
        if (Carbon::now() > Carbon::parse($data['expireDay']))
        {
            $data['status'] =0;
            
        } else {
            $data['status'] =1;
        }
        Promotion::create($data);
        return redirect()->route('promotion.index')
            ->with('success', 'Congratulate! New promotion has been created successfully.');
    }

    public function edit(Promotion $data)
    {
        return view('admin.promotion.EditPromotion', compact('data'));
    }
    
    public function update(Request $request, Promotion $data)
    {
        $request->validate([
            'promotionType',
            'promotionCode'=> 'required',
            'percentPromo',
            'moneyPromo',
            'expireDay'=> 'required',
        ]);
        $dt = $request->all();
        if (Carbon::now() > Carbon::parse($dt['expireDay']))
        {
            $dt['status'] =0;
            
        } else {
            $dt['status'] =1;
        }
        $data->update($dt);

        return redirect()->route('promotion.index')
            ->with('success', 'Congratulate! Promotion has been updated successfully.');
    }
    
    public function destroy(Promotion $data)
    {
        $data->delete();

        return redirect()->route('promotion.index')
            ->with('success', 'Data has been deleted successfully.');
    }
}

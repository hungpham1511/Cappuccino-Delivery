<?php

namespace App\Http\Controllers;

use App\Models\Topping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;


class ToppingController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminauth');
    }
    
    public function index(Request $request)
    {
        $data = Topping::where([
            ['name', '!=', Null],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('name', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
        ->orderBy("idTopping")
        ->paginate(10);


        return view('admin.topping.index', compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.topping.CreateTopping');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);

        Topping::create($request->all());

        return redirect()->route('topping.index')
            ->with('success', 'Congratulate! New topping type has been created successfully.');
    }

    public function edit(Topping $data)
    {
        return view('admin.topping.EditTopping', compact('data'));
    }
    
    public function update(Request $request, Topping $data)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);
        $data->update($request->all());

        return redirect()->route('topping.index')
            ->with('success', 'Congratulate! Topping has been updated successfully.');
    }
    
    public function destroy(Topping $data)
    {
        $data->delete();

        return redirect()->route('topping.index')
            ->with('success', 'Topping has been deleted successfully.');
    }
}

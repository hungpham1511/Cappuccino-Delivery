<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminauth');
    }

    public function index(Request $request)
    {
        $drinks = Menu::where([
            ['name', '!=', Null],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('name', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
        ->orderBy("idDrink")
        ->paginate(10);


        return view('admin.menu.index', compact('drinks'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.menu.CreateMenu');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'picture' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        // $input = $request->all();

        // if ($picture = $request->file('picture')) {
        //     $destinationPath = 'picture/';
        //     $profileImage = date('YmdHis') . "." . $picture->getClientOriginalExtension();
        //     $picture->move($destinationPath, $profileImage);
        //     $input['picture'] = "$profileImage";
        // }

        Menu::create($request->all());

        return redirect()->route('menu.index')
            ->with('success', 'Congratulate! New drink has been created successfully.');
    }

    public function edit(Menu $drink)
    {
        return view('admin.menu.EditMenu', compact('drink'));
    }

    public function update(Request $request, Menu $drink)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        // $input = $request->all();

        // if ($picture = $request->file('picture')) {
        //     $destinationPath = 'picture/';
        //     $profileImage = date('YmdHis') . "." . $picture->getClientOriginalExtension();
        //     $picture->move($destinationPath, $profileImage);
        //     $input['picture'] = "$profileImage";
        // }
        // else{
        //     unset($input['picture']);
        // }
        
        $drink->update($request->all());

        return redirect()->route('menu.index')
            ->with('success', 'Congratulate! Drink has been updated successfully.');
    }

    public function destroy(Menu $drink)
    {
        $drink->delete();

        return redirect()->route('menu.index')
            ->with('success', 'Drink has been deleted successfully.');
    }
}

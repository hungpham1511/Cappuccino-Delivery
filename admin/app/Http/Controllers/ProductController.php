<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminauth');
    }
    
    public function index(Request $request)
    {
        $products = Product::where([
            ['Name', '!=', Null],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('Name', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
        ->orderBy("IdDrink")
        ->paginate(10);
        // $products = Product::latest()->paginate(5);

        return view('admin.products.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.products.CreateMenu');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required',
            'Category' => 'required',
            'Picture' => 'required',
            'Description' => 'required',
            'Price' => 'required'
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Congratulate! Product has been created successfully.');
    }

    public function edit(Product $product)
    {
        return view('admin.products.EditMenu', compact('product'));
    }
    
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'Name' => 'required',
            'Category' => 'required',
            'Picture' => 'required',
            'Description' => 'required',
            'Price' => 'required'
        ]);
        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Congratulate! Product has been updated successfully.');
    }
    
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product has been deleted successfully.');
    }
}

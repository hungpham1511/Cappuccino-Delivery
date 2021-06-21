<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class UserManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminauth');
    }
    
    public function index(Request $request)
    {
        $customers = User::where([
            ['fullname', '!=', Null],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('fullname', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
        ->orderBy("id", "desc")
        ->paginate(10);

        return view('admin.customers.index_customer', compact('customers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.customers.CreateCustomer');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
            'fullname' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required'
        ]);

        User::create($request->all());

        return redirect()->route('customers.index')
            ->with('success', 'Congratulate! Customer has been created successfully.');
    }

    public function edit(User $customer)
    {
        return view('admin.customers.EditCustomer', compact('customer'));
    }
    
    public function update(Request $request, User $customer)
    {
        $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
            'fullname' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required'
        ]);
        $customer->update($request->all());

        return redirect()->route('customers.index')
            ->with('success', 'Congratulate! Customer has been updated successfully.');
    }
    
    public function destroy(User $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')
            ->with('success', 'Customer has been deleted successfully.');
    }
}

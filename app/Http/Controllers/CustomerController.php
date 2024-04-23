<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        // list all customers
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        // show form to create a new customer
        return view('customers.create');
    }

    public function store(Request $request)
    {
        // store a new customer
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'company_name' => 'sometimes|max:255',
            'fiscal_data' => 'required',
            'customer_number' => 'required|unique:customers'
        ]);

        Customer::create($validatedData);
        return redirect()->route('customers.index');
    }

    public function show(Customer $customer)
    {
        // show a single customer and their orders
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        // show form to edit a customer
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        // update customer information
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'company_name' => 'sometimes|max:255',
            'fiscal_data' => 'required',
            'customer_number' => 'required|unique:customers,customer_number,' . $customer->id
        ]);

        $customer->update($validatedData);
        return redirect()->route('customers.index');
    }

    public function destroy(Customer $customer)
    {
        // delete a customer
        $customer->delete();
        return redirect()->route('customers.index');
    }
}


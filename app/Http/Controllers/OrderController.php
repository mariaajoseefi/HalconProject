<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Status;

class OrderController extends Controller
{
    public function index()
    {
        // display a listing of orders
        $orders = Order::with('status', 'customer')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        // show the form for creating a new order
        $customers = Customer::all();
        $statuses = Status::all();
        return view('orders.create', compact('customers', 'statuses'));
    }

    public function store(Request $request)
    {
        // validate and store a newly created order
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'status_id' => 'required|exists:statuses,id',
            'invoice_number' => 'required|unique:orders',
            'delivery_address' => 'required',
            'notes' => 'nullable'
        ]);

        $order = Order::create($validatedData);
        return redirect()->route('orders.index');
    }

    public function show(Order $order)
    {
        // display the specified order with its details
        $order->load('customer', 'status', 'evidencePhotos');
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        // show the form for editing the specified order
        $statuses = Status::all();
        return view('orders.edit', compact('order', 'statuses'));
    }

    public function update(Request $request, Order $order)
    {
        // validate and update the specified order
        $validatedData = $request->validate([
            'status_id' => 'required|exists:statuses,id',
            'delivery_address' => 'required',
            'notes' => 'nullable'
        ]);

        $order->update($validatedData);
        return redirect()->route('orders.index');
    }

    public function destroy(Order $order)
    {
        // logically delete the specified order
        $order->delete();
        return redirect()->route('orders.index');
    }

    public function trackOrder(Request $request)
    {
        $invoiceNumber = $request->invoice_number;
        $order = Order::where('invoice_number', $invoiceNumber)->with('status')->first();
        
        return view('users.unregistered', compact('order'));
    }

    public function archive(Order $order)
    {
        $order->archived = true;
        $order->save();
        return redirect()->route('orders.index')->with('status', 'Order archived successfully!');
    }
    
    public function unarchive(Order $order)
    {
        $order->archived = false;
        $order->save();
        return redirect()->route('orders.index')->with('status', 'Order restored successfully!');
    }
    
    public function archived()
    {
        $archivedOrders = Order::where('archived', true)->with('customer', 'status')->get();
        return view('orders.archived', compact('archivedOrders'));
    }
}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order Details - Halcon Materials</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/aguila.png') }}">
</head>
<body>
    <header>Halcon Construction Materials - Order Details</header>
    <div class="container">
        <nav class="nav-links">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('dashboard.index') }}">Dashboard</a>
            <a href="{{ route('users.index') }}">Users</a>
            <a href="{{ route('orders.index') }}">Orders</a>
        </nav>
        
        <div>
            <h2>Order Details</h2>
            <p><strong>Invoice Number:</strong> {{ $order->invoice_number }}</p>
            <p><strong>Customer:</strong> {{ $order->customer->name }}</p>
            <p><strong>Status:</strong> {{ $order->status->name }}</p>
            <p><strong>Delivery Address:</strong> {{ $order->delivery_address }}</p>
            <p><strong>Notes:</strong> {{ $order->notes ?? 'N/A' }}</p>
            <p><strong>Archived:</strong> {{ $order->archived ? 'Yes' : 'No' }}</p>
            <p><strong>Created At:</strong> {{ $order->created_at }}</p>
            <p><strong>Updated At:</strong> {{ $order->updated_at }}</p>
        </div>
    </div>
    <footer>
        &copy; {{ date('Y') }} Halcon Materials. All rights reserved.
    </footer>
</body>
</html>

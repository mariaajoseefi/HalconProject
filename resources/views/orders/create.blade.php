<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Order - Halcon Materials</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/aguila.png') }}">
</head>
<body>
    <header>Halcon Construction Materials - Create Order</header>
    <div class="container">
        <form method="POST" action="{{ route('orders.store') }}">
            @csrf
            <label for="customer_id">Customer:</label>
            <select id="customer_id" name="customer_id">
                @foreach($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>

            <label for="status_id">Status:</label>
            <select id="status_id" name="status_id">
                @foreach($statuses as $status)
                <option value="{{ $status->id }}">{{ $status->name }}</option>
                @endforeach
            </select>

            <label for="invoice_number">Invoice Number:</label>
            <input type="text" id="invoice_number" name="invoice_number" required>

            <label for="delivery_address">Delivery Address:</label>
            <input type="text" id="delivery_address" name="delivery_address" required>

            <label for="notes">Notes:</label>
            <textarea id="notes" name="notes"></textarea>

            <button type="submit">Create Order</button>
        </form>
    </div>
    <footer>
        &copy; {{ date('Y') }} Halcon Materials. All rights reserved.
    </footer>
</body>
</html>

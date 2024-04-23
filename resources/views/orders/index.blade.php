<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Orders List - Halcon Materials</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/aguila.png') }}">
</head>
<body>
    <header>Halcon Construction Materials - Orders List</header>
    <div class="container">
        <nav class="nav-links">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('dashboard.index') }}">Dashboard</a>
            <a href="{{ route('users.index') }}">Users</a>
        </nav>
        <table style="width: 100%; margin-top: 20px; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #f4f4f4; border-bottom: 2px solid #ddd;">
                    <th style="padding: 8px; text-align: left;">Invoice Number</th>
                    <th style="padding: 8px; text-align: left;">Customer</th>
                    <th style="padding: 8px; text-align: left;">Status</th>
                    <th style="padding: 8px; text-align: left;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 8px;">{{ $order->invoice_number }}</td>
                    <td style="padding: 8px;">{{ $order->customer->name }}</td>
                    <td style="padding: 8px;">{{ $order->status->name }}</td>
                    <td style="padding: 8px;">
                        <a href="{{ route('orders.show', $order->id) }}" style="color: #005792; text-decoration: none; margin-right: 10px;">View</a>
                        <a href="{{ route('orders.edit', $order->id) }}" style="color: #005792; text-decoration: none; margin-right: 10px;">Edit</a>
                        <a href="#" style="color: #c00; text-decoration: none;" onclick="event.preventDefault(); document.getElementById('delete-order-form-{{ $order->id }}').submit();">Delete</a>
                        <form id="delete-order-form-{{ $order->id }}" action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <footer>
        &copy; {{ date('Y') }} Halcon Materials. All rights reserved.
    </footer>
</body>
</html>


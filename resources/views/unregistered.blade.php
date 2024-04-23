<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Track Order - Halcon Materials</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/aguila.png') }}">
</head>
<body>
    <header>Halcon Construction Materials - Track Order</header>
    <div class="container">
        <div style="background-color: #fff; padding: 20px; margin-top: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            <h1 style="font-size: 24px; margin-bottom: 20px;">Track Your Order</h1>
            <form action="{{ url('/track-order') }}" method="GET">
                <div style="margin-bottom: 20px;">
                    <label for="invoice_number" style="display: block; color: #333; font-weight: bold; margin-bottom: 5px;">Invoice Number:</label>
                    <input type="text" id="invoice_number" name="invoice_number" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                </div>
                <button type="submit" style="background-color: #005792; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">Track</button>
            </form>
        </div>

        @if (isset($order))
            <div style="background-color: #fff; padding: 20px; margin-top: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                @if($order->status === 'Delivered')
                    <h2 style="font-size: 24px; margin-bottom: 10px;">Order Status: Delivered</h2>
                    <img src="{{ asset('storage/' . $order->evidencePhoto) }}" alt="Delivery Evidence" style="max-width: 100%; border-radius: 8px;">
                @elseif($order->status === 'In Process')
                    <h2 style="font-size: 24px; margin-bottom: 10px;">Order Status: In Process</h2>
                    <p>Process Name: {{ $order->process_name }}</p>
                    <p>Date: {{ $order->process_date }}</p>
                @endif
            </div>
        @endif
    </div>
    <footer style="text-align: center; padding: 20px 0; background-color: #333; color: white;">
        &copy; {{ date('Y') }} Halcon Materials. All rights reserved.
    </footer>
</body>
</html>

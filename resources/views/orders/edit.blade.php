<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Order - Halcon Materials</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/aguila.png') }}">
</head>
<body>
    <header>Halcon Construction Materials - Edit Order</header>
    <div class="container">
        <form method="POST" action="{{ route('orders.update', $order->id) }}" style="padding: 20px; text-align: center;">
            @csrf
            @method('PUT')
            <label for="status_id">Status:</label>
            <select id="status_id" name="status_id" onchange="checkStatus(this.value);">
                @foreach($statuses as $status)
                <option value="{{ $status->id }}" {{ $order->status_id == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                @endforeach
            </select>

            <label for="delivery_address">Delivery Address:</label>
            <input type="text" id="delivery_address" name="delivery_address" value="{{ $order->delivery_address }}" required>

            <label for="notes">Notes:</label>
            <textarea id="notes" name="notes">{{ $order->notes }}</textarea>

            <div id="photoEvidence" style="display: none;">
                <label for="evidence_photo">Evidence Photo:</label>
                <input type="file" id="evidence_photo" name="evidence_photo">
            </div>

            <button type="submit" style="background-color: #005792; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">Update Order</button>
        </form>
    </div>
    <footer>
        &copy; {{ date('Y') }} Halcon Materials. All rights reserved.
    </footer>
</body>
<script>
function checkStatus(statusId) {
    var display = (statusId == 2 || statusId == 3) ? 'block' : 'none'; // Assuming 'In Route' and 'Delivered' are ids 2 and 3.
    document.getElementById('photoEvidence').style.display = display;
}
</script>
</html>

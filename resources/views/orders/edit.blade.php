<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Order - Halcon Materials</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/aguila.png') }}">
</head>
<body>
    <header>Halcon Construction Materials - Edit Order</header>
    <div class="container">
        <form method="POST" action="{{ route('orders.update', $order->id) }}">
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

            <button type="submit">Update Order</button>
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

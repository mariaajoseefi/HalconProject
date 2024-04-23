<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Halcon Materials</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/aguila.png') }}">
</head>
<body>
    <header>Halcon Construction Materials - Dashboard</header>
    <div class="container">
        <div class="dashboard-navigation" style="display: flex; justify-content: space-between; margin-top: 20px;">
            <div class="dashboard-item" style="text-align: center; padding: 20px; background-color: #f4f4f4; border-radius: 8px; width: 30%;">
                <h3>User Management</h3>
                <p>Manage user accounts and roles.</p>
                <a href="{{ route('users.index') }}" class="button" style="background-color: #005792; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Go to Users</a>
            </div>
            <div class="dashboard-item" style="text-align: center; padding: 20px; background-color: #f4f4f4; border-radius: 8px; width: 30%;">
                <h3>Order Management</h3>
                <p>View, create, and update orders.</p>
                <a href="{{ route('orders.index') }}" class="button" style="background-color: #005792; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Manage Orders</a>
            </div>
            <div class="dashboard-item" style="text-align: center; padding: 20px; background-color: #f4f4f4; border-radius: 8px; width: 30%;">
                <h3>Archived Orders</h3>
                <p>Review or restore archived orders.</p>
                <a href="{{ route('archived.index') }}" class="button" style="background-color: #005792; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Archived Orders</a>
            </div>
        </div>
    </div>
    <footer>
        &copy; {{ date('Y') }} Halcon Materials. All rights reserved.
    </footer>
</body>
</html>


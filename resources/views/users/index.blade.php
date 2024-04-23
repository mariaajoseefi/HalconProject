<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Users List - Halcon Materials</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/aguila.png') }}">
</head>
<body>
    <header>Halcon Construction Materials - User List</header>
    <div class="container">
        <nav class="nav-links">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('dashboard.index') }}">Dashboard</a>
            <a href="{{ route('orders.index') }}">Orders</a>
        </nav>
        <table style="width: 100%; margin-top: 20px; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #f4f4f4; border-bottom: 2px solid #ddd;">
                    <th style="padding: 8px; text-align: left;">Username</th>
                    <th style="padding: 8px; text-align: left;">Status</th>
                    <th style="padding: 8px; text-align: left;">Role</th>
                    <th style="padding: 8px; text-align: left;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 8px;">{{ $user->username }}</td>
                    <td style="padding: 8px;">{{ $user->active ? 'Active' : 'Inactive' }}</td>
                    <td style="padding: 8px;">{{ $user->role->name }}</td>
                    <td style="padding: 8px;">
                        <a href="{{ route('users.edit', $user->id) }}" style="color: #005792; text-decoration: none; margin-right: 10px;">Edit</a>
                        <a href="#" style="color: #c00; text-decoration: none;" onclick="event.preventDefault(); document.getElementById('delete-user-form-{{ $user->id }}').submit();">Delete</a>
                        <form id="delete-user-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: none;">
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


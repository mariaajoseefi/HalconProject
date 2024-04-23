<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create User - Halcon Materials</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/aguila.png') }}">
</head>
<body>
    <header>Halcon Construction Materials - Create User</header>
    <div class="container">
        <form method="POST" action="{{ route('users.store') }}">
            @csrf
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="role_id">Role:</label>
            <select id="role_id" name="role_id">
                @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>

            <button type="submit">Create User</button>
        </form>
    </div>
    <footer>
        &copy; {{ date('Y') }} Halcon Materials. All rights reserved.
    </footer>
</body>
</html>

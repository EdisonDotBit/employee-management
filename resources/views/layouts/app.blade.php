<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee Management</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans bg-gray-100">
    <div class="min-h-screen">
        <!-- Navigation -->
        <nav class="bg-blue-600 text-white shadow-lg">
            <div class="container mx-auto px-4 py-3 flex justify-between items-center">
                <a href="{{ auth()->check() ? route('dashboard') : route('home') }}" class="text-xl font-bold">
                    EMPLOYEE MANAGEMENT
                </a>
                <div class="flex space-x-4">
                    @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="hover:bg-blue-700 px-3 py-2 rounded">Logout</button>
                    </form>
                    @else
                    <a href="{{ route('login') }}" class="hover:bg-blue-700 px-3 py-2 rounded">Login</a>
                    <a href="{{ route('register') }}" class="hover:bg-blue-700 px-3 py-2 rounded">Register</a>
                    @endauth
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="container mx-auto px-4 py-6">
            @yield('content')
        </main>
    </div>
</body>

</html>
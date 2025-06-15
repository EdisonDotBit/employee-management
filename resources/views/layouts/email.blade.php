<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Management</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f3f4f6;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="container">
        @yield('content')
        <div class="mt-6 text-center text-sm text-gray-500">
            © {{ date('Y') }} Employee Management. All rights reserved.
        </div>
    </div>
</body>

</html>
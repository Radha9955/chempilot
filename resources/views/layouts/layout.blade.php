<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Warehouse App')</title>

    <!-- Bootstrap CSS (optional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add FontAwesome CDN to your layout -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    

    <!-- Custom CSS -->
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1 class="mb-4">Chempilot</h1>
        
        {{-- Content Section --}}
        @yield('content')
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Additional scripts if needed --}}
    @yield('scripts')

</body>
</html>

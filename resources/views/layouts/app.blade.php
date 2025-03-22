<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'EduNext')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <x-header />
    
    <main>
        {{-- Another template will be inserted here, it will display the current design of the loaded page --}}
        @yield('content')
    </main>
    
    <x-footer />
    
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
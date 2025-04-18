<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'EduNext')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- Require this to show the design on upload page --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Require this to use the sidebar collapsible function --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <x-header />
    
    <main>
        {{-- Another template will be inserted here, it will display the current design of the loaded page --}}
        @yield('content')
    </main>
    
    <x-footer />
    
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
</body>
</html>
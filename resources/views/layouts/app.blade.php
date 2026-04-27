<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyMovieGweh</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/svg+xml">
</head>

<body class="font-[Poppins] antialiased bg-background text-foreground">
    <x-navbar />

    <main class="min-h-screen pt-20 pb-10">
        @yield('content')
    </main>

    @include('components.footer')
</body>

</html>

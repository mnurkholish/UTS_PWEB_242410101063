<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyMovieGweh</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/svg+xml">
</head>

<body class="font-[Poppins] antialiased min-h-screen relative">

    {{-- BG --}}
    <div class="absolute inset-0">
        <img src="{{ asset('images/background.png') }}" class="w-full h-full object-cover" alt="Background">

        <div class="absolute inset-0 bg-black/50"></div>
    </div>

    <div class="relative z-10 flex items-center justify-center min-h-screen">

        <div
            class="w-full max-w-sm p-8 rounded-2xl
                    bg-white/10 backdrop-blur-xl
                    border border-white/20
                    shadow-lg text-white">

            <div class="text-center mb-6">
                <h1 class="text-2xl font-semibold">
                    Login
                </h1>
            </div>

            <form action="{{ route('login.store') }}" method="POST" class="space-y-4">
                @csrf

                <input type="text" name="username" placeholder="Masukkan Username . . ."
                    value="{{ old('username') }}"
                    class="w-full bg-transparent border-b border-white/40
                           py-2 outline-none placeholder:text-white/70">
                @error('username')
                    <p class="text-xs text-red-500">{{ $message }}</p>
                @enderror

                <input type="password" name="password" placeholder="Masukkan Password . . ."
                    value="{{ old('password') }}"
                    class="w-full bg-transparent border-b border-white/40
                           py-2 outline-none placeholder:text-white/70">
                @error('password')
                    <p class="text-xs text-red-500">{{ $message }}</p>
                @enderror

                <div class="flex justify-between items-center text-xs text-white/80">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" class="accent-white">
                        Remember me
                    </label>
                    <span class="hover:underline cursor-pointer">
                        Forgot password?
                    </span>
                </div>

                <button type="submit"
                    class="w-full py-2 rounded-md bg-white text-black
                           hover:bg-white/85 transition cursor-pointer">
                    Log In
                </button>

            </form>

            <p class="text-center text-xs mt-4 text-white/70">
                Don't have an account? Register
            </p>

        </div>

    </div>

</body>

</html>

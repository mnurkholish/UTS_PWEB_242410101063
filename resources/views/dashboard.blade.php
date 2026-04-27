@extends('layouts.app')

@section('content')
    <div class="relative h-[60vh] flex items-center justify-center text-center">
        <img src="{{ asset('images/hero.webp') }}" class="absolute inset-0 w-full h-full object-cover">

        <div class="absolute inset-0 bg-black/50"></div>

        <div class="relative z-10 text-white">
            <h1 class="text-5xl font-bold mb-3">
                Halo, {{ $username }}!
            </h1>
            <p class="text-lg text-white/80">
                Catat riwayat nontonmu :P
            </p>
        </div>

    </div>

    <div class="max-w-7xl mx-auto px-6 py-10 space-y-10">

        <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="p-6 rounded-2xl bg-card border border-border text-center">
                <p class="text-sm text-muted-foreground">Watched</p>
                <h2 class="text-3xl font-bold">{{ $watched->count() }}</h2>
            </div>

            <div class="p-6 rounded-2xl bg-card border border-border text-center">
                <p class="text-sm text-muted-foreground">Watchlist</p>
                <h2 class="text-3xl font-bold">{{ $watchlist->count() }}</h2>
            </div>

            <div class="p-6 rounded-2xl bg-card border border-border text-center">
                <p class="text-sm text-muted-foreground">Avg Rating</p>
                <h2 class="text-3xl font-bold">{{ $avgRating }}</h2>
            </div>

        </div>

        <div>
            <h2 class="text-xl font-semibold mb-4">Recent Movies</h2>

            <div class="grid grid-cols-1 md:grid-cols-6 gap-6">

                @foreach (array_slice($movies, 0, 6) as $movie)
                    <div class="rounded-2xl overflow-hidden border border-border bg-card">

                        <img src="{{ asset($movie['image'] ?? 'images/movies/default-movie.png') }}"
                            onerror="this.onerror=null;this.src='{{ asset('images/movies/default-movie.png') }}';"
                            class="w-full h-64 object-cover">

                        <div class="p-4 space-y-2">

                            <h3 class="font-semibold text-lg">
                                {{ $movie['title'] }}
                            </h3>

                            <p class="text-sm text-muted-foreground">
                                {{ $movie['genre'] }}
                            </p>

                            <span
                                class="text-xs px-2 py-1 rounded-full
                                {{ $movie['status'] == 'watched' ? 'bg-green-100 text-green-600' : 'bg-yellow-100 text-yellow-600' }}">
                                {{ $movie['status'] }}
                            </span>

                            @if ($movie['rating'])
                                <p class="text-sm mt-1">
                                    {{ str_repeat('⭐', $movie['rating']) }}
                                </p>
                            @endif

                        </div>

                    </div>
                @endforeach

            </div>
        </div>

    </div>
@endsection

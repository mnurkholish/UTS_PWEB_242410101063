@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-6 py-10" x-data="{ filter: 'all' }">

        <div class="mb-6">
            <h1 class="text-2xl font-semibold">Movie Management</h1>
            <p class="text-sm text-muted-foreground">
                Kelola daftar film kamu
            </p>
        </div>

        {{-- FILTER --}}
        <div class="flex justify-between">
            <div class="flex gap-3 mb-8">

                <button @click="filter='all'" :class="filter === 'all' ? 'bg-primary text-white' : 'bg-card'"
                    class="px-4 py-2 rounded-xl border border-border text-sm transition">
                    All
                </button>

                <button @click="filter='watched'" :class="filter === 'watched' ? 'bg-primary text-white' : 'bg-card'"
                    class="px-4 py-2 rounded-xl border border-border text-sm transition">
                    Watched
                </button>

                <button @click="filter='watchlist'" :class="filter === 'watchlist' ? 'bg-primary text-white' : 'bg-card'"
                    class="px-4 py-2 rounded-xl border border-border text-sm transition">
                    Watchlist
                </button>

            </div>

            <div>
                <button
                    class="px-2.5 py-0.5 rounded-xl border border-border text-2xl text-white transition cursor-pointer bg-green-400 hover:bg-green-500">
                    +
                </button>
            </div>
        </div>

        {{-- LIST MOVIE --}}
        <div class="grid grid-cols-1 md:grid-cols-6 gap-6">

            @foreach ($movies as $movie)
                <div x-show="filter === 'all' || filter === '{{ $movie['status'] }}'"
                    class="rounded-2xl overflow-hidden border border-border bg-card">

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
                                ⭐ {{ $movie['rating'] }}
                            </p>
                        @endif

                    </div>

                </div>
            @endforeach

        </div>

    </div>
@endsection

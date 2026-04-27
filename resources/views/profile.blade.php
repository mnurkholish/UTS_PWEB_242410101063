@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto px-6 py-10 space-y-10">
        <div class="flex flex-col md:flex-row items-center gap-6">

            <img src="{{ asset('images/avatar.jpg') }}" class="w-24 h-24 rounded-full object-cover border border-border">

            <div class="text-center md:text-left">
                <h1 class="text-3xl font-semibold">
                    {{ $username }}
                </h1>

                <p class="text-muted-foreground mt-1">
                    Elite Ball Knower
                </p>
            </div>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="p-6 rounded-2xl bg-card border border-border text-center">
                <p class="text-sm text-muted-foreground">Total Watched</p>
                <h2 class="text-2xl font-bold mt-1">
                    {{ $watched->count() }}
                </h2>
            </div>

            <div class="p-6 rounded-2xl bg-card border border-border text-center">
                <p class="text-sm text-muted-foreground">Favorite Genre</p>
                <h2 class="text-xl font-semibold mt-1">
                    {{ $favoriteGenre ?? '-' }}
                </h2>
            </div>

            <div class="p-6 rounded-2xl bg-card border border-border text-center">
                <p class="text-sm text-muted-foreground">Top Rating</p>
                <h2 class="text-2xl font-bold mt-1">
                    {{ $topMovie['rating'] ?? '-' }}
                </h2>
            </div>

        </div>

        @if ($topMovie)
            <div>
                <h2 class="text-xl font-semibold mb-4">Top Movie</h2>

                <div class="rounded-2xl overflow-hidden border border-border bg-card md:flex">

                    <img src="{{ asset($topMovie['image']) }}" class="w-full md:w-1/3 h-64 object-cover">

                    <div class="p-6 flex flex-col justify-center">

                        <h3 class="text-2xl font-semibold">
                            {{ $topMovie['title'] }}
                        </h3>

                        <p class="text-muted-foreground mt-1">
                            {{ $topMovie['genre'] }}
                        </p>

                        <p class="mt-3 text-lg">
                            ⭐ {{ $topMovie['rating'] }}
                        </p>

                    </div>

                </div>
            </div>
        @endif

        <div class="flex justify-end">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button
                    class="px-6 py-2 rounded-xl border border-border text-sm transition bg-red-400 text-white cursor-pointer hover:bg-red-500">
                    Logout
                </button>
            </form>
        </div>
    </div>
@endsection

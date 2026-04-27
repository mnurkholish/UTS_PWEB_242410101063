<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getMovies()
    {
        return
        [
            [
                'title' => 'Interstellar',
                'genre' => 'Sci-Fi',
                'status' => 'watchlist',
                'rating' => null,
                'image' => 'images/movies/interstellar.jpg'
            ],
            [
                'title' => 'Gintama - The Final',
                'genre' => 'Sci-Fi Comedy',
                'status' => 'watched',
                'rating' => 5,
                'image' => 'images/movies/gintama-the-final.jpg'
            ],
            [
                'title' => 'Merah Putih One For all',
                'genre' => 'Adventure',
                'status' => 'watched',
                'rating' => 1,
                'image' => 'images/movies/merah-putih-ofa.webp'
            ],
            [
                'title' => 'Mufasa',
                'genre' => 'Action, Adventure',
                'status' => 'watched',
                'rating' => 4,
                'image' => 'images/movies/mufasa.jpg'
            ],
            [
                'title' => 'Jurassic World - Dominion',
                'genre' => 'Adventure, Sci-Fi',
                'status' => 'watchlist',
                'rating' => null,
                'image' => 'images/movies/jurassic-world.jpg'
            ],
            [
                'title' => 'Demon Slayer: Mugen Train',
                'genre' => 'Anime, Action',
                'status' => 'watched',
                'rating' => 4,
                'image' => 'images/movies/mugen-train.jpg'
            ],
            [
                'title' => 'Insidious',
                'genre' => 'Horror',
                'status' => 'watched',
                'rating' => 3,
                'image' => 'images/movies/insidious.webp'
            ],
            [
                'title' => 'Your Name',
                'genre' => 'Anime, Romance, Supernatural',
                'status' => 'watched',
                'rating' => 5,
                'image' => 'images/movies/your-name.jpg'
            ],
            [
                'title' => 'The Nun II',
                'genre' => 'Horror',
                'status' => 'watchlist',
                'rating' => null,
                'image' => 'images/movies/the-nun-2.jpg'
            ],
            [
                'title' => 'Final Destination - Bloodline',
                'genre' => 'Thriller',
                'status' => 'watched',
                'rating' => 5,
                'image' => 'images/movies/final-destination.jpg'
            ],
        ];
    }

    public function login()
    {
        return view('login');
    }

    public function store(Request $request)
    {

        $request->validate([
                'username' => 'required|min:3|max:20',
                'password' => 'required|min:8'
            ], [
                'username.required' => 'Username wajib diisi',
                'username.min' => 'Username minimal 3 karakter',
                'username.max' => 'Username maksimal 20 karakter',
                'password.required' => 'Password wajib diisi',
                'password.min' => 'Password minimal 8 karakter'
            ]);

        $request->session()->put('username', $request->username);

        return redirect()->route('dashboard');
    }

    public function dashboard()
    {
        $username = session('username');

        $movies = $this->getMovies();

        $watched = collect($movies)->where('status', 'watched');
        $watchlist = collect($movies)->where('status', 'watchlist');
        $avgRating = round($watched->avg('rating'), 1);

        return view('dashboard', compact(
            'username',
            'movies',
            'watched',
            'watchlist',
            'avgRating'
        ));
    }

    public function pengelolaan()
    {
        $movies = $this->getMovies();

        return view('pengelolaan', compact('movies'));
    }

    public function profile()
    {
        $username = session('username');

        $movies = $this->getMovies();

        $watched = collect($movies)->where('status', 'watched');

        $topMovie = $watched->sortByDesc('rating')->first();

        $favoriteGenre = collect($watched)
            ->groupBy('genre')
            ->sortByDesc(fn ($g) => count($g))
            ->keys()
            ->first();

        return view('profile', compact(
            'username',
            'watched',
            'topMovie',
            'favoriteGenre'
        ));
    }

    public function logout(Request $request)
    {
        $request->session()->forget('username');

        return redirect()->route('login');
    }
}

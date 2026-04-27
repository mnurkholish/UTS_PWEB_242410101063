<nav class="fixed top-0 left-0 w-full z-50 backdrop-blur-md border-b bg-background/80 border-border">

    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between relative">

        {{-- LEFT --}}
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2 text-foreground">
            <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="w-6 h-6">
            <h1 class="text-lg font-semibold tracking-wide">
                MyMovieGweh
            </h1>
        </a>

        {{-- CENTER --}}
        <div class="hidden md:flex gap-10 text-sm text-muted-foreground absolute left-1/2 -translate-x-1/2">

            <a href="{{ route('dashboard') }}" class="hover:text-primary transition-colors">
                Dashboard
            </a>

            <a href="{{ route('pengelolaan', ['username' => session('username')]) }}"
                class="hover:text-primary transition-colors">
                Pengelolaan
            </a>

            <a href="{{ route('profile', ['username' => session('username')]) }}"
                class="hover:text-primary transition-colors">
                Profile
            </a>

        </div>

        {{-- RIGHT --}}
        <div class="flex items-center gap-3 text-foreground">

            <div class="relative hidden md:block">
                <button onclick="toggleUserMenu()" class="flex items-center gap-2 focus:outline-none cursor-pointer">

                    <span class="text-sm font-medium">
                        {{ session('username') }}
                    </span>

                    <img src="{{ asset('images/avatar.jpg') }}" class="w-8 h-8 rounded-full">

                </button>

                {{-- DROPDOWN --}}
                <div id="userMenu"
                    class="hidden absolute right-0 mt-3 w-40 bg-background border border-border rounded-lg shadow-lg overflow-hidden">

                    <a href="{{ route('profile', ['username' => session('username')]) }}"
                        class="block px-4 py-2 text-sm hover:bg-black/5 transition">
                        Profile
                    </a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-full text-left text-red-400 px-4 py-2 text-sm hover:bg-black/5 transition cursor-pointer">
                            Logout
                        </button>
                    </form>

                </div>
            </div>

            {{-- HAMBAGUR --}}
            <button onclick="toggleMenu()" class="md:hidden text-lg p-1">
                ☰
            </button>

        </div>

    </div>

    {{-- MOBILE --}}
    <div id="mobileMenu" class="hidden px-6 pb-4 md:hidden text-sm bg-background border-t border-border">

        <a href="{{ route('profile') }}" class="flex items-center gap-3 py-3 border-b border-border mb-2">
            <img src="{{ asset('images/avatar.jpg') }}" alt="Avatar" class="w-7 h-7 rounded-full">
            <span class="font-medium text-foreground">
                {{ session('username') }}
            </span>
        </a>

        <div class="text-center text-muted-foreground">
            <a href="{{ route('dashboard') }}" class="block py-2 hover:text-primary transition-colors">
                Dashboard
            </a>

            <a href="{{ route('pengelolaan') }}" class="block py-2 hover:text-primary transition-colors">
                Pengelolaan
            </a>

            <a href="{{ route('profile') }}" class="block py-2 hover:text-primary transition-colors">
                Profile
            </a>
        </div>

        <div>
            <form action="{{ route('logout') }}" method="POST" class="mt-2">
                @csrf
                <button type="submit"
                    class="w-full flex items-center justify-center gap-2 py-2 text-sm text-muted-foreground hover:text-primary transition">

                    <img src="{{ asset('images/logout.svg') }}" class="w-4 h-4">
                    Logout
                </button>
            </form>
        </div>

    </div>

</nav>

<script>
    function toggleMenu() {
        document.getElementById('mobileMenu').classList.toggle('hidden');
    }

    function toggleUserMenu() {
        document.getElementById('userMenu').classList.toggle('hidden');
    }

    document.addEventListener('click', function(event) {
        const button = event.target.closest('[onclick="toggleUserMenu()"]');
        const menu = document.getElementById('userMenu');

        if (!button && !menu.contains(event.target)) {
            menu.classList.add('hidden');
        }
    });
</script>

<!-- Navbar Component -->
<header class="fixed top-0 w-full z-50 bg-black/50 backdrop-blur-md border-b border-gold">
    <div class="w-full mx-auto px-6 py-2 flex justify-between items-center">
        <!-- Logo -->
        <a href="#" class="text-[32px] sm:text-[42px] md:text-[56px] font-bold text-gold font-playfair no-underline tracking-wide">
            DAMIKI
        </a>

        <!-- Hamburger for small screens -->
        <button
            class="text-gold text-3xl md:hidden"
            onclick="document.getElementById('mobileMenu').classList.toggle('hidden')">
            ☰
        </button>

        <!-- Desktop Nav -->
        <nav class="hidden md:flex gap-8 text-gold font-playfair text-[20px] md:text-[28px] font-semibold tracking-wide">
            <a href="#gallery" class="text-cream no-underline hover:text-gold">Galerie</a>
            <a href="#reviews" class="text-cream no-underline hover:text-gold">Recenzii</a>
            <a href="#contact" class="text-cream no-underline hover:text-gold">Contact</a>
            @auth
            @if(Auth::user()->is_admin)
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                    Logout
                </button>
            </form>
            @endif
            @endauth
        </nav>
    </div>

    <!-- Mobile Dropdown -->
    <div id="mobileMenu" class="md:hidden hidden bg-black/90 backdrop-blur-md border-t border-gold px-6 py-4 space-y-4">
        <a href="#gallery" class="block text-gold font-playfair text-[22px] no-underline hover:text-yellow-400">Galerie</a>
        <a href="#reviews" class="block text-gold font-playfair text-[22px] no-underline hover:text-yellow-400">Recenzii</a>
        <a href="#contact" class="block text-gold font-playfair text-[22px] no-underline hover:text-yellow-400">Contact</a>
        @auth
        @if(Auth::user()->is_admin)
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                Logout
            </button>
        </form>
        @endif
        @endauth
    </div>
</header>
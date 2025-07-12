{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Damiki - Custom Furniture</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Lora:ital,wght@0,400..700;1,400..700&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <!-- Tailwind + Bootstrap -->
    @vite(['resources/css/app.css', 'resources/js/main.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-white text-black user-select-none">
    @php
    $isAdmin = Auth::check() && Auth::user()->is_admin;
    @endphp

    {{-- Navbar --}}
    @include('partials.navbar')

    {{-- Pagina principală --}}
    @yield('content')

    {{-- Footer --}}
    @include('partials.footer')

    {{-- Back to Top Button --}}
    <button id="backToTopBtn" class="fixed bottom-6 left-6 z-50 bg-gold/90 hover:bg-gold text-black w-12 h-12 rounded-full shadow-lg flex items-center justify-center transform transition-all duration-300 opacity-0 translate-y-10">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
        </svg>
    </button>

    {{-- Bootstrap Bundle --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Back to Top Button
        document.addEventListener('DOMContentLoaded', function() {
            const backToTopBtn = document.getElementById('backToTopBtn');
            
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) {
                    backToTopBtn.classList.remove('opacity-0', 'translate-y-10');
                    backToTopBtn.classList.add('opacity-100', 'translate-y-0');
                } else {
                    backToTopBtn.classList.add('opacity-0', 'translate-y-10');
                    backToTopBtn.classList.remove('opacity-100', 'translate-y-0');
                }
            });
            
            backToTopBtn.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>

</html>
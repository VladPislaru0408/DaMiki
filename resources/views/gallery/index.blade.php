<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Damiki - Custom Furniture</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Lora:ital,wght@0,400..700;1,400..700&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @php
    $isAdmin = Auth::check() && Auth::user()->is_admin;
    @endphp


    <!-- NAVBAR -->
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


    <!-- Replace existing HERO SECTION -->
    <section
        id="hero"
        class="relative min-h-screen md:h-[100vh] bg-cover bg-no-repeat bg-center flex items-center justify-center text-center px-6"
        style="background-image: url('/images/backgrounds/1.jpeg');">
        <div class="pt-[120px] sm:pt-[140px] md:pt-[160px] max-w-5xl mx-auto px-4 py-10 md:py-20">
            <h1 class="text-[28px] sm:text-[36px] md:text-[48px] lg:text-[64px] font-playfair leading-tight font-bold text-gold fade-in-up">
                Alege mobilier <span class="highlight-animated">creat pentru tine</span><br />
                nu pentru toți
            </h1>

            <p class="text-subtitle text-[16px] sm:text-[18px] md:text-[22px] lg:text-[26px] font-playfair mt-4 sm:mt-6 mb-8 text-white fade-in-up fade-in-up-delay-1">
                Transformă orice spațiu într-un loc cu personalitate. Oferim soluții personalizate, adaptate stilului tău și felului în care vrei să te simți acasă.
            </p>

            <div class="flex flex-col md:flex-row justify-center items-center gap-4 mt-6 sm:mt-8 lg:mt-10 fade-in-up fade-in-up-delay-2">
                <a
                    href="#gallery"
                    class="min-w-[220px] max-w-[260px] w-full text-center transform rounded-lg font-medium text-[20px] px-6 py-3 transition-all duration-300 hover:-translate-y-0.5 bg-buttonBorder text-black border-2 border-buttonBorder shadow-md hover:bg-gold hover:!text-white no-underline">
                    Vezi galeria
                </a>
                <a
                    href="#contact"
                    class="min-w-[220px] max-w-[260px] w-full text-center transform rounded-lg font-medium text-[20px] px-6 py-3 transition-all duration-300 hover:-translate-y-0.5 text-white border-2 border-white hover:bg-white hover:!text-black no-underline">
                    Contactează-ne
                </a>
            </div>

        </div>
    </section>



    <!-- GALLERY SECTION -->
    <section id="gallery" class="min-h-screen pt-40 pb-5 bg-cover bg-no-repeat bg-center" style="background-image: url('/images/backgrounds/2.jpeg');">
        <div class="text-center mb-16 px-4">
            <h2 class="text-galerieColor text-[64px] font-playfair font-normal leading-tight">Galerie</h2>
            <div class="w-[135px] h-[1px] bg-galerieLineColor mx-auto mt-3"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-x-20 gap-y-12 sm:gap-y-20 max-w-[1920px] mx-auto px-4 mt-20">
            @foreach($furnitures as $furniture)
            <div class="w-full flex justify-center">
                <div class="relative flex w-full max-w-[400px] flex-col rounded-xl sm:rounded-2xl bg-gradient-to-br from-[#d4af37] to-[#fcd34d] text-black shadow-md transition-transform md:hover:scale-105 duration-300 font-playfair">

                    <!-- Imagine cu efect decupat -->
                    <div class="relative mx-4 -mt-6 h-48 overflow-hidden rounded-xl shadow-md">
                        @if ($furniture->thumbnail)
                        <img src="{{ asset($furniture->thumbnail->image_path) }}" alt="{{ $furniture->title }}" class="h-full w-full object-cover" />
                        @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-500">No Image</div>
                        @endif
                    </div>

                    <!-- Titlu + preț -->
                    <div class="p-6">
                        <h5 class="relative mb-2 text-[22px] font-semibold leading-snug">
                            {{ $furniture->title }}
                        </h5>
                        <p class="text-[18px] text-gray-700 mb-4 font-lora">
                            {{ number_format($furniture->price, 2) }} RON
                        </p>
                    </div>

                    <!-- Buton -->
                    <div class="p-6 pt-0 space-y-3">
                        <button onclick="showModal('{{ $furniture->id }}')"
                            class="w-full inline-flex items-center justify-center gap-2 px-5 py-2 text-[16px] font-medium rounded-lg text-black bg-buttonBg hover:bg-cream transition-all">
                            Vezi detalii
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>

                        @if($isAdmin)
                        <div class="flex justify-between items-center gap-3">
                            <button class="flex-1 bg-buttonBg hover:bg-cream text-black font-semibold py-2 rounded-lg text-sm transition"
                                onclick="openEditModal('{{ $furniture->id }}')">
                                ✏️ Editare
                            </button>

                            <form action="{{ route('furniture.destroy', $furniture->id) }}" method="POST"
                                onsubmit="return confirm('Ești sigur că vrei să ștergi acest mobilier?');" class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2 rounded-lg text-sm transition">
                                    🗑️ Ștergere
                                </button>
                            </form>
                        </div>
                        @endif
                    </div>


                    <!-- Hidden data -->
                    <div id="furniture-{{ $furniture->id }}" class="hidden"
                        data-title="{{ $furniture->title }}"
                        data-description="{{ $furniture->description }}"
                        data-price="{{ $furniture->price }}"
                        data-photos='@json($furniture->photos)'></div>
                </div>

            </div>
            @endforeach
        </div>
        @if($isAdmin)
        <button class="fixed bottom-6 right-6 z-50 bg-gold text-black px-6 py-3 rounded-full text-lg font-semibold shadow-lg hover:bg-yellow-400 transition"
            onclick="document.getElementById('addFurnitureModal').classList.remove('hidden')">
            + Adaugă mobilier
        </button>
        @endif

    </section>



    <!-- MODAL -->
    <div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content relative rounded-2xl shadow-lg border border-gray-300 bg-white relative">

                <!-- Close Button -->
                <button
                    type="button"
                    class="btn-close absolute top-4 right-4 z-10 text-black text-2xl font-bold hover:text-red-600 transition"
                    data-bs-dismiss="modal"
                    aria-label="Close">
                </button>

                <div class="modal-body p-6">
                    <!-- Titlu -->
                    <h5 id="modalTitle" class="text-[28px] font-playfair font-semibold text-center text-gold mb-4"></h5>

                    <!-- Imagine principală -->
                    <div class="relative flex justify-center items-center mb-6">
                        <button id="prevBtn"
                            class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-gold flex items-center justify-center shadow-md hover:bg-yellow-400 transition z-10"
                            aria-label="Previous image">
                            <img src="/images/icons/left.png" alt="Previous" class="w-4 h-4">
                        </button>

                        <img id="mainModalImage"
                            src=""
                            alt=""
                            class="max-h-[400px] w-auto rounded-lg shadow-md object-contain transition-opacity duration-300 opacity-100" />

                        <button id="nextBtn"
                            class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-gold flex items-center justify-center shadow-md hover:bg-yellow-400 transition z-10"
                            aria-label="Next image">
                            <img src="/images/icons/right.png" alt="Next" class="w-4 h-4">
                        </button>
                    </div>

                    <!-- Thumbnails -->
                    <div id="modalImages" class="flex flex-wrap justify-center gap-4">
                        <!-- JS will populate thumbnails -->
                    </div>

                    <!-- Descriere + Preț -->
                    <div class="mt-6 text-center">
                        <p id="modalDesc" class="text-charcoal text-[18px] font-inter mb-2"></p>
                        <p id="modalPrice" class="text-[22px] font-semibold text-black bg-gold/10 inline-block px-4 py-2 rounded-lg"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- REVIEW SECTION -->
    <section id="reviews" class="pt-40 pb-5 bg-cover bg-center" style="background-image: url('/images/backgrounds/2.jpeg');">
        <h2 class="text-[64px] font-playfair font-semibold text-galerieColor text-center">Recenzii</h2>
        <div class="w-[120px] h-[1px] bg-galerieLineColor mx-auto mt-2 mb-10"></div>

        <!-- Swiper Container -->
        <div class="relative swiper reviewSwiper overflow-hidden w-full px-6">
            <!-- Swiper Slides -->
            <div class="swiper-wrapper">
                @foreach ($reviews as $review)
                <div class="swiper-slide w-[300px] shrink-0 bg-white rounded-2xl p-6 shadow-lg transition-all duration-300 ease-in-out hover:shadow-2xl hover:-translate-y-1 hover:scale-[1.02] border border-gold/30 animate-fade-in">
                    <div class="flex items-center text-yellow-400 mb-3">
                        @for ($i = 0; $i < $review->rating; $i++)
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 24 24">
                                <path d="M12 .587l3.668 7.568L24 9.75l-6 5.932 1.42 8.318L12 19.896l-7.42 4.104L6 15.682 0 9.75l8.332-1.595z" />
                            </svg>
                            @endfor
                            <span class="ml-2 text-sm text-gray-700">{{ $review->rating }} din 5</span>
                    </div>
                    <p class="text-gray-700 text-[15px] italic leading-relaxed font-inter">“{{ $review->content }}”</p>
                    <p class="mt-4 font-semibold text-black font-playfair text-[16px]">{{ $review->name }}</p>
                </div>
                @endforeach
            </div>
            <!-- Button Prev -->
            <!-- <div class="swiper-button-prev-custom absolute left-2 top-1/2 -translate-y-1/2 z-10 cursor-pointer hidden md:flex items-center justify-center w-10 h-10 rounded-full bg-gold hover:bg-yellow-400 shadow-md transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-black" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M15 18l-6-6 6-6" />
                </svg>
            </div> -->
            <!-- Button Next -->
            <!-- <div class="swiper-button-next-custom absolute right-2 top-1/2 -translate-y-1/2 z-10 cursor-pointer hidden md:flex items-center justify-center w-10 h-10 rounded-full bg-gold hover:bg-yellow-400 shadow-md transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-black" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M9 6l6 6-6 6" />
                </svg>
            </div> -->
        </div>

        <p class="mt-16 italic text-cream text-[36px] font-playfair max-w-5xl mx-auto leading-relaxed text-center">
            Părerile clienților ne motivează să ne îmbunătățim zilnic.
        </p>
    </section>

    <!-- CONTACT SECTION -->
    <section id="contact" class="py:12 md:py-16 bg-cover bg-center text-galerieColor" style="background-image: url('/images/backgrounds/2.jpeg');">
        <div class="max-w-6xl mx-auto px-4 py-5 text-center">
            <!-- Titlu -->
            <h2 class="text-[48px] md:text-[64px] font-playfair font-semibold mb-2">Contact</h2>
            <div class="w-[120px] h-[1px] bg-galerieLineColor mx-auto mb-10"></div>

            <!-- ✅ Contact Info with Fallback Copy + Toast -->
            <div class="flex flex-col md:flex-row justify-center items-center gap-10 text-xl font-lora mb-12">
                <!-- Telefon -->
                <div class="flex items-center gap-3 text-gold cursor-pointer group relative" onclick="handleClick('tel', '+40123456789')">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                    </svg>
                    <span class="text-white hover:underline group-hover:underline">0123 456 789</span>
                    <div class="absolute bottom-[-28px] left-1/2 -translate-x-1/2 bg-white text-black text-xs rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition pointer-events-none">
                        Se va deschide aplicația de apel
                    </div>
                </div>

                <!-- Email -->
                <div class="flex items-center gap-3 text-gold cursor-pointer group relative" onclick="handleClick('mailto', 'contact@damiki.ro')">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20 4H4a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2zm0 2v.511l-8 5.333-8-5.333V6h16zm0 12H4V8.49l8 5.333 8-5.333V18z" />
                    </svg>
                    <span class="text-white hover:underline group-hover:underline">contact@damiki.ro</span>
                    <div class="absolute bottom-[-28px] left-1/2 -translate-x-1/2 bg-white text-black text-xs rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition pointer-events-none">
                        Se va deschide aplicația de email
                    </div>
                </div>

                <!-- Adresă -->
                <div class="flex items-center gap-3 text-gold cursor-pointer group relative" onclick="handleClick('map', 'https://www.google.com/maps/place/Z%C4%83podeni,+Romania')">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 110-5 2.5 2.5 0 010 5z" />
                    </svg>
                    <span class="text-white hover:underline group-hover:underline">Zăpodeni, Vaslui, Romania</span>
                    <div class="absolute bottom-[-28px] left-1/2 -translate-x-1/2 bg-white text-black text-xs rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition pointer-events-none">
                        Se va deschide Google Maps
                    </div>
                </div>
            </div>
            <!-- ✅ Toast Notification -->
            <div id="toast" class="pointer-events-none fixed bottom-6 left-1/2 transform -translate-x-1/2 bg-gold text-black px-4 py-2 rounded shadow-md text-sm font-medium opacity-0 transition-opacity duration-300 z-50 flex items-center gap-2 pointer-events-none">
                <span id="toast-icon">📋</span>
                <span id="toast-message">Text copied to clipboard!</span>
            </div>


            <!-- Harta -->
            <div class="relative w-full max-w-5xl mx-auto">
                <!-- Marker animat -->
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-[60%] z-20 pointer-events-none">
                    <div class="loader-shape-3"></div>
                </div>

                <!-- Google Maps -->
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21872.901830539955!2d27.63668758266385!3d46.74295941081484!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40ca6fc37e33305f%3A0xd83ff6821043f9f0!2s737625%20Z%C4%83podeni!5e0!3m2!1sro!2sro!4v1747935797170!5m2!1sro!2sro"
                    width="100%"
                    height="450"
                    style="border:0; border-radius: 12px;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    class="w-full h-[450px] rounded-xl">
                </iframe>
            </div>
        </div>
    </section>

    <!-- FOOTER SECTION -->
    <footer class="static bottom-0 left-0 w-full bg-black text-white px-6 py-6 border-t border-gold font-lora">
        <div class="w-full mx-auto flex flex-col md:flex-row items-center justify-between gap-2 md:gap-0 px-4">
            <!-- Logo left aligned -->
            <div class="text-gold font-playfair text-lg font-bold tracking-wide w-full md:w-auto text-center sm:text-left">DAMIKI</div>

            <!-- Legal center, larger text -->
            <p class="text-xs sm:text-lg text-gray-400 text-center w-full md:w-auto">© 2025 Damiki. Toate drepturile rezervate.</p>

            <!-- Social media right aligned -->
            <div class="w-full md:w-auto text-right md:text-end">
                <h4 class="text-base font-semibold mb-2 md:mb-1 text-gold text-center sm:text-left">Urmărește-ne</h4>
                <div class="flex justify-center gap-4">
                    <a href="#" aria-label="Instagram" class="text-gold hover:text-yellow-400">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M7.75 2h8.5A5.75 5.75 0 0122 7.75v8.5A5.75 5.75 0 0116.25 22h-8.5A5.75 5.75 0 012 16.25v-8.5A5.75 5.75 0 017.75 2Zm0 1.5A4.25 4.25 0 003.5 7.75v8.5A4.25 4.25 0 007.75 20.5h8.5a4.25 4.25 0 004.25-4.25v-8.5A4.25 4.25 0 0016.25 3.5h-8.5Zm8.75 1a.75.75 0 010 1.5.75.75 0 010-1.5ZM12 7.25a4.75 4.75 0 110 9.5 4.75 4.75 0 010-9.5Zm0 1.5a3.25 3.25 0 100 6.5 3.25 3.25 0 000-6.5Z" />
                        </svg>
                    </a>
                    <a href="#" aria-label="Facebook" class="text-gold hover:text-yellow-400">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.25 8.75V7.5a.75.75 0 01.75-.75h2V4.5h-2a3.25 3.25 0 00-3.25 3.25v1.75H9v2.5h1.75V20.5h2.5V11.25H16l.25-2.5h-2.75Z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>



    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Sortable JS -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>


    <script>
        // Modal Logic
        function showModal(id) {
            const container = document.getElementById(`furniture-${id}`);
            const title = container.dataset.title;
            const desc = container.dataset.description;
            const price = container.dataset.price;
            const photos = JSON.parse(container.dataset.photos);

            const modalTitle = document.getElementById('modalTitle');
            const modalDesc = document.getElementById('modalDesc');
            const modalPrice = document.getElementById('modalPrice');
            const modalImages = document.getElementById('modalImages');
            const mainImage = document.getElementById('mainModalImage');

            modalTitle.textContent = title;
            modalDesc.textContent = desc;
            modalPrice.textContent = `${parseFloat(price).toFixed(2)} RON`;

            let currentIndex = 0;

            function setImage(index) {
                mainImage.classList.add('opacity-0');
                setTimeout(() => {
                    mainImage.src = '/' + photos[index].image_path;
                    mainImage.classList.remove('opacity-0');
                    mainImage.classList.add('opacity-100');
                }, 150);
            }

            // thumbnails
            modalImages.innerHTML = '';
            photos.forEach((photo, index) => {
                const img = document.createElement('img');
                img.src = '/' + photo.image_path;
                img.className = 'h-[100px] w-auto cursor-pointer rounded-md border-2 border-transparent hover:border-gold transition';
                img.onclick = () => {
                    currentIndex = index;
                    setImage(currentIndex);
                };
                modalImages.appendChild(img);
            });

            // set first image
            if (photos.length > 0) {
                setImage(currentIndex);
            }

            // nav buttons
            document.getElementById('prevBtn').onclick = () => {
                currentIndex = (currentIndex - 1 + photos.length) % photos.length;
                setImage(currentIndex);
            };

            document.getElementById('nextBtn').onclick = () => {
                currentIndex = (currentIndex + 1) % photos.length;
                setImage(currentIndex);
            };

            // swipe support on mobile
            let touchStartX = 0;
            let touchEndX = 0;

            mainImage.addEventListener('touchstart', (e) => {
                touchStartX = e.changedTouches[0].screenX;
            });

            mainImage.addEventListener('touchend', (e) => {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipeGesture();
            });

            function handleSwipeGesture() {
                const swipeDistance = touchEndX - touchStartX;
                const threshold = 50; // minimum swipe distance
                if (swipeDistance > threshold) {
                    currentIndex = (currentIndex - 1 + photos.length) % photos.length;
                    setImage(currentIndex);
                } else if (swipeDistance < -threshold) {
                    currentIndex = (currentIndex + 1) % photos.length;
                    setImage(currentIndex);
                }
            }

            // open modal
            const modal = new bootstrap.Modal(document.getElementById('galleryModal'));
            modal.show();
        }

        function handleClick(type, value) {
            const isMobile = /Mobi|Android|iPhone|iPad|iPod/i.test(navigator.userAgent);
            const label = type === 'map' ? 'Address' : type === 'tel' ? 'Phone' : 'Email';

            if (type === 'mailto' || type === 'tel') {
                window.location.href = `${type}:${value}`;
                setTimeout(() => {
                    if (document.hasFocus()) {
                        navigator.clipboard.writeText(value).then(() => {
                            showToast(`✅ ${label} copied!`);
                        });
                    }
                }, 1000);
                return;
            }

            let win = null;
            try {
                win = window.open(value, '_blank');
            } catch (e) {
                console.warn('Window blocked or failed:', e);
            }


            setTimeout(() => {
                const stillFocused = document.visibilityState === 'visible' && document.hasFocus();
                if (!stillFocused) return;

                try {
                    // Dacă `win` e blocat sau inaccesibil, se intră în fallback
                    if (!win || win.closed || typeof win.closed === 'undefined') {
                        navigator.clipboard.writeText(value).then(() => {
                            showToast(`✅ ${label} copied!`);
                        }).catch(() => {
                            showToast(`❌ Could not copy ${label}.`);
                        });
                    }
                } catch (e) {
                    console.warn('Clipboard fallback skipped due to window access restriction:', e);
                }
            }, 500);

        }

        function showToast(message, icon = '📋') {
            const toast = document.getElementById('toast');

            const toastIcon = toast.querySelector('#toast-icon');
            const toastMessage = toast.querySelector('#toast-message');

            if (toastIcon && toastMessage) {
                toastIcon.textContent = icon;
                toastMessage.textContent = message;
            } else {
                toast.textContent = `${icon} ${message}`;
            }

            toast.classList.remove('opacity-0');
            toast.classList.add('opacity-100');

            setTimeout(() => {
                toast.classList.remove('opacity-100');
                toast.classList.add('opacity-0');
            }, 2500);
        }

        document.addEventListener("DOMContentLoaded", function() {
            const modal = document.getElementById("addFurnitureModal");

            // ESC KEY
            document.addEventListener("keydown", function(e) {
                if (e.key === "Escape" && !modal.classList.contains("hidden")) {
                    modal.classList.add("hidden");
                }
            });

            // CLICK OUTSIDE modal content
            modal.addEventListener("click", function(e) {
                if (e.target === modal) {
                    modal.classList.add("hidden");
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            const modal = document.getElementById("editFurnitureModal");

            // ESC KEY
            document.addEventListener("keydown", function(e) {
                if (e.key === "Escape" && !modal.classList.contains("hidden")) {
                    modal.classList.add("hidden");
                }
            });

            // CLICK OUTSIDE modal content
            modal.addEventListener("click", function(e) {
                if (e.target === modal) {
                    modal.classList.add("hidden");
                }
            });
        });

        document.addEventListener("DOMContentLoaded", () => {
            const editForm = document.getElementById("editForm");

            editForm.addEventListener("submit", function(e) {
                const existingPhotos = Array.from(document.querySelectorAll("#existingPhotosList li"))
                    .map(li => li.dataset.id);
                const newPhotosInput = document.getElementById("newPhotos");
                const newPhotoCount = newPhotosInput.files.length;
                const thumbnailId = document.getElementById("thumbnailId").value;

                const totalPhotos = existingPhotos.length + newPhotos.length;

                if (totalPhotos === 0) {
                    alert("Trebuie să adaugi cel puțin o poză.");
                    e.preventDefault();
                    return;
                }

                if (!thumbnailId) {
                    alert("Trebuie să selectezi o imagine ca thumbnail.");
                    e.preventDefault();
                    return;
                }

                // Dacă totul e ok, formularul se trimite
            });
        });

        if (document.getElementById('editForm')) {
            document.getElementById('editForm').addEventListener('submit', function(e) {
                const thumb = document.getElementById('thumbnailId').value;
                if (!thumb) {
                    e.preventDefault();
                    alert('Te rugăm să selectezi o imagine principală (thumbnail).');
                }
            });
        }


        // === GALLERY EDIT LOGIC ===

        let currentThumbId = null;
        let deletedIds = [];
        let newPhotos = []; // array de File
        let newPhotoThumbId = null;
        const photoDataCache = {}; // cache pentru datele pozelor

        function generateUniqueId() {
            return 'id-' + Date.now() + '-' + Math.floor(Math.random() * 100000);
        }

        function highlightThumbnail() {
            document.querySelectorAll('#existingPhotosList li').forEach(li => {
                li.classList.remove('ring-2', 'ring-yellow-500');

                if (li.dataset.id && parseInt(li.dataset.id) === currentThumbId) {
                    li.classList.add('ring-2', 'ring-yellow-500');
                }
                if (li.dataset.new && li.dataset.new === newPhotoThumbId) {
                    li.classList.add('ring-2', 'ring-yellow-500');
                }
            });
        }

        function updateHiddenInputs() {
            const order = [];
            document.querySelectorAll('#existingPhotosList li').forEach(li => {
                if (li.dataset.id) order.push(li.dataset.id);
                if (li.dataset.new) order.push('new-' + li.dataset.new);
            });

            document.getElementById('photoOrder').value = order.join(',');
            document.getElementById('deletedPhotos').value = deletedIds.join(',');
            if (currentThumbId !== null) {
                document.getElementById('thumbnailId').value = currentThumbId;
            } else if (newPhotoThumbId !== null) {
                document.getElementById('thumbnailId').value = 'new-' + newPhotoThumbId;
            } else {
                document.getElementById('thumbnailId').value = '';
            }
        }

        function renderGallery(id) {
            const container = document.getElementById('existingPhotosList');
            container.innerHTML = '';

            // === 1. Imagini existente din DB ===
            const photoList = photoDataCache[id] || [];
            photoList.forEach(photo => {
                if (deletedIds.includes(photo.id)) return;

                const li = document.createElement('li');
                li.className = 'relative w-[100px] h-[100px] border rounded overflow-hidden shadow-sm';
                li.dataset.id = photo.id;

                const img = document.createElement('img');
                img.src = '/' + photo.image_path;
                img.className = 'w-full h-full object-cover';

                const delBtn = document.createElement('button');
                delBtn.innerText = '🗑️';
                delBtn.className = 'absolute top-1 right-1 bg-white rounded px-1 py-0 text-xs';
                delBtn.onclick = () => {
                    deletedIds.push(photo.id);
                    if (currentThumbId == photo.id) currentThumbId = null;
                    renderGallery(id);
                };

                const thumbBtn = document.createElement('button');
                thumbBtn.innerText = '⭐';
                thumbBtn.className = 'absolute bottom-1 left-1 bg-white rounded px-1 py-0 text-xs';
                thumbBtn.onclick = () => {
                    currentThumbId = photo.id;
                    newPhotoThumbId = null;
                    highlightThumbnail();
                    updateHiddenInputs();
                };

                li.appendChild(img);
                li.appendChild(delBtn);
                li.appendChild(thumbBtn);
                container.appendChild(li);

                if (photo.is_thumbnail && currentThumbId === null) {
                    currentThumbId = photo.id;
                }
            });

            // === 2. Imagini noi (neîncărcate încă) ===
            newPhotos.forEach((photoObj, index) => {
                const {
                    id: newId,
                    file
                } = photoObj;

                const li = document.createElement('li');
                li.className = 'relative w-[100px] h-[100px] border rounded overflow-hidden shadow-sm';
                li.dataset.new = newId;

                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'w-full h-full object-cover';
                    li.appendChild(img);
                };
                reader.readAsDataURL(file);

                const delBtn = document.createElement('button');
                delBtn.innerText = '🗑️';
                delBtn.className = 'absolute top-1 right-1 bg-white rounded px-1 py-0 text-xs';
                delBtn.onclick = () => {
                    const idx = newPhotos.findIndex(p => p.id === newId);
                    if (idx !== -1) newPhotos.splice(idx, 1);
                    renderGallery(id);
                };

                const thumbBtn = document.createElement('button');
                thumbBtn.innerText = '⭐';
                thumbBtn.className = 'absolute bottom-1 left-1 bg-white rounded px-1 py-0 text-xs';
                thumbBtn.onclick = () => {
                    newPhotoThumbId = newId;
                    currentThumbId = null;
                    highlightThumbnail();
                    updateHiddenInputs();
                };

                li.appendChild(delBtn);
                li.appendChild(thumbBtn);
                container.appendChild(li);
            });

            highlightThumbnail();
            updateHiddenInputs();
        }


        function openEditModal(id) {
            const card = document.getElementById(`furniture-${id}`);
            const photos = JSON.parse(card.dataset.photos);

            // 🧠 Resetăm starea
            deletedIds = [];
            currentThumbId = null;
            newPhotos = [];
            newPhotoThumbId = null;

            photoDataCache[id] = photos;

            // ✍️ Precompletăm formularul
            document.getElementById('editId').value = id;
            document.getElementById('editTitle').value = card.dataset.title;
            document.getElementById('editPrice').value = card.dataset.price;
            document.getElementById('editDescription').value = card.dataset.description;
            document.getElementById('editForm').action = `/furniture/${id}`;
            const newPhotosInput = document.getElementById('newPhotos');
            newPhotosInput.value = ''; // reset input file
            newPhotosInput.onchange = (e) => {
                newPhotos = Array.from(e.target.files).map(file => ({
                    id: generateUniqueId(),
                    file: file
                }));
                renderGallery(id);
            };


            // 📸 Afișăm toate pozele în galerie unificată
            renderGallery(id);

            // Reinițializează Sortable pe listă
            Sortable.create(document.getElementById('existingPhotosList'), {
                animation: 150,
                onSort: updateHiddenInputs
            });


            // ✅ Afișăm modalul
            document.getElementById('editFurnitureModal').classList.remove('hidden');
        }


        function closeEditModal() {
            document.getElementById('editFurnitureModal').classList.add('hidden');

            // curăță starea globală
            deletedIds = [];
            currentThumbId = null;
            newPhotos = [];
            newPhotoThumbId = null;

            // opțional: golește galeria și inputurile
            document.getElementById('existingPhotosList').innerHTML = '';
            document.getElementById('editForm').reset();
        }
    </script>

    <!-- Swiper + Vite App JS -->
    @vite('resources/js/app.js')
    @if($isAdmin)
    <div id="addFurnitureModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg p-6 w-full max-w-xl relative">
            <button onclick="document.getElementById('addFurnitureModal').classList.add('hidden')" class="absolute top-4 right-4 text-gray-600 hover:text-red-500 text-xl">×</button>

            <h2 class="text-xl font-bold mb-4">Adaugă mobilier nou</h2>

            <form action="{{ route('furniture.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <!-- Titlu -->
                <div>
                    <label for="title" class="block font-semibold">Titlu</label>
                    <input type="text" name="title" id="title" class="w-full border px-3 py-2 rounded" required>
                </div>

                <!-- Preț -->
                <div>
                    <label for="price" class="block font-semibold">Preț</label>
                    <input type="number" name="price" id="price" class="w-full border px-3 py-2 rounded" step="0.01" required>
                </div>

                <!-- Thumbnail -->
                <div>
                    <label for="thumbnail" class="block font-semibold">Imagine principală (thumbnail)</label>
                    <input type="file" name="thumbnail" id="thumbnail" class="w-full border px-3 py-2 rounded" required>
                </div>

                <!-- Alte poze -->
                <div>
                    <label for="photos" class="block font-semibold">Poze adiționale</label>
                    <input type="file" name="photos[]" id="photos" class="w-full border px-3 py-2 rounded" multiple>
                </div>

                <!-- Descriere -->
                <div>
                    <label for="description" class="block font-semibold">Descriere</label>
                    <textarea name="description" id="description" class="w-full border px-3 py-2 rounded resize-none" rows="4"></textarea>
                </div>

                <!-- Submit -->
                <button type="submit" class="w-full bg-gold text-black py-2 rounded hover:bg-yellow-400 transition font-semibold">
                    Salvează
                </button>
            </form>
        </div>
    </div>

    <!-- Edit Modal  -->
    <div id="editFurnitureModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg w-full max-w-xl relative">
            <button onclick="closeEditModal()" class="absolute top-3 right-3 text-gray-600 hover:text-red-500 text-xl">×</button>

            <h2 class="text-xl font-bold mb-4">Editează mobilier</h2>
            <form id="editForm" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')

                <input type="hidden" id="editId">

                <label class="block font-semibold">Titlu</label>
                <input type="text" name="title" id="editTitle" class="w-full mb-3 border px-3 py-2 rounded" required>

                <label class="block font-semibold">Preț</label>
                <input type="number" name="price" id="editPrice" class="w-full mb-3 border px-3 py-2 rounded" required step="0.01">

                <label class="block font-semibold">Descriere</label>
                <textarea name="description" id="editDescription" rows="4" class="w-full mb-4 border px-3 py-2 rounded resize-none"></textarea>

                <div class="mt-4">
                    <label class="block font-semibold mb-1">Galerie foto</label>
                    <div id="existingPhotosList" class="flex flex-wrap gap-3"></div>

                    <label for="newPhotos" class="block font-semibold mt-4">Adaugă poze</label>
                    <input type="file" name="new_photos[]" id="newPhotos" multiple class="w-full border px-3 py-2 rounded" accept="image/*">
                </div>



                <!-- Hidden inputs -->
                <input type="hidden" name="deleted_photos" id="deletedPhotos">
                <input type="hidden" name="thumbnail_id" id="thumbnailId">
                <input type="hidden" name="photo_order" id="photoOrder">


                <button type="submit" class="w-full bg-gold text-black py-2 rounded hover:bg-yellow-400 transition font-semibold">
                    Salvează modificările
                </button>
            </form>
        </div>
    </div>
    @endif

</body>

</html>
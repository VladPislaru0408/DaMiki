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

    <!-- NAVBAR -->
    <header class="fixed top-0 left-0 w-full z-50 bg-black/50 backdrop-blur-md border-b border-gold">
        <div class="w-full mx-auto px-6 py-2 flex justify-between items-center">
            <!-- Logo -->
            <h1 class="text-[32px] sm:text-[42px] md:text-[56px] font-bold text-gold font-playfair">
                DAMIKI
            </h1>

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
            </nav>
        </div>

        <!-- Mobile Dropdown -->
        <div id="mobileMenu" class="md:hidden hidden bg-black/90 backdrop-blur-md border-t border-gold px-6 py-4 space-y-4">
            <a href="#gallery" class="block text-gold font-playfair text-[22px] no-underline hover:text-yellow-400">Galerie</a>
            <a href="#reviews" class="block text-gold font-playfair text-[22px] no-underline hover:text-yellow-400">Recenzii</a>
            <a href="#contact" class="block text-gold font-playfair text-[22px] no-underline hover:text-yellow-400">Contact</a>
        </div>
    </header>


    <!-- Replace existing HERO SECTION -->
    <section
        id="hero"
        class="relative min-h-screen md:h-[100vh] bg-cover bg-no-repeat bg-center flex items-center justify-center text-center px-6"
        style="background-image: url('/images/backgrounds/3.jpeg');">
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
    <section id="gallery" class="min-h-screen pt-[120px] pb-24 bg-cover bg-no-repeat bg-center" style="background-image: url('/images/backgrounds/3.jpeg');">
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
                    <div class="p-6 pt-0">
                        <button onclick="showModal('{{ $furniture->id }}')"
                            class="inline-flex items-center justify-center px-5 py-2 text-[16px] font-medium rounded-lg text-black bg-buttonBg hover:bg-white transition-all">
                            Vezi detalii
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
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
    <section id="reviews" class="py-8 bg-cover bg-center" style="background-image: url('/images/backgrounds/3.jpeg');">
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



    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Modal Logic -->
    <script>
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
    </script>

    <!-- Swiper + Vite App JS -->
    @vite('resources/js/app.js')
</body>

</html>
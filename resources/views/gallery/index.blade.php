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
        <div class="w-full mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-[64px] font-bold text-gold drop-shadow-[0_4px_8px_rgba(0,0,0,0.4)] font-playfair">
                DAMIKI
            </h1>
            <nav class="ml-auto flex gap-8 text-gold font-playfair text-[36px] font-semibold tracking-wide">
                <a href="#gallery" class="text-cream no-underline hover:text-gold">Galerie</a>
                <a href="#reviews" class="text-cream no-underline hover:text-gold">Recenzii</a>
                <a href="#contact" class="text-cream no-underline hover:text-gold">Contact</a>
            </nav>

        </div>
    </header>

    <!-- HERO SECTION -->
    <section
        id="hero"
        class="h-[100vh] bg-cover bg-no-repeat bg-center flex items-center justify-center text-center px-6"
        style="background-image: url('/images/backgrounds/homepage.png');">
        <div class="pt-[160px]">
            <h2 class="text-gold text-[64px] md:text-[96px] font-playfair font-normal leading-tight drop-shadow-[0_4px_8px_rgba(0,0,0,0.4)]">
                Mobilier care<br> redefinește eleganța.
            </h2>
            <p class="text-subtitle italic text-[32px] font-playfair mt-6 mb-10">
                Descoperă colecții premium cu design rafinat.
            </p>
            <a
                href="#gallery"
                class="bg-buttonBg text-black text-[25px] font-medium font-inter px-10 py-3 rounded-xl border-[3px] border-buttonBorder 
           hover:bg-buttonBorder hover:text-white hover:shadow-[0_0_12px_#F4C243]
           focus:outline-none focus:ring-2 focus:ring-gold focus:ring-offset-2
           transition-all duration-300 ease-in-out shadow-md no-underline">
                Vezi galeria
            </a>

        </div>
    </section>

    <!-- GALLERY SECTION -->
    <section id="gallery" class="min-h-screen pt-[180px] pb-32 bg-cover bg-no-repeat bg-center" style="background-image: url('/images/backgrounds/gallery.png');">
        <div class="text-center mb-16 px-4">
            <h2 class="text-galerieColor text-[64px] font-playfair font-normal leading-tight">Galerie</h2>
            <div class="w-[135px] h-[1px] bg-galerieLineColor mx-auto mt-3"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-x-20 gap-y-24 max-w-[1920px] mx-auto px-4 mt-20">
            @foreach($furnitures as $furniture)
            <div class="w-full flex justify-center">
                <div class="w-full max-w-[500px] bg-white rounded-2xl overflow-hidden shadow-[0_8px_24px_rgba(0,0,0,0.08)] transition-transform hover:scale-105 duration-300 font-playfair">

                    <div class="aspect-[3/2] overflow-hidden">
                        @if ($furniture->thumbnail)
                        <img src="{{ asset($furniture->thumbnail->image_path) }}" alt="{{ $furniture->title }}" class="w-full h-full object-cover">
                        @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-500">No Image</div>
                        @endif
                    </div>

                    <div class="px-6 py-5">
                        <h3 class="text-[22px] text-black font-normal mb-2">{{ $furniture->title }}</h3>
                        <p class="text-[18px] text-gray-700 mb-4 font-lora">{{ number_format($furniture->price, 2) }} RON</p>
                        <hr class="border-t border-gray-300 mb-4">

                        <button onclick="showModal('{{ $furniture->id }}')"
                            class="inline-flex items-center px-4 py-2 text-charcoal bg-buttonBorder hover:bg-gold rounded-md text-[16px] transition-all">
                            Vezi detalii
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>

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
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div id="modalImages" class="flex gap-4 overflow-x-auto justify-center p-2"></div>

                    <div class="mt-6">
                        <p class="text-charcoal text-[18px] font-inter" id="modalDesc"></p>
                        <p class="text-[20px] font-semibold text-black mt-2" id="modalPrice"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

            document.getElementById('modalTitle').textContent = title;
            document.getElementById('modalDesc').textContent = desc;
            document.getElementById('modalPrice').textContent = `${parseFloat(price).toFixed(2)} RON`;

            const modalImages = document.getElementById('modalImages');
            modalImages.innerHTML = '';

            photos.forEach(photo => {
                const img = document.createElement('img');
                img.src = '/' + photo.image_path;
                img.className = 'h-[200px] rounded-lg shadow-sm transition hover:scale-105 duration-200';
                modalImages.appendChild(img);
            });

            const modal = new bootstrap.Modal(document.getElementById('galleryModal'));
            modal.show();
        }
    </script>
</body>

</html>
{{-- resources/views/partials/modals/details.blade.php --}}

<div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content relative rounded-2xl shadow-lg border border-gray-300 bg-white">
            <button
                type="button"
                class="btn-close absolute top-4 right-4 z-10 text-black text-2xl font-bold hover:text-red-600 transition"
                data-bs-dismiss="modal"
                aria-label="Close">
            </button>

            <div class="modal-body p-6">
                <h5 id="modalTitle" class="text-[28px] font-playfair font-semibold text-center text-gold mb-4"></h5>
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

                <div id="modalImages" class="flex flex-wrap justify-center gap-4"></div>

                <div class="mt-6 text-center">
                    <p id="modalDesc"
                        class="text-charcoal text-[16px] sm:text-[18px] font-inter mb-2 break-words max-w-[90%] mx-auto text-center max-h-[180px] sm:max-h-[220px] overflow-y-auto">
                    </p>
                    <p id="modalPrice" class="text-[22px] font-semibold text-black bg-gold/10 inline-block px-4 py-2 rounded-lg"></p>
                </div>
            </div>
        </div>
    </div>
</div>
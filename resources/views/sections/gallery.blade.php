{{-- resources/views/sections/gallery.blade.php --}}

<section id="gallery" class="min-h-screen pt-40 pb-5 bg-cover bg-no-repeat bg-center" style="background-image: url('/images/backgrounds/2.jpeg');">
    <div class="text-center mb-16 px-4">
        <h2 class="text-galerieColor text-[64px] font-playfair font-normal leading-tight">Galerie</h2>
        <div class="w-[135px] h-[1px] bg-galerieLineColor mx-auto mt-3"></div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-x-20 gap-y-12 sm:gap-y-20 max-w-[1920px] mx-auto px-4 mt-20">
        @foreach($furnitures as $furniture)
        <div class="w-full flex justify-center">
            <div class="relative flex w-full max-w-[400px] flex-col rounded-xl sm:rounded-2xl bg-gradient-to-br from-[#d4af37] to-[#fcd34d] text-black shadow-md transition-transform md:hover:scale-105 duration-300 font-playfair">
                <div class="relative mx-4 -mt-6 h-48 overflow-hidden rounded-xl shadow-md">
                    @if ($furniture->thumbnail)
                    <img src="{{ asset($furniture->thumbnail->image_path) }}" alt="{{ $furniture->title }}" class="h-full w-full object-cover" />
                    @else
                    <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-500">No Image</div>
                    @endif
                </div>

                <div class="p-6">
                    <h5 class="relative mb-2 text-[22px] font-semibold leading-snug">
                        {{ $furniture->title }}
                    </h5>
                    @if (!is_null($furniture->price))
                    <p class="text-[18px] text-gray-700 mb-4 font-lora">
                        {{ number_format($furniture->price, 2) }} RON
                    </p>
                    @endif
                </div>

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

                <div id="furniture-{{ $furniture->id }}" class="hidden"
                    data-title="{{ $furniture->title }}"
                    data-description="{{ $furniture->description }}"
                    data-price="{{ $furniture->price }}"
                    data-photos='@json($furniture->photos)'>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if($isAdmin)
    <button
        class="fixed bottom-6 right-6 z-50 bg-gold text-black px-10 py-5 text-2xl font-bold rounded-lg shadow-2xl hover:bg-yellow-400 transition-all"
        onclick="document.getElementById('addFurnitureModal').classList.remove('hidden')">
        + Adaugă mobilier
    </button>
    @endif

</section>

{{-- Modalul de detalii --}}
@include('partials.modals.details')
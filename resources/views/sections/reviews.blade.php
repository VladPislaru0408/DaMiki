{{-- resources/views/sections/reviews.blade.php --}}

<section id="reviews" class="pt-40 pb-5 bg-cover bg-center" style="background-image: url('/images/backgrounds/2.jpeg');">
    <h2 class="text-[64px] font-playfair font-semibold text-galerieColor text-center">Recenzii</h2>
    <div class="w-[120px] h-[1px] bg-galerieLineColor mx-auto mt-2 mb-10"></div>

    <div class="relative swiper reviewSwiper overflow-hidden w-full px-6">
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
    </div>

    <p class="mt-16 italic text-cream text-[36px] font-playfair max-w-5xl mx-auto leading-relaxed text-center">
        Părerile clienților ne motivează să ne îmbunătățim zilnic.
    </p>
</section>
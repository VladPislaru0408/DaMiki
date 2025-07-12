{{-- resources/views/sections/hero.blade.php --}}

<section
    id="hero"
    class="relative min-h-screen md:h-[100vh] bg-cover bg-no-repeat bg-center flex items-center justify-center text-center px-6"
    style="background-image: url('/images/backgrounds/1.jpeg');">
    <div class="pt-[120px] sm:pt-[140px] md:pt-[160px] max-w-5xl mx-auto px-4 py-10 md:py-20">
        <h1 class="text-[28px] sm:text-[36px] md:text-[48px] lg:text-[64px] font-playfair leading-tight font-bold text-gold fade-in-up">
            Alege mobilier <span class="highlight-animated">creat pentru tine</span><br />
            nu pentru toți
        </h1>

        <p class="text-subtitle text-[16px] sm:text-[18px] md:text-[22px] lg:text-[26px] font-playfair mt-4 sm:mt-6 mb-8 fade-in-up fade-in-up-delay-1">
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
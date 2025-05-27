{{-- resources/views/sections/contact.blade.php --}}

<section id="contact" class="py:12 md:py-16 bg-cover bg-center text-galerieColor" style="background-image: url('/images/backgrounds/2.jpeg');">
    <div class="max-w-6xl mx-auto px-4 py-5 text-center">
        <h2 class="text-[48px] md:text-[64px] font-playfair font-semibold mb-2">Contact</h2>
        <div class="w-[120px] h-[1px] bg-galerieLineColor mx-auto mb-10"></div>

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

        <!-- Toast Notification -->
        <div id="toast" class="pointer-events-none fixed bottom-6 left-1/2 transform -translate-x-1/2 bg-gold text-black px-4 py-2 rounded shadow-md text-sm font-medium opacity-0 transition-opacity duration-300 z-50 flex items-center gap-2 pointer-events-none">
            <span id="toast-icon">📋</span>
            <span id="toast-message">Text copied to clipboard!</span>
        </div>

        <!-- Google Maps -->
        <div class="relative w-full max-w-5xl mx-auto">
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-[60%] z-20 pointer-events-none">
                <div class="loader-shape-3"></div>
            </div>
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
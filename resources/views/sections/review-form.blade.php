{{-- resources/views/sections/review-form.blade.php --}}
<section id="review-form" class="py-12 md:py-16 bg-cover bg-center bg-no-repeat" style="background-image: url('/images/backgrounds/2.jpeg');">
    <div class="max-w-4xl mx-auto px-4">
        <div class="text-center mb-12 md:mb-16">
            <h2 class="text-[48px] md:text-[64px] font-playfair font-semibold text-galerieColor mb-2">Lasă o recenzie</h2>
            <div class="w-[135px] h-[1px] bg-galerieLineColor mx-auto mt-3 mb-6"></div>
            <p class="text-cream font-lora text-lg">Împărtășește experiența ta cu mobila noastră</p>
        </div>

        <div class="bg-white/95 backdrop-blur-sm rounded-xl shadow-2xl p-6 sm:p-8 border border-gold/20">
            <form id="reviewForm" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="reviewer_name" class="block text-lg font-medium text-gray-800 mb-2 font-playfair">
                            Nume complet *
                        </label>
                        <input type="text" id="reviewer_name" name="name" required
                               class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold transition-all font-lora">
                    </div>
                    
                    <div>
                        <label for="rating" class="block text-lg font-medium text-gray-800 mb-2 font-playfair">
                            Rating *
                        </label>
                        <select id="rating" name="rating" required
                                class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold transition-all font-lora">
                            <option value="">Selectează rating</option>
                            <option value="5">⭐⭐⭐⭐⭐ (5 stele)</option>
                            <option value="4">⭐⭐⭐⭐ (4 stele)</option>
                            <option value="3">⭐⭐⭐ (3 stele)</option>
                            <option value="2">⭐⭐ (2 stele)</option>
                            <option value="1">⭐ (1 stea)</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label for="review_content" class="block text-lg font-medium text-gray-800 mb-2 font-playfair">
                        Recenzia ta *
                    </label>
                    <textarea id="review_content" name="content" rows="5" required maxlength="500"
                              placeholder="Spune-ne despre experiența ta cu mobila noastră..."
                              class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold transition-all resize-none font-lora"></textarea>
                    <div class="text-right text-sm text-gray-600 mt-1 font-lora">
                        <span id="charCount">0</span>/500 caractere
                    </div>
                </div>

                <div class="flex justify-center">
                    <button type="submit"
                            class="w-full sm:w-auto bg-gold hover:bg-yellow-400 text-black font-semibold px-8 sm:px-10 py-3 sm:py-4 rounded-lg transition-all duration-200 font-playfair text-lg shadow-lg hover:shadow-xl transform hover:scale-105">
                        Trimite recenzia
                    </button>
                </div>
            </form>

            <div id="reviewMessage" class="hidden mt-4 p-4 rounded-lg font-lora"></div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const reviewForm = document.getElementById('reviewForm');
    const reviewTextarea = document.getElementById('review_content');
    const charCount = document.getElementById('charCount');
    const messageDiv = document.getElementById('reviewMessage');

    // Character counter
    if (reviewTextarea && charCount) {
        reviewTextarea.addEventListener('input', function() {
            charCount.textContent = this.value.length;
        });
    }

    // Form submission
    if (reviewForm) {
        reviewForm.addEventListener('submit', async function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const submitButton = this.querySelector('button[type="submit"]');
            
            // Disable submit button
            submitButton.disabled = true;
            submitButton.textContent = 'Se trimite...';

            try {
                const response = await fetch('/reviews', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });

                const data = await response.json();

                if (response.ok) {
                    showMessage('Recenzia a fost trimisă cu succes! Va fi verificată de echipa noastră.', 'success');
                    reviewForm.reset();
                    charCount.textContent = '0';
                } else {
                    console.error('Response error:', response.status, data);
                    if (data.errors) {
                        const errorMessages = Object.values(data.errors).flat().join(', ');
                        showMessage(errorMessages, 'error');
                    } else {
                        showMessage(`Eroare ${response.status}: ${data.message || 'Te rugăm să încerci din nou.'}`, 'error');
                    }
                }
            } catch (error) {
                console.error('Network error:', error);
                showMessage('A apărut o eroare de rețea. Verifică conexiunea și încearcă din nou.', 'error');
            } finally {
                // Re-enable submit button
                submitButton.disabled = false;
                submitButton.textContent = 'Trimite recenzia';
            }
        });
    }

    function showMessage(message, type) {
        messageDiv.textContent = message;
        messageDiv.className = `mt-4 p-4 rounded-lg ${type === 'success' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'}`;
        messageDiv.classList.remove('hidden');
        
        // Hide message after 5 seconds
        setTimeout(() => {
            messageDiv.classList.add('hidden');
        }, 5000);
    }
});
</script>

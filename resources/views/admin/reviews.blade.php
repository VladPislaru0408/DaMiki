{{-- resources/views/admin/reviews.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-cover bg-center bg-no-repeat py-20 md:py-28" style="background-image: url('/images/backgrounds/2.jpeg');">
    <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8">
        <div class="text-center mb-16 md:mb-20">
            <h1 class="text-[48px] md:text-[64px] font-playfair font-semibold text-galerieColor mb-2">Gestionare Recenzii</h1>
            <div class="w-[135px] h-[1px] bg-galerieLineColor mx-auto mt-3 mb-6"></div>
            <p class="text-cream font-lora text-lg">Aprobă sau respinge recenziile trimise de clienți</p>
        </div>

        <!-- Pending Reviews -->
        <div class="bg-white/95 backdrop-blur-sm shadow-2xl overflow-hidden rounded-xl border border-gold/20">
            <div class="px-6 py-8 sm:p-8">
                <h2 class="text-2xl font-playfair font-semibold text-gray-800 mb-6 text-center">Recenzii în așteptare</h2>
                <div id="pendingReviews" class="space-y-6">
                    <!-- Reviews will be loaded here via JavaScript -->
                </div>
                <div id="noReviews" class="hidden text-center py-12">
                    <div class="text-gray-500 font-lora text-lg mb-4">Nu există recenzii în așteptare</div>
                    <div class="text-gray-400 font-lora">Toate recenziile au fost procesate!</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    loadPendingReviews();

    async function loadPendingReviews() {
        try {
            const response = await fetch('/admin/reviews/pending');
            const reviews = await response.json();

            const container = document.getElementById('pendingReviews');
            const noReviewsMessage = document.getElementById('noReviews');

            if (reviews.length === 0) {
                container.innerHTML = '';
                noReviewsMessage.classList.remove('hidden');
                return;
            }

            noReviewsMessage.classList.add('hidden');
            container.innerHTML = reviews.map(review => `
                <div class="bg-white/90 backdrop-blur-sm border-2 border-gold/30 rounded-xl p-4 sm:p-6 shadow-lg hover:shadow-xl transition-all duration-200" id="review-${review.id}">
                    <div class="flex flex-col sm:flex-row justify-between items-start mb-4">
                        <div class="w-full mb-4 sm:mb-0">
                            <h3 class="text-xl font-playfair font-semibold text-gray-800">${review.name}</h3>
                            <p class="text-sm text-gray-600 font-lora">${new Date(review.created_at).toLocaleDateString('ro-RO')}</p>
                            <div class="flex items-center mt-2">
                                <span class="text-lg">${'⭐'.repeat(review.rating)}</span>
                                <span class="ml-2 text-sm text-gray-600 font-lora">(${review.rating}/5)</span>
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row gap-3 sm:space-x-3 w-full sm:w-auto">
                            <button 
                                onclick="approveReview(${review.id})"
                                class="w-full bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg text-sm font-semibold font-playfair transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-105">
                                Aprobă
                            </button>
                            <button 
                                onclick="rejectReview(${review.id})"
                                class="w-full bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-lg text-sm font-semibold font-playfair transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-105">
                                Respinge
                            </button>
                        </div>
                    </div>
                    <div class="bg-gray-50/80 rounded-lg p-3 sm:p-4 border border-gray-200 mt-2">
                        <p class="text-gray-700 font-lora leading-relaxed text-sm sm:text-base">${review.content}</p>
                    </div>
                </div>
            `).join('');
        } catch (error) {
            console.error('Error loading reviews:', error);
        }
    }

    window.approveReview = async function(reviewId) {
        try {
            const response = await fetch(`/admin/reviews/${reviewId}/approve`, {
                method: 'PATCH',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json'
                }
            });

            const data = await response.json();
            
            if (response.ok) {
                document.getElementById(`review-${reviewId}`).remove();
                showMessage(data.message, 'success');
                
                // Check if no more reviews
                const remainingReviews = document.querySelectorAll('#pendingReviews > div');
                if (remainingReviews.length === 0) {
                    document.getElementById('noReviews').classList.remove('hidden');
                }
            } else {
                showMessage('Eroare la aprobarea recenziei', 'error');
            }
        } catch (error) {
            showMessage('Eroare de rețea', 'error');
        }
    };

    window.rejectReview = async function(reviewId) {
        try {
            const response = await fetch(`/admin/reviews/${reviewId}/reject`, {
                method: 'PATCH',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json'
                }
            });

            const data = await response.json();
            
            if (response.ok) {
                document.getElementById(`review-${reviewId}`).remove();
                showMessage(data.message, 'success');
                
                // Check if no more reviews
                const remainingReviews = document.querySelectorAll('#pendingReviews > div');
                if (remainingReviews.length === 0) {
                    document.getElementById('noReviews').classList.remove('hidden');
                }
            } else {
                showMessage('Eroare la respingerea recenziei', 'error');
            }
        } catch (error) {
            showMessage('Eroare de rețea', 'error');
        }
    };

    function showMessage(message, type) {
        // Create a toast message with improved styling
        const toast = document.createElement('div');
        toast.className = `fixed top-6 right-6 px-6 py-4 rounded-xl text-white z-50 font-playfair font-semibold shadow-2xl transform transition-all duration-300 ${type === 'success' ? 'bg-green-600' : 'bg-red-600'}`;
        toast.textContent = message;
        toast.style.transform = 'translateX(100%)';
        document.body.appendChild(toast);

        // Animate in
        setTimeout(() => {
            toast.style.transform = 'translateX(0)';
        }, 100);

        // Animate out and remove
        setTimeout(() => {
            toast.style.transform = 'translateX(100%)';
            setTimeout(() => {
                if (toast.parentNode) {
                    toast.remove();
                }
            }, 300);
        }, 3000);
    }
});
</script>
@endsection

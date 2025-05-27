// resources/js/components/modal.js

window.showModal = function (id) {
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

    if (photos.length > 0) {
        setImage(currentIndex);
    }

    document.getElementById('prevBtn').onclick = () => {
        currentIndex = (currentIndex - 1 + photos.length) % photos.length;
        setImage(currentIndex);
    };

    document.getElementById('nextBtn').onclick = () => {
        currentIndex = (currentIndex + 1) % photos.length;
        setImage(currentIndex);
    };

    mainImage.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
    });

    mainImage.addEventListener('touchend', (e) => {
        const swipeDistance = e.changedTouches[0].screenX - touchStartX;
        const threshold = 50;
        if (swipeDistance > threshold) currentIndex = (currentIndex - 1 + photos.length) % photos.length;
        else if (swipeDistance < -threshold) currentIndex = (currentIndex + 1) % photos.length;
        setImage(currentIndex);
    });

    const modal = new bootstrap.Modal(document.getElementById('galleryModal'));
    modal.show();
};

// Folosim global temporar pentru acces în Blade
window.openEditModal = function (id) {
    const event = new CustomEvent('edit-furniture', { detail: { id } });
    window.dispatchEvent(event);
};

window.closeEditModal = function () {
    document.getElementById('editFurnitureModal').classList.add('hidden');
};


// 
document.addEventListener("DOMContentLoaded", () => {
    const modals = ['addFurnitureModal', 'editFurnitureModal'];

    modals.forEach((modalId) => {
        const modal = document.getElementById(modalId);
        if (!modal) return;

        // ESC key
        document.addEventListener("keydown", (e) => {
            if (e.key === "Escape" && !modal.classList.contains("hidden")) {
                modal.classList.add("hidden");
            }
        });

        // Click outside
        modal.addEventListener("click", (e) => {
            if (e.target === modal) {
                modal.classList.add("hidden");
            }
        });
    });
});

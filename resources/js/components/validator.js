// resources/js/components/validator.js

document.addEventListener('DOMContentLoaded', () => {
    const editForm = document.getElementById('editForm');
    if (!editForm) return;

    editForm.addEventListener('submit', function (e) {
        const existingPhotos = Array.from(document.querySelectorAll('#existingPhotosList li'))
            .filter(li => !li.classList.contains('deleted'));

        const newPhotosInput = document.getElementById('newPhotos');
        const newCount = newPhotosInput.files.length;

        const totalPhotos = existingPhotos.length + newCount;
        const thumbnailId = document.getElementById('thumbnailId').value;

        if (totalPhotos === 0) {
            e.preventDefault();
            alert('Trebuie să adaugi cel puțin o poză.');
            return;
        }

        if (!thumbnailId) {
            e.preventDefault();
            alert('Trebuie să selectezi o imagine principală (thumbnail).');
            return;
        }
    });
});

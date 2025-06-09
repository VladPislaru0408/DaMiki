<div id="editFurnitureModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex justify-center items-center">
    <div class="bg-white p-8 rounded-lg w-full max-w-xl h-75 relative flex flex-col">
        <button onclick="closeEditModal()" class="absolute top-4 right-4 text-gray-600 hover:text-red-500 text-2xl">×</button>

        <h2 class="text-2xl font-bold mb-6 text-center">Editează mobilier</h2>

        <form id="editForm" method="POST" enctype="multipart/form-data" class="flex flex-col grow space-y-5 overflow-y-auto">
            @csrf
            @method('PUT')
            <input type="hidden" id="editId">

            <!-- Titlu -->
            <div>
                <label for="editTitle" class="block text-2xl font-medium mb-2">Titlu</label>
                <input type="text" name="title" id="editTitle" class="w-full border px-4 py-3 text-lg rounded" required>
            </div>

            <!-- Preț -->
            <div>
                <label for="editPrice" class="block text-2xl font-medium mb-2">Preț (optional)</label>
                <input type="number" name="price" id="editPrice" class="w-full border px-4 py-3 text-lg rounded" step="0.01">
            </div>

            <!-- Descriere -->
            <div>
                <label for="editDescription" class="block text-2xl font-medium mb-2">Descriere</label>
                <textarea name="description" id="editDescription" class="w-full border px-4 py-3 text-lg rounded resize-none" rows="6"></textarea>
            </div>

            <!-- Galerie -->
            <div>
                <label class="block text-2xl font-medium mb-2">Galerie foto</label>
                <div id="existingPhotosList" class="flex flex-wrap gap-3 mb-3"></div>

                <label for="newPhotos" class="block text-2xl font-medium mb-2">Adaugă poze</label>
                <input type="file" name="new_photos[]" id="newPhotos" multiple class="w-full border px-4 py-3 text-lg rounded" accept="image/*">
            </div>

            <!-- Hidden fields -->
            <input type="hidden" name="deleted_photos" id="deletedPhotos">
            <input type="hidden" name="thumbnail_id" id="thumbnailId">
            <input type="hidden" name="photo_order" id="photoOrder">

            <!-- Submit pinned to bottom -->
            <div class="mt-auto pt-4">
                <button type="submit" class="w-full bg-gold text-black text-lg py-3 rounded hover:bg-yellow-400 transition font-semibold">
                    Salvează modificările
                </button>
            </div>
        </form>
    </div>
</div>

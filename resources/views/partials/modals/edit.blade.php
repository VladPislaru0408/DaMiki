{{-- resources/views/partials/modals/edit.blade.php --}}

@if($isAdmin)
<div id="editFurnitureModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex justify-center items-center">
    <div class="bg-white p-6 rounded-lg w-full max-w-xl relative">
        <button onclick="closeEditModal()" class="absolute top-3 right-3 text-gray-600 hover:text-red-500 text-xl">×</button>

        <h2 class="text-xl font-bold mb-4">Editează mobilier</h2>

        <form id="editForm" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <input type="hidden" id="editId">

            <div>
                <label class="block font-semibold">Titlu</label>
                <input type="text" name="title" id="editTitle" class="w-full border px-3 py-2 rounded" required>
            </div>

            <div>
                <label class="block font-semibold">Preț</label>
                <input type="number" name="price" id="editPrice" class="w-full border px-3 py-2 rounded" step="0.01" required>
            </div>

            <div>
                <label class="block font-semibold">Descriere</label>
                <textarea name="description" id="editDescription" class="w-full border px-3 py-2 rounded resize-none" rows="4"></textarea>
            </div>

            <div class="mt-4">
                <label class="block font-semibold mb-1">Galerie foto</label>
                <div id="existingPhotosList" class="flex flex-wrap gap-3"></div>

                <label for="newPhotos" class="block font-semibold mt-4">Adaugă poze</label>
                <input type="file" name="new_photos[]" id="newPhotos" multiple class="w-full border px-3 py-2 rounded" accept="image/*">
            </div>

            <!-- Hidden inputs -->
            <input type="hidden" name="deleted_photos" id="deletedPhotos">
            <input type="hidden" name="thumbnail_id" id="thumbnailId">
            <input type="hidden" name="photo_order" id="photoOrder">

            <button type="submit" class="w-full bg-gold text-black py-2 rounded hover:bg-yellow-400 transition font-semibold">
                Salvează modificările
            </button>
        </form>
    </div>
</div>
@endif

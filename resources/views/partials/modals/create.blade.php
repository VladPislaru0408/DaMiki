{{-- resources/views/partials/modals/create.blade.php --}}

@if($isAdmin)
<div id="addFurnitureModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg p-6 w-full max-w-xl relative">
        <button onclick="document.getElementById('addFurnitureModal').classList.add('hidden')" class="absolute top-4 right-4 text-gray-600 hover:text-red-500 text-xl">×</button>

        <h2 class="text-xl font-bold mb-4">Adaugă mobilier nou</h2>

        <form action="{{ route('furniture.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label for="title" class="block font-semibold">Titlu</label>
                <input type="text" name="title" id="title" class="w-full border px-3 py-2 rounded" required>
            </div>

            <div>
                <label for="price" class="block font-semibold">Preț</label>
                <input type="number" name="price" id="price" class="w-full border px-3 py-2 rounded" step="0.01" required>
            </div>

            <div>
                <label for="thumbnail" class="block font-semibold">Imagine principală (thumbnail)</label>
                <input type="file" name="thumbnail" id="thumbnail" class="w-full border px-3 py-2 rounded" required>
            </div>

            <div>
                <label for="photos" class="block font-semibold">Poze adiționale</label>
                <input type="file" name="photos[]" id="photos" class="w-full border px-3 py-2 rounded" multiple>
            </div>

            <div>
                <label for="description" class="block font-semibold">Descriere</label>
                <textarea name="description" id="description" class="w-full border px-3 py-2 rounded resize-none" rows="4"></textarea>
            </div>

            <button type="submit" class="w-full bg-gold text-black py-2 rounded hover:bg-yellow-400 transition font-semibold">
                Salvează
            </button>
        </form>
    </div>
</div>
@endif
`
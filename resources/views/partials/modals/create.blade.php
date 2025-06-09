{{-- resources/views/partials/modals/create.blade.php --}}

@if($isAdmin)
<div id="addFurnitureModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg p-8 w-full max-w-xl h-75 relative flex flex-col">
        <button onclick="document.getElementById('addFurnitureModal').classList.add('hidden')" class="absolute top-4 right-4 text-gray-600 hover:text-red-500 text-2xl">×</button>

        <h2 class="text-2xl font-bold mb-6 text-center">Adaugă mobilier nou</h2>

        <form action="{{ route('furniture.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col grow space-y-5 overflow-y-auto">
            @csrf

            <div>
                <label for="title" class="block text-2xl font-medium mb-2">Titlu</label>
                <input type="text" name="title" id="title" class="w-full border px-4 py-3 text-lg rounded" required>
            </div>

            <div>
                <label for="price" class="block text-2xl font-medium mb-2">Preț(optional)</label>
                <input type="number" name="price" id="price" class="w-full border px-4 py-3 text-lg rounded" step="0.01">
            </div>

            <div>
                <label for="thumbnail" class="block text-2xl font-medium mb-2">Imagine principală (thumbnail)</label>
                <input type="file" name="thumbnail" id="thumbnail" class="w-full border px-4 py-3 text-lg rounded" required>
            </div>

            <div>
                <label for="photos" class="block text-2xl font-medium mb-2">Poze adiționale</label>
                <input type="file" name="photos[]" id="photos" class="w-full border px-4 py-3 text-lg rounded" multiple>
            </div>

            <div>
                <label for="description" class="block text-2xl font-medium mb-2">Descriere</label>
                <textarea name="description" id="description" class="w-full border px-4 py-3 text-lg rounded resize-none" rows="6"></textarea>
            </div>

            <div class="mt-auto pt-4">
                <button type="submit" class="w-full bg-gold text-black text-lg py-3 rounded hover:bg-yellow-400 transition font-semibold">
                    Salvează
                </button>
            </div>
        </form>
    </div>
</div>
@endif
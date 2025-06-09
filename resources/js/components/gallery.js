// resources/js/components/gallery.js

import Sortable from "sortablejs";

let currentThumbId = null;
let deletedIds = [];
let newPhotos = [];
let newPhotoThumbId = null;
const photoDataCache = {};

window.generateUniqueId = function () {
    return "id-" + Date.now() + "-" + Math.floor(Math.random() * 100000);
};

function highlightThumbnail() {
    document.querySelectorAll("#existingPhotosList li").forEach((li) => {
        li.classList.remove("ring-2", "ring-yellow-500");
        if (li.dataset.id && parseInt(li.dataset.id) === currentThumbId) {
            li.classList.add("ring-2", "ring-yellow-500");
        }
        if (li.dataset.new && li.dataset.new === newPhotoThumbId) {
            li.classList.add("ring-2", "ring-yellow-500");
        }
    });
}

function updateHiddenInputs() {
    const order = [];
    document.querySelectorAll("#existingPhotosList li").forEach((li) => {
        if (li.dataset.id) order.push(li.dataset.id);
        if (li.dataset.new) order.push("new-" + li.dataset.new);
    });

    document.getElementById("photoOrder").value = order.join(",");
    document.getElementById("deletedPhotos").value = deletedIds.join(",");
    if (currentThumbId !== null) {
        document.getElementById("thumbnailId").value = currentThumbId;
    } else if (newPhotoThumbId !== null) {
        document.getElementById("thumbnailId").value = "new-" + newPhotoThumbId;
    } else {
        document.getElementById("thumbnailId").value = "";
    }
}

window.renderGallery = function (id) {
    const container = document.getElementById("existingPhotosList");
    container.innerHTML = "";

    const photoList = photoDataCache[id] || [];
    photoList.forEach((photo) => {
        if (deletedIds.includes(photo.id)) return;

        const li = document.createElement("li");
        li.className =
            "relative w-[100px] h-[100px] border rounded overflow-hidden shadow-sm";
        li.dataset.id = photo.id;

        const img = document.createElement("img");
        img.src = "/" + photo.image_path;
        img.className = "w-full h-full object-cover";

        const delBtn = document.createElement("button");
        delBtn.innerText = "🗑️";
        delBtn.className =
            "absolute top-1 right-1 bg-white rounded px-1 py-0 text-xs";
        delBtn.onclick = () => {
            deletedIds.push(photo.id);
            if (currentThumbId == photo.id) currentThumbId = null;
            renderGallery(id);
        };

        const thumbBtn = document.createElement("button");
        thumbBtn.innerText = "⭐";
        thumbBtn.className =
            "absolute bottom-1 left-1 bg-white rounded px-1 py-0 text-xs";
        thumbBtn.onclick = () => {
            currentThumbId = photo.id;
            newPhotoThumbId = null;
            highlightThumbnail();
            updateHiddenInputs();
        };

        li.appendChild(img);
        li.appendChild(delBtn);
        li.appendChild(thumbBtn);
        container.appendChild(li);

        if (photo.is_thumbnail && currentThumbId === null) {
            currentThumbId = photo.id;
        }
    });

    newPhotos.forEach((photoObj) => {
        const { id: newId, file } = photoObj;

        const li = document.createElement("li");
        li.className =
            "relative w-[100px] h-[100px] border rounded overflow-hidden shadow-sm";
        li.dataset.new = newId;

        const reader = new FileReader();
        reader.onload = function (e) {
            const img = document.createElement("img");
            img.src = e.target.result;
            img.className = "w-full h-full object-cover";
            li.appendChild(img);
        };
        reader.readAsDataURL(file);

        const delBtn = document.createElement("button");
        delBtn.innerText = "🗑️";
        delBtn.className =
            "absolute top-1 right-1 bg-white rounded px-1 py-0 text-xs";
        delBtn.onclick = () => {
            const idx = newPhotos.findIndex((p) => p.id === newId);
            if (idx !== -1) newPhotos.splice(idx, 1);
            renderGallery(id);
        };

        const thumbBtn = document.createElement("button");
        thumbBtn.innerText = "⭐";
        thumbBtn.className =
            "absolute bottom-1 left-1 bg-white rounded px-1 py-0 text-xs";
        thumbBtn.onclick = () => {
            newPhotoThumbId = newId;
            currentThumbId = null;
            highlightThumbnail();
            updateHiddenInputs();
        };

        li.appendChild(delBtn);
        li.appendChild(thumbBtn);
        container.appendChild(li);
    });

    highlightThumbnail();
    updateHiddenInputs();
};

window.addEventListener("edit-furniture", function (e) {
    const id = e.detail.id;
    const card = document.getElementById(`furniture-${id}`);
    const photos = JSON.parse(card.dataset.photos);

    deletedIds = [];
    currentThumbId = null;
    newPhotos = [];
    newPhotoThumbId = null;
    photoDataCache[id] = photos;

    document.getElementById("editId").value = id;
    document.getElementById("editTitle").value = card.dataset.title;
    document.getElementById("editPrice").value = card.dataset.price;
    document.getElementById("editDescription").value = card.dataset.description;
    document.getElementById("editForm").action = `/furniture/${id}`;

    const newPhotosInput = document.getElementById("newPhotos");
    newPhotosInput.value = "";
    newPhotosInput.onchange = (e) => {
        Array.from(e.target.files).forEach((file) => {
            newPhotos.push({ id: generateUniqueId(), file });
        });
        renderGallery(id);
    };

    renderGallery(id);

    Sortable.create(document.getElementById("existingPhotosList"), {
        animation: 150,
        onSort: updateHiddenInputs,
    });

    document.getElementById("editFurnitureModal").classList.remove("hidden");
});

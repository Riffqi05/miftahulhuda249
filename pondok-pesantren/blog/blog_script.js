const dropArea = document.getElementById("drop-area");
const thumbnailInput = document.getElementById("thumbnail");
const dropText = document.getElementById("drop-text");
const dragDropContainer = document.getElementById("drag-drop-container");
const dragDropArea = document.getElementById("dragDrop-area");
const previewArea = document.getElementById("preview-area");
const tags = document.getElementById("tags");
const tagArea = document.getElementById("tags-area");

dropArea.addEventListener("dragover", (event) => {
  event.preventDefault();
  dropArea.classList.add("drag-over");
  dropText.textContent = "Release to upload the image";
  dropText.classList.add("text-blue-500");
});
document.querySelector("#judul").addEventListener("keyup", function (event) {
  var judul = document.getElementById("judul").value;
  var words = judul.split(" ");
  if (words.length > 5) {
    words = words.slice(0, 10);
  }
  var url = words.join("-");
  document.getElementById("url").value = url;
});
tags.addEventListener("keydown", (event) => {
  if (event.key === "Enter") {
    event.preventDefault();
    if (
      !document
        .getElementById("blog_tag")
        .value.toLowerCase()
        .includes(tags.value)
    ) {
      if (tags.value) {
        const tagContainer = document.getElementById("tag-container");
        tagArea.appendChild(createTailwindButton(tags.value));
        document.getElementById("blog_tag").value = `${
          document.getElementById("blog_tag").value
        } #${tags.value},`;
        tags.value = "";
      }
    }
  }
});
document.getElementById("add_tag").addEventListener("click", (event) => {
  event.preventDefault();
  if (tags.value) {
    const tagContainer = document.getElementById("tag-container");
    if (
      !document
        .getElementById("blog_tag")
        .value.toLowerCase()
        .includes(tags.value)
    ) {
      tagArea.appendChild(createTailwindButton(tags.value));
      if (document.getElementById("blog_tag").value) {
        document.getElementById("blog_tag").value = `${
          document.getElementById("blog_tag").value
        }, #${tags.value},`;
      } else {
        document.getElementById("blog_tag").value = `#${tags.value},`;
      }
    }
    tags.value = "";
  }
});
function createTailwindButton(text) {
  if (text != "") {
    const button = document.createElement("span");
    button.classList.add(
      "bg-blue-500",
      "gap-5",
      "mr-2",
      "mt-2",
      "hover:bg-blue-700",
      "text-white",
      "hover:bg-red-500",
      "hover:cursor-pointer",
      "font-bold",
      "py-2",
      "px-4",
      "rounded-full",
      "flex",
      "justify-center",
      "items-center"
    );
    button.textContent = text;
    const icon = document.createElement("span");
    icon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>`;
    button.appendChild(icon);
    button.addEventListener("click", () => {
      document.querySelector("#blog_tag").value = document
        .querySelector("#blog_tag")
        .value.split(`#$${text},`)
        .join("");
      button.remove();
    });
    return button;
  }
}
function removeEl(el, t = "") {
  document.querySelector("#blog_tag").value = document
    .querySelector("#blog_tag")
    .value.split(`${t},`)
    .join("");
  el.remove();
}

dropArea.addEventListener("dragleave", () => {
  dropArea.classList.remove("drag-over");
  dropText.textContent = "Drag and drop an image or click to select";
  dropText.classList.remove("text-blue-500"); // Menghapus warna biru ketika drag meninggalkan area
});

dropArea.addEventListener("drop", (event) => {
  event.preventDefault();
  dropArea.classList.remove("drag-over");

  const files = event.dataTransfer.files;
  if (files.length > 0) {
    thumbnailInput.files = files;
    displayImage(files[0]);
  }
});

dropArea.addEventListener("click", () => {
  thumbnailInput.click();
});

thumbnailInput.addEventListener("change", () => {
  if (thumbnailInput.files.length > 0) {
    displayImage(thumbnailInput.files[0]);
  }
});

function displayImage(file) {
  const reader = new FileReader();
  reader.onload = function (e) {
    previewArea.innerHTML = `
    <div class="relative w-60 h-60">
        <img class="w-full h-full object-cover rounded-lg border-2 border-red-500" src="${e.target.result}" alt="Image Preview">
        <button class="absolute top-2 right-2 bg-white text-gray-600 rounded-full w-6 h-6 flex items-center justify-center cursor-pointer p-1" onclick="deleteImage()">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
`;
    dragDropContainer.classList.add("hidden");
  };
  reader.readAsDataURL(file);
}

function deleteImage() {
  dragDropContainer.classList.remove("hidden");
  thumbnailInput.value = ""; // Reset the file input
  dragDropArea.innerHTML = `
        <p id="drop-text" class="text-gray-500">Drag and drop an image or click to select</p>
    `;
  previewArea.innerHTML = "";
}

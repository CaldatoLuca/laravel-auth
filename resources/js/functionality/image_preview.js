let imageElement = document.querySelector("#upload-image");
let imagePreview = document.querySelector("#image-preview");
let hasImage = document.querySelector(".has-image");
hasImage.innerHTML = "No Image Selected";
imagePreview.innerHTML = '<i class="fa-solid fa-x"></i>';

imageElement.addEventListener("change", function () {
    const file = this.files[0]; // Ottieni il primo file selezionato
    if (file) {
        const reader = new FileReader(); // Crea un oggetto FileReader

        reader.onload = function (event) {
            // L'evento onload viene chiamato quando il file è stato letto
            const imageUrl = event.target.result; // Ottieni l'URL dell'immagine
            imagePreview.innerHTML = `<img class="image rounded-2" src="${imageUrl}" alt="Anteprima dell'immagine">`; // Mostra l'anteprima dell'immagine
        };

        reader.readAsDataURL(file); // Leggi il file come URL di dati
        hasImage.innerHTML = "Image Preview";
        imagePreview.classList.remove(
            "image-placeholder",
            "align-items-center",
            "bg-danger",
            "rounded-2"
        );
        imagePreview.classList.add("overflow-hidden", "image-show");
    } else {
        imagePreview.innerHTML = ""; // Pulisci l'anteprima se nessun file è selezionato
        hasImage.innerHTML = "No Image Selected";
        imagePreview.innerHTML = '<i class="fa-solid fa-x"></i>';
        imagePreview.classList.remove("overflow-hidden", "image-show");
        imagePreview.classList.add(
            "image-placeholder",
            "align-items-center",
            "bg-danger"
        );
    }
});

//immagine
//rounded-2 overflow-hidden image-show

//placeholder
//image-placeholder d-flex justify-content-center align-items-center rounded-2 bg-danger

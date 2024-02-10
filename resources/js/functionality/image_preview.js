let imageElement = document.querySelector("#upload-image");
let imagePreview = document.querySelector("#image-preview");

imageElement.addEventListener("change", function () {
    const file = this.files[0]; // Ottieni il primo file selezionato
    if (file) {
        const reader = new FileReader(); // Crea un oggetto FileReader

        reader.onload = function (event) {
            // L'evento onload viene chiamato quando il file è stato letto
            const imageUrl = event.target.result; // Ottieni l'URL dell'immagine
            imagePreview.innerHTML = `<img src="${imageUrl}" alt="Anteprima dell'immagine">`; // Mostra l'anteprima dell'immagine
        };

        reader.readAsDataURL(file); // Leggi il file come URL di dati
    } else {
        imagePreview.innerHTML = ""; // Pulisci l'anteprima se nessun file è selezionato
    }
});

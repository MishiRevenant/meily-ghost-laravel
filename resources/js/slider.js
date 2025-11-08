// NO se necesita DOMContentLoaded.
let current = 0;
const slides = document.querySelectorAll('.slide');
const nextButton = document.getElementById('next');
const prevButton = document.getElementById('prev');

// Función para mover el slide
function move(dir) {
    // Solo si hay slides
    if (slides.length === 0) return;
    
    // Oculta el slide actual
    slides[current].classList.remove('active');
    
    // Calcula el nuevo slide
    current = (current + dir + slides.length) % slides.length;
    
    // Muestra el nuevo slide
    slides[current].classList.add('active');
}

// --- Código de ejecución ---

// Solo si los elementos del slider existen en esta página
if (slides.length > 0 && nextButton && prevButton) {
    
    // 1. Asigna los clics a los botones
    nextButton.onclick = () => move(1);
    prevButton.onclick = () => move(-1);

    // 2. Inicia el auto-slider
    setInterval(() => move(1), 5000);

    // 3. (Importante) Asegúrate de que el primer slide sea visible al cargar
    if(slides[current]) {
        slides[current].classList.add('active');
    }
}
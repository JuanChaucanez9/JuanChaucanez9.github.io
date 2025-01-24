document.addEventListener("DOMContentLoaded", function() {
    const loader = document.getElementById('loader');
    const content = document.getElementById('content');

    // Simula una carga de contenido
    setTimeout(function() {
        loader.style.display = 'none';
        content.style.display = 'block';
    }, 3000);



});

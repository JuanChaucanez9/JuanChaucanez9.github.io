window.addEventListener('scroll', function() {
    const images = document.querySelectorAll('.target-image');
    let colorClass = '';

    images.forEach(image => {
        const rect = image.getBoundingClientRect();
        const isVisible = rect.top >= 0 && rect.bottom <= window.innerHeight;

        if (isVisible) {
            colorClass = image.dataset.colorClass;
            image.classList.add('zoom');
        } else {
            image.classList.remove('zoom');
        }
    });

    document.body.className = colorClass ? colorClass : '';
});
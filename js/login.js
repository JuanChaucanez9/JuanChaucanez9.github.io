document.getElementById('login-form').addEventListener('submit', function(event) {
    event.preventDefault();

    var formData = new FormData(this);

    fetch('../php/login.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = 'perfil.html';
        } else {
            var errorMessage = document.getElementById('error-message');
            errorMessage.textContent = data.message;
            errorMessage.style.display = 'block';
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});

// Verificar la sesión al cargar la página
document.addEventListener('DOMContentLoaded', function() {
    fetch('../php/check_session.php')
    .then(response => response.json())
    .then(data => {
        if (data.loggedIn) {
            window.location.href = 'perfil.html';
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
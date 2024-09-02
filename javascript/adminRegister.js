document.addEventListener('DOMContentLoaded', () => {
    const adminRegisterForm = document.getElementById('adminRegisterForm');
    const errorMessage = document.getElementById('error-message');

    adminRegisterForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(adminRegisterForm);

        fetch('../php/adminRegister.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = '../templates/index.html';
            } else {
                errorMessage.textContent = data.message;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            errorMessage.textContent = 'An error occurred. Please try again later.';
        });
    });
});

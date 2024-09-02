document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');
    const successMessage = document.querySelector('#successMessage');

    form.addEventListener('submit', (event) => {
        const password = form.querySelector('input[name="password"]').value;
        const confirmPassword = form.querySelector('input[name="confirm_password"]').value;

        if (!password || !confirmPassword) {
            event.preventDefault();
            alert('Both password fields are required!');
        } else if (password !== confirmPassword) {
            event.preventDefault();
            alert('Passwords do not match!');
        } else {
            // Assuming the form submission is successful
            successMessage.textContent = 'Password Updated Successfully!';
            successMessage.style.display = 'block';
        }
    });
});

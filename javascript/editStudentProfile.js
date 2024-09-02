document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');

    form.addEventListener('submit', (event) => {
        const name = form.querySelector('input[name="name"]').value;
        const address = form.querySelector('input[name="address"]').value;
        const section = form.querySelector('input[name="section"]').value;
        const gender = form.querySelector('input[name="gender"]').value;
        const email = form.querySelector('input[name="email"]').value;
        const contactNumber = form.querySelector('input[name="contactNumber"]').value;

        if (!name || !address || !section || !gender || !email || !contactNumber) {
            event.preventDefault();
            alert('All fields are required!');
        } 
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.querySelector('.sidebar');
    const content = document.querySelector('.content');

    sidebarToggle.addEventListener('click', function () {
        if (sidebar.classList.contains('show')) {
            sidebar.classList.remove('show');
            sidebar.classList.add('hide');
            content.classList.remove('shifted');
            sidebarToggle.textContent = '>'; // Change icon to '>'
        } else {
            sidebar.classList.remove('hide');
            sidebar.classList.add('show');
            content.classList.add('shifted');
            sidebarToggle.textContent = '<'; // Change icon to '<'
        }
    });
});

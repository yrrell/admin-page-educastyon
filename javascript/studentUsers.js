document.addEventListener('DOMContentLoaded', () => {
    fetch('../php/getStudentUsers.php')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector('#studentsTable tbody');
            tableBody.innerHTML = ''; // Clear any existing data

            data.forEach(user => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${user.id}</td>
                    <td class="stuNumber"><a href="../templates/viewStudentProfile.html?studentNum=${user.studentNum}">${user.studentNum}</a></td>
                    <td>${user.password}</td>
                    <td>
                        <a href="../php/editStudentUser.php?studentNum=${user.studentNum}" class="edit">Edit</a>
                        <a href="#" class="delete" data-id="${user.studentNum}">Delete</a>
                    </td>
                `;
                tableBody.appendChild(row);
            });

            // Add event listener for delete buttons
            document.querySelectorAll('.delete').forEach(deleteBtn => {
                deleteBtn.addEventListener('click', function(event) {
                    event.preventDefault();
                    const studentId = this.getAttribute('data-id');
                    showDeleteConfirmation(studentId);
                });
            });
        })
        .catch(error => console.error('Error fetching student user:', error));
});

function showDeleteConfirmation(studentId) {
    // Create the confirmation dialog
    const confirmationDialog = document.createElement('div');
    confirmationDialog.classList.add('confirmation-dialog');
    confirmationDialog.innerHTML = `
        <div class="dialog-content">
            <p>Are you sure you want to delete this student?</p>
            <button id="confirmDelete">Delete</button>
            <button id="cancelDelete">Cancel</button>
        </div>
    `;
    document.body.appendChild(confirmationDialog);

    // Add event listeners for the buttons
    document.getElementById('confirmDelete').addEventListener('click', () => {
        window.location.href = `../php/deleteStudentUser.php?id=${studentNum}`;
    });

    document.getElementById('cancelDelete').addEventListener('click', () => {
        document.body.removeChild(confirmationDialog);
    });
}
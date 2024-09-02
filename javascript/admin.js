document.addEventListener('DOMContentLoaded', () => {
    fetch('../php/getStudentProfiles.php')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector('#studentsTable tbody');
            tableBody.innerHTML = ''; // Clear any existing data

            data.forEach(profile => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${profile.id}</td>
                    <td>${profile.studentNum}</td>
                    <td>${profile.name}</td>
                    <td>${profile.address}</td>
                    <td>${profile.section}</td>
                    <td>${profile.gender}</td>
                    <td>${profile.email}</td>
                    <td>${profile.contactNumber}</td>
                    <td>
                        <a href="../php/editStudentProfile.php?id=${profile.id}" class="edit">Edit</a>
                        <a href="#" class="delete" data-id="${profile.id}">Delete</a>
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
        .catch(error => console.error('Error fetching student profiles:', error));
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
        window.location.href = `../php/deleteStudentProfile.php?id=${studentId}`;
    });

    document.getElementById('cancelDelete').addEventListener('click', () => {
        document.body.removeChild(confirmationDialog);
    });
}

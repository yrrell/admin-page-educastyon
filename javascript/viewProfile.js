// viewProfile.js
document.addEventListener("DOMContentLoaded", function() {
    const params = new URLSearchParams(window.location.search);
    const studentNum = params.get('studentNum');

    if (!studentNum) {
        document.querySelector('#profileDetails').innerHTML = '<p>Student number is missing.</p>';
        return;
    }

    fetch(`../php/viewStudentProfile.php?studentNum=${studentNum}`)
        .then(response => response.json())
        .then(data => {
            const profileDetails = document.querySelector('#profileDetails');
            if (data.error) {
                profileDetails.innerHTML = `<p>${data.error}</p>`;
            } else {
                profileDetails.innerHTML = `
                    <img src="../uploads/${data.picture}" alt="Profile Picture" class="profile-pic">  
                    <p><strong>Student Number:</strong> ${data.studentNum}</p>
                    <p><strong>Name:</strong> ${data.name}</p>
                    <p><strong>Address:</strong> ${data.address}</p>
                    <p><strong>Section:</strong> ${data.section}</p>
                    <p><strong>Gender:</strong> ${data.gender}</p>
                    <p><strong>Email:</strong> ${data.email}</p>
                    <p><strong>Contact Number:</strong> ${data.contactNumber}</p>
                `;
            }
        })
        .catch(error => console.error('Error:', error));
});

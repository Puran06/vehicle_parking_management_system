document.addEventListener('DOMContentLoaded', function() {
  const usersTableBody = document.getElementById('users-table-body');
  const addUserForm = document.getElementById('add-user-form');
  const editUserFormContainer = document.getElementById('edit-user-form-container');

  // Fetch users from the server and populate the table
  function fetchUsers() {
    fetch('users.php')
      .then(response => response.json())
      .then(data => {
        let tableRows = '';

        data.forEach(user => {
          tableRows += `
            <tr>
              <td>${user.id}</td>
              <td>${user.name}</td>
              <td>${user.email}</td>
              <td>${user.password}</td>
              <td>${user.phone}</td>
              <td>
                <button class="edit-btn" data-id="${user.id}">Edit</button>
                <button class="delete-btn" data-id="${user.id}">Delete</button>
              </td>
            </tr>
          `;
        });

        usersTableBody.innerHTML = tableRows;
      })
      .catch(error => {
        console.error('Error:', error);
      });
  }

  // Handle form submission for adding a user
  addUserForm.addEventListener('submit', function(event) {
    event.preventDefault();

    const name = document.getElementById('user-name').value;
    const email = document.getElementById('user-email').value;
    const password = document.getElementById('user-password').value;
    const phone = document.getElementById('user-phone').value;

    const formData = new FormData();
    formData.append('name', name);
    formData.append('email', email);
    formData.append('password', password);
    formData.append('phone', phone);

    fetch('users.php', {
      method: 'POST',
      body: formData
    })
      .then(response => response.text())
      .then(data => {
        console.log(data);
        fetchUsers();
        addUserForm.reset();
      })
      .catch(error => {
        console.error('Error:', error);
      });
  });

  // Handle click events on the edit and delete buttons
  usersTableBody.addEventListener('click', function(event) {
    const target = event.target;
    const isEditButton = target.classList.contains('edit-btn');
    const isDeleteButton = target.classList.contains('delete-btn');

    if (isEditButton) {
      const userId = target.dataset.id;
      showEditUserForm(userId);
    } else if (isDeleteButton) {
      const userId = target.dataset.id;
      deleteUser(userId);
    }
  });

  // Edit user
function editUser(userId) {
  const users = document.getElementById("users-table").querySelectorAll("tbody tr");
  
  // Find the row corresponding to the user ID
  const userRow = Array.from(users).find(row => row.dataset.id === userId);
  
  if (userRow) {
    const name = userRow.cells[0].textContent;
    const email = userRow.cells[1].textContent;
    const password = userRow.cells[2].textContent;
    const phone = userRow.cells[3].textContent;
    
    const editedName = prompt("Enter the updated name:", name);
    const editedEmail = prompt("Enter the updated email:", email);
    const editedPassword = prompt("Enter the updated password:", password);
    const editedPhone = prompt("Enter the updated phone number:", phone);
    
    // Update the table with the edited data
    if (editedName && editedEmail && editedPassword && editedPhone) {
      userRow.cells[0].textContent = editedName;
      userRow.cells[1].textContent = editedEmail;
      userRow.cells[2].textContent = editedPassword;
      userRow.cells[3].textContent = editedPhone;
      
      // Send the updated data to the server via an AJAX request to save it in the database
      const formData = new FormData();
      formData.append("id", userId);
      formData.append("name", editedName);
      formData.append("email", editedEmail);
      formData.append("password", editedPassword);
      formData.append("phone", editedPhone);
      
      fetch("users.php", {
        method: "POST",
        body: formData
      })
        .then(response => response.text())
        .then(data => {
          console.log(data);
        })
        .catch(error => {
          console.error('Error:', error);
        });
    } else {
      alert("Please provide valid values for all fields.");
    }
  }
}


  // Delete a user
  function deleteUser(userId) {
    fetch(`users.php?id=${userId}`, {
      method: 'DELETE'
    })
      .then(response => response.text())
      .then(data => {
        console.log(data);
        fetchUsers();
      })
      .catch(error => {
        console.error('Error:', error);
      });
  }

  // Fetch users on page load
  fetchUsers();
});

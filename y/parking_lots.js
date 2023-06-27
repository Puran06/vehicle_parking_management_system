document.addEventListener('DOMContentLoaded', function() {
    const parkingLotsTableBody = document.getElementById('parking-lots-table-body');
    const addParkingLotForm = document.getElementById('add-parking-lot-form');
    const editParkingLotFormContainer = document.getElementById('edit-parking-lot-form-container');
  
    // Fetch parking lots from the server and populate the table
    function fetchParkingLots() {
      fetch('parking_lots.php')
        .then(response => response.json())
        .then(data => {
          let tableRows = '';
  
          data.forEach(parkingLot => {
            tableRows += `
              <tr>
                <td>${parkingLot.id}</td>
                <td>${parkingLot.name}</td>
                <td>${parkingLot.location}</td>
                <td>${parkingLot.slots}</td>
                <td>
                  <button class="edit-btn" data-id="${parkingLot.id}">Edit</button>
                  <button class="delete-btn" data-id="${parkingLot.id}">Delete</button>
                </td>
              </tr>
            `;
          });
  
          parkingLotsTableBody.innerHTML = tableRows;
        })
        .catch(error => {
          console.error('Error:', error);
        });
    }
  
    // Handle form submission for adding a parking lot
    addParkingLotForm.addEventListener('submit', function(event) {
      event.preventDefault();
  
      const name = document.getElementById('parking-lot-name').value;
      const location = document.getElementById('parking-lot-location').value;
      const slots = document.getElementById('parking-lot-slots').value;
  
      const formData = new FormData();
      formData.append('name', name);
      formData.append('location', location);
      formData.append('slots', slots);
  
      fetch('parking_lots.php', {
        method: 'POST',
        body: formData
      })
        .then(response => response.text())
        .then(data => {
          console.log(data);
          fetchParkingLots();
          addParkingLotForm.reset();
        })
        .catch(error => {
          console.error('Error:', error);
        });
    });
  
    // Handle click events on the edit and delete buttons
    parkingLotsTableBody.addEventListener('click', function(event) {
      const target = event.target;
      const isEditButton = target.classList.contains('edit-btn');
      const isDeleteButton = target.classList.contains('delete-btn');
  
      if (isEditButton) {
        const parkingLotId = target.dataset.id;
        showEditParkingLotForm(parkingLotId);
      } else if (isDeleteButton) {
        const parkingLotId = target.dataset.id;
        deleteParkingLot(parkingLotId);
      }
    });
  
    // Show the edit parking lot form
    function showEditParkingLotForm(parkingLotId) {
      // Fetch parking lot details for the given ID
      fetch(`parking_lots.php?id=${parkingLotId}`)
        .then(response => response.json())
        .then(data => {
          const editParkingLotForm = document.createElement('form');
          editParkingLotForm.id = 'edit-parking-lot-form';
          editParkingLotForm.innerHTML = `
            <h3>Edit Parking Lot</h3>
            <input type="hidden" name="id" value="${data.id}">
            <label for="edit-parking-lot-name">Name:</label>
            <input type="text" id="edit-parking-lot-name" name="name" value="${data.name}" required>
            <label for="edit-parking-lot-location">Location:</label>
            <input type="text" id="edit-parking-lot-location" name="location" value="${data.location}" required>
            <label for="edit-parking-lot-slots">Slots:</label>
            <input type="number" id="edit-parking-lot-slots" name="slots" value="${data.slots}" required>
            <button type="submit">Save</button>
          `;
  
          editParkingLotForm.addEventListener('submit', function(event) {
            event.preventDefault();
  
            const editedName = document.getElementById('edit-parking-lot-name').value;
            const editedLocation = document.getElementById('edit-parking-lot-location').value;
            const editedSlots = document.getElementById('edit-parking-lot-slots').value;
  
            const formData = new FormData();
            formData.append('id', parkingLotId);
            formData.append('name', editedName);
            formData.append('location', editedLocation);
            formData.append('slots', editedSlots);
  
            fetch('parking_lots.php', {
              method: 'POST',
              body: formData
            })
              .then(response => response.text())
              .then(data => {
                console.log(data);
                fetchParkingLots();
                editParkingLotFormContainer.innerHTML = '';
              })
              .catch(error => {
                console.error('Error:', error);
              });
          });
  
          editParkingLotFormContainer.innerHTML = '';
          editParkingLotFormContainer.appendChild(editParkingLotForm);
        })
        .catch(error => {
          console.error('Error:', error);
        });
    }
  
    // Delete a parking lot
    function deleteParkingLot(parkingLotId) {
      fetch(`parking_lots.php?id=${parkingLotId}`, {
        method: 'DELETE'
      })
        .then(response => response.text())
        .then(data => {
          console.log(data);
          fetchParkingLots();
        })
        .catch(error => {
          console.error('Error:', error);
        });
    }
  
    // Fetch parking lots on page load
    fetchParkingLots();
  });
  
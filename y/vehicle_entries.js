document.addEventListener('DOMContentLoaded', function() {
    const vehicleEntriesTableBody = document.getElementById('vehicle-entries-table-body');
    const addVehicleEntryForm = document.getElementById('add-vehicle-entry-form');
    const editVehicleEntryFormContainer = document.getElementById('edit-vehicle-entry-form-container');
  
    // Fetch vehicle entries from the server and populate the table
    function fetchVehicleEntries() {
      fetch('vehicle_entries.php')
        .then(response => response.json())
        .then(data => {
          let tableRows = '';
  
          data.forEach(vehicleEntry => {
            tableRows += `
              <tr>
                <td>${vehicleEntry.id}</td>
                <td>${vehicleEntry.vehicle_number}</td>
                <td>${vehicleEntry.entry_time}</td>
                <td>${vehicleEntry.parking_lot}</td>
                <td>${vehicleEntry.parking_slot}</td>
                <td>${vehicleEntry.exit_time}</td>
                <td>
                  <button class="edit-btn" data-id="${vehicleEntry.id}">Edit</button>
                  <button class="delete-btn" data-id="${vehicleEntry.id}">Delete</button>
                </td>
              </tr>
            `;
          });
  
          vehicleEntriesTableBody.innerHTML = tableRows;
        })
        .catch(error => {
          console.error('Error:', error);
        });
    }
  
    // Handle form submission for adding a vehicle entry
    addVehicleEntryForm.addEventListener('submit', function(event) {
      event.preventDefault();
  
      const vehicleNumber = document.getElementById('vehicle-number').value;
      const entryTime = document.getElementById('entry-time').value;
      const parkingLot = document.getElementById('parking-lot').value;
      const parkingSlot = document.getElementById('parking-slot').value;
      const exitTime = document.getElementById('exit-time').value;
  
      const formData = new FormData();
      formData.append('vehicle_number', vehicleNumber);
      formData.append('entry_time', entryTime);
      formData.append('parking_lot', parkingLot);
      formData.append('parking_slot', parkingSlot);
      formData.append('exit_time', exitTime);
  
      fetch('vehicle_entries.php', {
        method: 'POST',
        body: formData
      })
        .then(response => response.text())
        .then(data => {
          console.log(data);
          fetchVehicleEntries();
          addVehicleEntryForm.reset();
        })
        .catch(error => {
          console.error('Error:', error);
        });
    });
  
    // Handle click events on the edit and delete buttons
    vehicleEntriesTableBody.addEventListener('click', function(event) {
      const target = event.target;
      const isEditButton = target.classList.contains('edit-btn');
      const isDeleteButton = target.classList.contains('delete-btn');
  
      if (isEditButton) {
        const vehicleEntryId = target.dataset.id;
        showEditVehicleEntryForm(vehicleEntryId);
      } else if (isDeleteButton) {
        const vehicleEntryId = target.dataset.id;
        deleteVehicleEntry(vehicleEntryId);
      }
    });
  
    function showEditVehicleEntryForm(vehicleEntryId) {
      // Implement the logic to display the edit form for a specific vehicle entry
      // You can use the "vehicleEntryId" to fetch the existing data and pre-fill the form fields
      // Update the server-side PHP code to handle the update operation for vehicle entries
    }
  
    function deleteVehicleEntry(vehicleEntryId) {
      fetch(`vehicle_entries.php?id=${vehicleEntryId}`, {
        method: 'DELETE'
      })
        .then(response => response.text())
        .then(data => {
          console.log(data);
          fetchVehicleEntries();
        })
        .catch(error => {
          console.error('Error:', error);
        });
    }
  
    // Fetch vehicle entries on page load
    fetchVehicleEntries();
  });
  
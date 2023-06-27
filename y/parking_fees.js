document.addEventListener('DOMContentLoaded', function() {
    const parkingFeesTableBody = document.getElementById('parking-fees-table-body');
  
    // Fetch parking fees from the server and populate the table
    function fetchParkingFees() {
      fetch('vehicle_entries.php')
        .then(response => response.json())
        .then(data => {
          let tableRows = '';
  
          data.forEach(vehicleEntry => {
            const { id, vehicle_number, parking_lot, parking_slot, entry_time, exit_time } = vehicleEntry;
            const total_time = calculateTotalTime(entry_time, exit_time);
            const total_cost = calculateTotalCost(total_time);
  
            tableRows += `
              <tr>
                <td>${id}</td>
                <td>${vehicle_number}</td>
                <td>${parking_lot}</td>
                <td>${parking_slot}</td>
                <td>${entry_time}</td>
                <td>${exit_time}</td>
                <td>${total_time}</td>
                <td>${total_cost}</td>
                <td>
                  <button class="delete-btn" data-id="${id}">Delete</button>
                </td>
              </tr>
            `;
          });
  
          parkingFeesTableBody.innerHTML = tableRows;
        })
        .catch(error => {
          console.error('Error:', error);
        });
    }
  
    // Calculate total time in hours based on entry and exit times
    function calculateTotalTime(entryTime, exitTime) {
      const entryDate = new Date(entryTime);
      const exitDate = new Date(exitTime);
      const totalTimeInMilliseconds = exitDate - entryDate;
      const totalTimeInHours = totalTimeInMilliseconds / (1000 * 60 * 60);
      return totalTimeInHours.toFixed(2);
    }
  
    // Calculate total cost based on total time
    function calculateTotalCost(totalTime) {
      const hourlyRate = 10; // Replace with your hourly rate
      const totalCost = totalTime * hourlyRate;
      return totalCost.toFixed(2);
    }
  
    // Handle click events on the delete button
    parkingFeesTableBody.addEventListener('click', function(event) {
      const target = event.target;
      const isDeleteButton = target.classList.contains('delete-btn');
  
      if (isDeleteButton) {
        const parkingFeeId = target.dataset.id;
        deleteParkingFee(parkingFeeId);
      }
    });
  
    function deleteParkingFee(parkingFeeId) {
      fetch(`vehicle_entries.php?id=${parkingFeeId}`, {
        method: 'DELETE'
      })
        .then(response => response.text())
        .then(data => {
          console.log(data);
          fetchParkingFees();
        })
        .catch(error => {
          console.error('Error:', error);
        });
    }
  
    // Fetch parking fees on page load
    fetchParkingFees();
  });
  
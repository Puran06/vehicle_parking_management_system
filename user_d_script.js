function toggleVisibility(elementId) {
  var element = document.getElementById(elementId);
  if (element.style.display === 'none') {
    element.style.display = 'block';
  } else {
    element.style.display = 'none';
  }
}

function checkAvailability() {
  var resultElement = document.getElementById('status-result');
  resultElement.innerHTML = 'Available';
}

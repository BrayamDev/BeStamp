function openModal(id) {
  document.getElementById('itemId').value = id;
  document.getElementById('myModal').style.display = "block";
}

function closeModal() {
  document.getElementById('myModal').style.display = "none";
}

// Cerrar el modal cuando el usuario haga clic en la "x"
document.getElementsByClassName("close")[0].onclick = function() {
  closeModal();
}

// Cerrar el modal cuando el usuario haga clic fuera del modal
window.onclick = function(event) {
  if (event.target == document.getElementById('myModal')) {
      closeModal();
  }
}
function showDelivery() {
  document.getElementById("delivery-section").style.display = "block";
  document.getElementById("delivery-btn").classList.add("btn-primary");
  document
    .getElementById("delivery-btn")
    .classList.remove("btn-outline-secondary");
  document.getElementById("pickup-btn").classList.remove("btn-primary");
  document.getElementById("pickup-btn").classList.add("btn-outline-secondary");
}

function showPickup() {
  document.getElementById("delivery-section").style.display = "none";
  document.getElementById("pickup-btn").classList.add("btn-primary");
  document
    .getElementById("pickup-btn")
    .classList.remove("btn-outline-secondary");
  document.getElementById("delivery-btn").classList.remove("btn-primary");
  document
    .getElementById("delivery-btn")
    .classList.add("btn-outline-secondary");
}

document.addEventListener("DOMContentLoaded", showDelivery);

console.log("asdad");
const items = document.querySelectorAll(".accordion button");
function toggleAccordion() {
  console.log("insixe func");
  const itemToggle = this.getAttribute("aria-expanded");
  for (i = 0; i < items.length; i++) {
    console.log("insixe func false");
    items[i].setAttribute("aria-expanded", "false");
  }
  if (itemToggle == "false") {
    console.log("insixe true");
    this.setAttribute("aria-expanded", "true");
  }
}
items.forEach((item) => item.addEventListener("click", toggleAccordion));

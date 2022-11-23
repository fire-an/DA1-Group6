src = "https://cdn.tailwindcss.com";
const activeImage = document.querySelector(".product-image .active");
const productImages = document.querySelectorAll(".image-list img");
const navItem = document.querySelector("a.toggle-nav");

function changeImage(e) {
  activeImage.src = e.target.src;
}

function toggleNavigation() {
  this.nextElementSibling.classList.toggle("active");
}

productImages.forEach((image) => image.addEventListener("click", changeImage));
navItem.addEventListener("click", toggleNavigation);

function cong() {
  // lấy giá trị của textbox
  var t = document.getElementById("textbox").value;
  //công thêm đơn vị vào textbox
  document.getElementById("textbox").value = parseInt(t) + 1;
}
function tru() {
  var t = document.getElementById("textbox").value;
  if (parseInt(t) > 1) {
    document.getElementById("textbox").value = parseInt(t) - 1;
  }
}

let current = 0;
let slides = document.querySelectorAll(".slide");
let dotsContainer = document.querySelector(".dots");


slides.forEach((_, i) => {
  let dot = document.createElement("div");
  dot.onclick = () => goToSlide(i);
  dotsContainer.appendChild(dot);
});

let dots = document.querySelectorAll(".dots div");

function updateSlider() {
  slides.forEach(s => s.classList.remove("active"));
  dots.forEach(d => d.classList.remove("active"));

  slides[current].classList.add("active");
  dots[current].classList.add("active");
}

function nextSlide() {
  current = (current + 1) % slides.length;
  updateSlider();
}

function prevSlide() {
  current = (current - 1 + slides.length) % slides.length;
  updateSlider();
}

function goToSlide(i) {
  current = i;
  updateSlider();
}

setInterval(nextSlide, 6000);
updateSlider();

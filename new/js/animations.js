document.addEventListener("DOMContentLoaded", function () {
  const elements = document.querySelectorAll(".fade-slide-left, .fade-slide-right");

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add("fade-show");
        observer.unobserve(entry.target); // animate only once
      }
    });
  }, { threshold: 0.1 });

  elements.forEach(el => observer.observe(el));
});

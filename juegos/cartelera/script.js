const coverFlow = document.getElementById("drag");

let isDragging = false;
let startX;
let scrollLeft;

coverFlow.addEventListener("mousedown", (e) => {
    isDragging = true;
    coverFlow.classList.add("active");
    startX = e.pageX - coverFlow.offsetLeft;
    scrollLeft = coverFlow.scrollLeft;
});

coverFlow.addEventListener("mouseleave", () => {
    isDragging = false;
    coverFlow.classList.remove("active");
});

coverFlow.addEventListener("mouseup", () => {
    isDragging = false;
    coverFlow.classList.remove("active");
});

coverFlow.addEventListener("mousemove", (e) => {
    if (!isDragging) return;
    e.preventDefault();
    const x = e.pageX - coverFlow.offsetLeft;
    const walk = (x - startX) * 2; // Adjust scroll speed by changing the multiplier
    coverFlow.scrollLeft = scrollLeft - walk;
});

// Support for touch devices
coverFlow.addEventListener("touchstart", (e) => {
    isDragging = true;
    startX = e.touches[0].pageX - coverFlow.offsetLeft;
    scrollLeft = coverFlow.scrollLeft;
});

coverFlow.addEventListener("touchend", () => {
    isDragging = false;
});

coverFlow.addEventListener("touchmove", (e) => {
    if (!isDragging) return;
    const x = e.touches[0].pageX - coverFlow.offsetLeft;
    const walk = (x - startX) * 2;
    coverFlow.scrollLeft = scrollLeft - walk;
});

const displayedImage = document.querySelector(".displayed-img");
const thumbBar = document.querySelector(".thumb-bar");

const btn = document.querySelector("button");
const overlay = document.querySelector(".overlay");

/* Declaring the array of image filenames */
/* Declaring the alternative text for each image file */
const imgs = [
  { src: "images/pic1.jpg", alt: "pic1" },
  { src: "images/pic2.jpg", alt: "pic2" },
  { src: "images/pic3.jpg", alt: "pic3" },
  { src: "images/pic4.jpg", alt: "pic4" },
  { src: "images/pic5.jpg", alt: "pic5" },
];

/* Looping through images */
for (const img of imgs) {
  const newImage = document.createElement("img");
  newImage.setAttribute("src", img.src);
  newImage.setAttribute("alt", img.alt);
  newImage.addEventListener("click", () => {
    displayedImage.setAttribute("src", img.src);
    displayedImage.setAttribute("alt", img.alt);
  });
  thumbBar.appendChild(newImage);
}

/* Wiring up the Darken/Lighten button */
btn.addEventListener("click", () => {
  if (btn.getAttribute("class") == "dark") {
    btn.setAttribute("class","light");
    btn.textContent = "Lighten";
    overlay.style.backgroundColor ="rgb(0 0 0 / 50%)";
  } else {
    btn.setAttribute("class","dark");
    btn.textContent = "Darken";
    overlay.style.backgroundColor ="rgb(0 0 0 / 0%)";
  }
});

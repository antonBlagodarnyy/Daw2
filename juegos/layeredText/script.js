const text = document.getElementById("text");
let interval;
let click = true;

function getLayers() {
  if (click) {
    let shadowSize = 3;
    let shadows = ""; // Initialize an empty string for the shadow layers.

    interval = setInterval(() => {
      let direction = Math.floor(Math.random() * 4);
      let color = getRandomColor();
      let newShadow;
      switch (direction) {
        case 0:
          newShadow = `${shadowSize}px ${shadowSize}px 0px ${color}`;
          break;
        case 1:
          newShadow = `${-shadowSize}px ${shadowSize}px 0px ${color}`;
          break;
        case 2:
          newShadow = `${shadowSize}px ${-shadowSize}px 0px ${color}`;
          break;
        case 3:
          newShadow = `${-shadowSize}px ${-shadowSize}px 0px ${color}`;
          break;
        default:
          console.log("Error in switch");
      }

      // Add the new shadow to the shadows string, separating each layer with a comma.
      shadows += (shadows ? ", " : "") + newShadow;
      text.style.textShadow = shadows;

      shadowSize += 30;

      if (shadowSize > 300) {
        shadows = "";
        shadowSize = 0;
      }
    }, 100);

    if (shadows)
      // Accumulate shadow layers
      shadows += (shadows ? ", " : "") + newShadow;

    // Apply the accumulated shadows directly to text's textShadow property
    text.style.textShadow = shadows;
    click = false;
  } else{
	clearInterval(interval)
	click = true;
};
}

function getRandomColor() {
  const letters = "0123456789ABCDEF";
  let color = "#";
  for (let i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}

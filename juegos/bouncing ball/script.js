const main = document.querySelector(".main");
const ball = document.querySelector(".ball");

let leftRight = Math.floor(Math.random() * 2);
let right = leftRight ? true : false;

let upDown = Math.floor(Math.random() * 2);
let up = upDown ? true : false;

let velocity = 3;

let ballMove = setInterval(() => {
  let ballBounds = ball.getBoundingClientRect();
  let boardBounds = main.getBoundingClientRect();
  let ballBoundsLeft = parseInt(ballBounds.left);
  let ballBoundsRight = parseInt(ballBounds.right);
  let ballBoundsTop = parseInt(ballBounds.top);
  let ballBoundsBottom = parseInt(ballBounds.bottom);
  let ballTop = Math.floor(
    parseInt(window.getComputedStyle(ball).getPropertyValue("top"))
  );
  let ballLeft = Math.floor(
    parseInt(window.getComputedStyle(ball).getPropertyValue("left"))
  );

  if (right && up) {
    ball.style.background = "green";
    ball.style.top = ballTop - velocity + "px";
    ball.style.left = ballLeft + velocity + "px";
  }
  if (!right && up) {
    ball.style.top = ballTop - velocity + "px";
    ball.style.left = ballLeft - velocity + "px";
  }
  if (right && !up) {
    ball.style.top = ballTop + velocity + "px";
    ball.style.left = ballLeft + velocity + "px";
  }
  if (!right && !up) {
    ball.style.top = ballTop + velocity + "px";
    ball.style.left = ballLeft - velocity + "px";
  }

  if (ballBoundsTop <= boardBounds.top) {
    leftRight = Math.floor(Math.random() * 2);
    right = leftRight ? true : false;
    up = false;
  }
  if (ballBoundsBottom >= boardBounds.bottom) {
    leftRight = Math.floor(Math.random() * 2);
    right = leftRight ? true : false;
    up = true;
  }
  if (ballBoundsRight >= boardBounds.right) {
    right = false;
    upDown = Math.floor(Math.random() * 2);
    up = upDown ? true : false;
  }
  if (ballBoundsLeft <= boardBounds.left) {
    right = true;
    upDown = Math.floor(Math.random() * 2);
    up = upDown ? true : false;
  }
}, 1);

function getRandomColor() {
    // Generate random values for red, green, and blue
    const r = Math.floor(Math.random() * 256); // Random value from 0 to 255
    const g = Math.floor(Math.random() * 256); // Random value from 0 to 255
    const b = Math.floor(Math.random() * 256); // Random value from 0 to 255

    // Return the color in the format "rgb(r, g, b)"
    return `rgb(${r}, ${g}, ${b})`;
}
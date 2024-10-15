const canvas = document.querySelector("canvas");
const c = canvas.getContext("2d");

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

const mouse = {
  x: innerWidth / 2,
  y: innerHeight / 2,
};

const colors = ["#2185C5", "#7ECEFD", "#FFF6E5", "#FF7F66"];

// Event Listeners
addEventListener("mousemove", (event) => {
  mouse.x = event.clientX;
  mouse.y = event.clientY;
});

addEventListener("resize", () => {
  canvas.width = innerWidth;
  canvas.height = innerHeight;

  init();
});

// Objects
class Player {
  constructor(x, color, length) {
    this.x = x - length / 2;
    this.x2 = x + length / 2;
    this.y = canvas.height - 50;
    this.color = color;
    this.length = length;
  }
  draw() {
    c.lineWidth = 5;
    c.strokeStyle = this.color;
    c.beginPath();
    c.moveTo(this.x, this.y);
    c.lineTo(this.x2, this.y);
    c.stroke();
  }
  update() {
    this.x = mouse.x - this.length / 2;
    this.x2 = mouse.x + this.length / 2;
    this.draw();
  }
}

class Ball {
  constructor(x, y, color) {
    this.x = x;
    this.y = y;
    this.color = color;
    this.dx = 5;
    this.dy = 5;
  }
  draw() {
    c.fillStyle = this.color;
    c.beginPath();
    c.arc(this.x, this.y, 10, 0, 2 * Math.PI);
    c.fill();
  }
  update() {
    this.draw();
    this.x -= this.dx;
    this.y += this.dy;

    if (this.x > canvas.width || this.x < 0) {
      this.dx = -this.dx;
    }

    if (this.y < 0) {
      this.dy = -this.dy;
    }

    if (
      this.y == canvas.height - 50 &&
      this.x > player.x &&
      this.x < player.x2
    ) {
      this.dy = -this.dy;
    }
  }
}

class Brick {
  constructor(x, y, color, width, height) {
    this.x = x;
    this.y = y;
    this.color = color;
    this.width = width;
    this.height = height;
  }
  draw() {
    c.fillStyle = this.color;
    c.beginPath();
    c.rect(this.x, this.y, this.width, this.height);
    c.fill();
  }
}
// Implementation
let player;
let ball;
let bricks = [];

function init() {
  player = new Player(canvas.width / 2, "white", 200);
  ball = new Ball(canvas.width / 2, canvas.height / 2, "white");

  brickPositionX = 20;
  brickPositionY = 20;

  for (let i = 0; i < 10; i++) {
    for (let j = 0; j < 7; j++) {
      bricks.push(new Brick(brickPositionX, brickPositionY, "white", 80, 10));
      brickPositionX += 100;
    }
    brickPositionX= 20;
    brickPositionY += 30;
  }
}

// Animation Loop
function animate() {
  requestAnimationFrame(animate);
  c.clearRect(0, 0, canvas.width, canvas.height);
  player.update();
  ball.update();

  bricks.forEach(brick => {
    brick.draw();
  });
}

init();
animate();

function randomIntFromRange(min, max) {
  return Math.floor(Math.random() * (max - min + 1) + min);
}

function randomColor(colors) {
  return colors[Math.floor(Math.random() * colors.length)];
}

function distance(x1, y1, x2, y2) {
  const xDist = x2 - x1;
  const yDist = y2 - y1;

  return Math.sqrt(Math.pow(xDist, 2) + Math.pow(yDist, 2));
}

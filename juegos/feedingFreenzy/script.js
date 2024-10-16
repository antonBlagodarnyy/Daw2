let canvas = document.getElementById("canvas1");
let ctx = canvas.getContext("2d");
let restartBtn = document.getElementById("restartBtn");

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

let fadeValue = 0;
let backgroundFading = false; // To track if background is currently fading


//mouse
const mouse = {
  x: 0,
  y: 0,
};
window.addEventListener("mousemove", function (e) {
  mouse.x = e.x;
  mouse.y = e.y;
});

let gameFinished = false;

//Player
let player;

class Player {
  constructor(x, y, radius) {
    this.x = x;
    this.y = y;
    this.score = 0;
    this.lives = 4;
    this.radius = radius;
  }
  draw() {
    ctx.strokeStyle = "green";
    ctx.lineWidth = 5;
    ctx.beginPath();
    ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
    ctx.stroke();
  }
  drawScore() {
    ctx.fillStyle = "Black";
    ctx.font = "15px Verdana";
    ctx.fillText(`Score: ${this.score}`, 0, 15);
  }
  drawLives() {
    ctx.fillStyle = "Black";
    ctx.font = "15px Verdana";
    ctx.fillText(`Lives: ${this.lives}`, 200, 15);
  }
  update() {
    this.x = mouse.x;
    this.y = mouse.y;
    this.draw();
    this.drawScore();
    this.drawLives();

    if (this.lives <= 0) {
      gameFinished = true;
    }
  }
}

//Good particles
let goodParticles = [];

class goodParticle {
  constructor(x, y) {
    this.x = x;
    this.y = y;
    this.radius = 5;
    this.speedX = getRandomArbitrary(-4, 4);
    this.speedY = getRandomArbitrary(-4, 4);
  }
  draw() {
    ctx.strokeStyle = "blue";
    ctx.lineWidth = 5;
    ctx.beginPath();
    ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
    ctx.stroke();
  }
  update() {
    this.draw();
    this.onHit();
    this.movement();
  }
  onHit() {
    if (
      getDistance(mouse.x, mouse.y, this.x, this.y) <
      this.radius + player.radius
    ) {
      goodParticles = goodParticles.filter(
        (goodParticle) => goodParticle.x != this.x && goodParticle.y != this.y
      );
      goodParticles.push(
        new goodParticle(
          Math.floor(Math.random() * canvas.width),
          Math.floor(Math.random() * canvas.height)
        )
      );
      player.score++;
    }
  }
  movement() {
    //On hitting the walls, change direction
    if (this.x > innerWidth || this.x < 0) {
      this.speedX = -this.speedX;
    }
    if (this.y > innerHeight || this.y < 0) {
      this.speedY = -this.speedY;
    }

    //The actual movement increment
    this.x += this.speedX;
    this.y += this.speedY;
  }
}

//Bad particle
let badParticles = [];

class badParticle {
  constructor(x, y) {
    this.x = x;
    this.y = y;
    this.radius = 10;
    this.speedX = getRandomArbitrary(-2, 2);
    this.speedY = getRandomArbitrary(-2, 2);
  }
  draw() {
    ctx.strokeStyle = "red";
    ctx.lineWidth = 5;
    ctx.beginPath();
    ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
    ctx.stroke();
  }
  update() {
    this.draw();
    this.onHit();
    this.movement();
  }
  onHit() {
    if (
      getDistance(mouse.x, mouse.y, this.x, this.y) <
      this.radius + player.radius
    ) {
      badParticles = badParticles.filter(
        (badParticle) => badParticle.x != this.x && badParticle.y != this.y
      );
      badParticles.push(
        new badParticle(
          Math.floor(Math.random() * canvas.width),
          Math.floor(Math.random() * canvas.height)
        )
      );
      player.lives--;

       // Change background to red and start fading back to black
    document.body.style.backgroundColor = "red";
    fadeValue = 1; // Fully opaque red background
    backgroundFading = true; // Start fading process
    }
  }
  movement() {
    //On hitting the walls, change direction
    if (this.x > innerWidth || this.x < 0) {
      this.speedX = -this.speedX;
    }
    if (this.y > innerHeight || this.y < 0) {
      this.speedY = -this.speedY;
    }

    //The actual movement increment
    this.x += this.speedX;
    this.y += this.speedY;
  }
}
//Initialization
function init() {
  player = new Player(200, 200, 10);

  for (let i = 0; i < 3; i++) {
    goodParticles.push(
      new goodParticle(
        Math.floor(Math.random() * canvas.width),
        Math.floor(Math.random() * canvas.height)
      )
    );
  }
  for (let i = 0; i < 50; i++) {
    badParticles.push(
      new badParticle(
        Math.floor(Math.random() * canvas.width),
        Math.floor(Math.random() * canvas.height)
      )
    );
  }
}

//Animation
var animationId;

function animate() {
// Handle background fade from red to black
if (backgroundFading && fadeValue > 0) {
    fadeValue -= 0.01; // Decrease fade value
    const whiteValue = Math.floor(255 * (1 - fadeValue));  // Gradual transition from red to black
    document.body.style.backgroundColor = `rgb(255, ${whiteValue}, ${whiteValue})`; // Transition from red to white
    if (fadeValue <= 0) {
      backgroundFading = false; // Stop fading once fully back to black
      document.body.style.backgroundColor = "white"; // Reset to original background
    }
  }

    
  //Clear frame
  ctx.clearRect(0, 0, canvas.width, canvas.height);

  //Animate player
  player.update();

  //Animate good particles
  goodParticles.forEach((goodParticle) => {
    goodParticle.update();
  });

  //Animate bad particles
  badParticles.forEach((badParticle) => {
    badParticle.update();
  });
  if (!gameFinished) {
    requestAnimationFrame(animate);
  } else {
    ctx.fillStyle = "red";
    ctx.font = "50px Verdana";
    ctx.fillText("Game Over", canvas.width / 2 - 150, canvas.height / 2);

    // Show the restart button on game over
    restartBtn.style.display = "block";
  }
}

//Get distance
function getDistance(x1, y1, x2, y2) {
  let xDistance = x2 - x1;
  let yDistance = y2 - y1;
  return Math.sqrt(Math.pow(xDistance, 2) + Math.pow(yDistance, 2));
}

//Random number
function getRandomArbitrary(min, max) {
  return Math.random() * (max - min) + min;
}

//Restar game
document.getElementById("restartBtn").addEventListener("click", function () {
  gameFinished = false;
  player.lives = 4;
  player.score = 0;
  badParticles.length=0;
  goodParticles.length=0;
   restartBtn.style.display = "none";
  init();
  animate();

});

//Code run
init();
animate();

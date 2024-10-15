let canvas;
let ctx;

canvas = document.getElementById("canvas1");

canvas.height = window.innerHeight;
canvas.width = window.innerWidth;

ctx = canvas.getContext("2d");

let rayasGlobales = [];
let rayasMaximas = 4000;
let animationIds = [];
let globalSpeed = 20;
let globalLength =20;
let strokeStyle = getRandomColor();

class Raya {
  constructor(x, y, speed, direction) {
    this.rayaId = Math.floor(Math.random() * 100 + 1);
    this.x = x;
    this.y = y;
    this.speed = speed;
    this.direction = direction;
  }

  drawUpToDown() {
    ctx.strokeStyle = strokeStyle;
    ctx.lineWidth = 5;
    ctx.beginPath();
    ctx.moveTo(this.x, this.y);
    ctx.lineTo(this.x, this.y + globalLength);
    ctx.stroke();
  }
  drawDownToUp() {
    ctx.strokeStyle = strokeStyle;
    ctx.lineWidth = 5;
    ctx.beginPath();
    ctx.moveTo(this.x, this.y);
    ctx.lineTo(this.x, this.y - globalLength);
    ctx.stroke();
  }
  drawLeftToRight() {
    ctx.strokeStyle = strokeStyle;
    ctx.lineWidth = 5;
    ctx.beginPath();
    ctx.moveTo(this.x, this.y);
    ctx.lineTo(this.x + globalLength, this.y);
    ctx.stroke();
  }
  drawRightToLeft() {
    ctx.strokeStyle = strokeStyle;
    ctx.lineWidth = 5;
    ctx.beginPath();
    ctx.moveTo(this.x, this.y);
    ctx.lineTo(this.x - globalLength, this.y);
    ctx.stroke();
  }

  animateUpToDown() {
    this.drawUpToDown();
    this.y += this.speed;
    if (this.y > canvas.height) {
      rayasGlobales.filter((raya) => raya.rayaId !== this.rayaId);
      animateOne(crearRaya(globalSpeed));
      animateOne(crearRaya(globalSpeed));
      strokeStyle = getRandomColor();
    } else if (rayasGlobales.length > rayasMaximas) {
      restart();
    } else {
     const id =  requestAnimationFrame(this.animateUpToDown.bind(this));
     animationIds.push(id);
    }
  }
  animateDownToUp() {
    this.drawDownToUp();
    this.y -= this.speed;
    if (this.y < 0) {

      rayasGlobales.filter((raya) => raya.rayaId !== this.rayaId);
      animateOne(crearRaya(globalSpeed));
      animateOne(crearRaya(globalSpeed));
      strokeStyle = getRandomColor();
    } else if (rayasGlobales.length > rayasMaximas) {
      restart();
    } else {
     const id = requestAnimationFrame(this.animateDownToUp.bind(this));
      animationIds.push(id); 
    }
  }
  animateLeftToRight() {
    this.drawLeftToRight();
    this.x += this.speed;
    if (this.x > canvas.width) {

      rayasGlobales.filter((raya) => raya.rayaId !== this.rayaId);
      animateOne(crearRaya(globalSpeed));
      animateOne(crearRaya(globalSpeed));
      strokeStyle = getRandomColor();
    } else if (rayasGlobales.length > rayasMaximas) {
      restart();
    } else {
     const id =  requestAnimationFrame(this.animateLeftToRight.bind(this));
      animationIds.push(id);
    }
  }
  animateRightToLeft() {
    this.drawRightToLeft();
    this.x -= this.speed;
    if (this.x < 0) {

      rayasGlobales.filter((raya) => raya.rayaId !== this.rayaId);
      animateOne(crearRaya(globalSpeed));
      animateOne(crearRaya(globalSpeed));
      strokeStyle = getRandomColor();
    } else if (rayasGlobales.length > rayasMaximas) {
      restart();
    } else {
     const id =  requestAnimationFrame(this.animateRightToLeft.bind(this));
      animationIds.push(id);
    }
  }
}

crearRayas(1, globalSpeed);

animateAll(rayasGlobales);

function crearRayas(numRayas, velocidad) {
  for (let i = 0; i < numRayas; i++) {
    let direction = Math.floor(Math.random() * 4) + 1;
    let raya;
    switch (direction) {
      case 1:
        raya = new Raya(
          Math.floor(Math.random() * canvas.width),
          0,
          velocidad,
          direction
        );
        rayasGlobales.push(raya);
        //raya.animateUpToDown();
        break;
      case 2:
        raya = new Raya(
          Math.floor(Math.random() * canvas.width),
          canvas.height,
          velocidad,
          direction
        );
        rayasGlobales.push(raya);
        //raya.animateDownToUp();
        break;
      case 3:
        raya = new Raya(
          0,
          Math.floor(Math.random() * canvas.height),
          velocidad,
          direction
        );
        rayasGlobales.push(raya);
        //raya.animateLeftToRight();
        break;
      case 4:
        raya = new Raya(
          canvas.width,
          Math.floor(Math.random() * canvas.height),
          velocidad,
          direction
        );
        rayasGlobales.push(raya);
        //raya.animateRightToLeft();
        break;
      default:
        console.log("Valor en switch crear fuera de rango.");
    }
    return raya;
  }
}

function crearRaya(velocidad) {
  let newDirection = Math.floor(Math.random() * 4) + 1;
  let nuevaRaya;
  switch (newDirection) {
    case 1:
      nuevaRaya = new Raya(
        Math.floor(Math.random() * canvas.width),
        0,
        velocidad,
        newDirection
      );
      rayasGlobales.push(nuevaRaya);
      //raya.animateUpToDown();
      break;
    case 2:
      nuevaRaya = new Raya(
        Math.floor(Math.random() * canvas.width),
        canvas.height,
        velocidad,
        newDirection
      );
      rayasGlobales.push(nuevaRaya);
      //raya.animateDownToUp();
      break;
    case 3:
      nuevaRaya = new Raya(
        0,
        Math.floor(Math.random() * canvas.height),
        velocidad,
        newDirection
      );
      rayasGlobales.push(nuevaRaya);
      //raya.animateLeftToRight();
      break;
    case 4:
      nuevaRaya = new Raya(
        canvas.width,
        Math.floor(Math.random() * canvas.height),
        velocidad,
        newDirection
      );
      rayasGlobales.push(nuevaRaya);
      //raya.animateRightToLeft();
      break;
    default:
      console.log("Valor en switch crear fuera de rango.");
  }
  return nuevaRaya;
}

function animateOne(raya) {
  console.log(rayasGlobales.length);
  switch (raya.direction) {
    case 1:
      raya.animateUpToDown();
      break;
    case 2:
      raya.animateDownToUp();
      break;
    case 3:
      raya.animateLeftToRight();
      break;
    case 4:
      raya.animateRightToLeft();
      break;
    default:
      console.log("Valor en switch animateAll fuera de rango.");
  }
}

function animateAll(rayas) {
  rayas.forEach((raya) => {
    console.log(raya.direction);
    animateOne(raya);
  });
}

function restart() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  rayasGlobales.splice(0, rayasGlobales.length);
 animationIds.forEach((id) => cancelAnimationFrame(id));
 crearRayas(1, globalSpeed);
animateAll(rayasGlobales);
}

function getRandomColor() {
  // Generate a random number between 0 and 255 for each RGB component
  let letters = "0123456789ABCDEF";
  let color = "#";

  for (let i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }

  return color;
}

let canvas;
let ctx;

canvas = document.getElementById("canvas1");
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

ctx = canvas.getContext("2d");

let spirals = [];

class Spiral {
    constructor(x, y, radius, increment) {
        this.positionX = x;
        this.positionY = y;
        this.endAngle = 0; // Start angle
        this.angleIncrement = increment; // Increment for each frame
        this.radius = radius;
        this.strokeStyle = getRandomColor();
    }
    draw() {
        ctx.strokeStyle = this.strokeStyle;
        ctx.lineWidth = 5;
        ctx.beginPath();
        ctx.arc(this.positionX, this.positionY, this.radius, 0, this.endAngle);
        ctx.stroke();
    }
}

let numSpirals =20;


createSpirals(window.innerWidth/2, window.innerHeight/2, 10, 0.001, numSpirals);

animate();

function animate() {
    // Clear canvas once per frame
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    for (const spiral of spirals) {
        spiral.draw();

        spiral.endAngle += spiral.angleIncrement; // Increment the end angle for animation

        // Change color after completing a full circle
        if (spiral.endAngle >= 2 * Math.PI) {
            spiral.endAngle =0;
        }
    }

    requestAnimationFrame(animate);
}

function createSpirals(x, y, radiusIncrement, speedIncrement, nSpiral) {
    let speed = 0.095;
    let radius = 50;

    for (let i = 0; i < nSpiral; i++) {
        spirals.push(new Spiral(x, y, radius, speed));
        radius += radiusIncrement;
        speed += speedIncrement;
    }
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

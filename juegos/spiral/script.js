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
        this.strokeStyle = "white"
    }
    draw() {
        ctx.strokeStyle = this.strokeStyle;
        ctx.lineWidth = 5;
        ctx.beginPath();
        ctx.arc(this.positionX, this.positionY, this.radius, 0, this.endAngle);
        ctx.stroke();
    }

    animate() {
        this.draw();

        this.endAngle += this.angleIncrement; // Increment the end angle for animation

        // Reset the angle to create a looping effect
        if (this.endAngle >= 2 * Math.PI) {
            this.strokeStyle = getRandomColor();
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            this.endAngle = 0; // Reset to 0 after a full circle
        }
        requestAnimationFrame(this.animate.bind(this));
    }
}

let numSpirals = parseInt(prompt('Introduzca el numero de espirales'));

    if(typeof(numSpirals) != "number"){
        alert("valor no valido");
    }

createSpirals(450, 500, 10, 0.001, numSpirals);


animateAll(spirals)

function animateAll(spirals) {
    spirals.forEach(spiral => {
        spiral.animate();
    });
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
    let letters = '0123456789ABCDEF';
    let color = '#';
    
    for (let i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    
    return color;
}

let canvas;
let ctx;
let offset = 5;

let frame = 0
let frameLimit = 3

canvas = document.getElementById('canvas');
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;
ctx = canvas.getContext('2d');

let circles = [];

class Circle {
    constructor(x, y, radius) {
        this.positionX = x;
        this.positionY = y;
        this.radius = radius;
        this.strokeStyle = getRandomColor();
    }
    draw() {
        ctx.fillStyle = this.strokeStyle;
        ctx.beginPath();
        ctx.lineWidth = 3;
        ctx.arc(this.positionX, this.positionY, this.radius, 0, 2 * Math.PI);
        ctx.fill();
    }
    update() {


        this.strokeStyle = getRandomColor();



        this.draw();



    }
}

for (let i = 0; i < canvas.width; i += 100) {
    for (let j = 0; j < canvas.height; j += 100) {
        circles.push(new Circle(i, j, 40));

    }
}


animate();


function animate() {
    frame++
    if (frame % frameLimit === 0) {
        console.log(frame);
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        circles.forEach(circle => {
            circle.update();

        });
    }
    requestAnimationFrame(this.animate.bind(this));

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

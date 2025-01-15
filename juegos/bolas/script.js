let canvas;
let ctx;
let offset=5;

let frame = 0
let frameLimit = 3

canvas = document.getElementById('canvas');
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;
ctx = canvas.getContext('2d');

let circles = [];

class Circle{
    constructor(x,y,radius){
        this.positionX = x;
        this.positionY = y;
        this.radius = radius;
        this.strokeStyle = 'white';
    }
    draw() {
        ctx.fillStyle = this.strokeStyle;
        ctx.beginPath();
        ctx.lineWidth=3;
        ctx.arc(this.positionX, this.positionY, this.radius,  0,2*Math.PI);
        ctx.fill();
    }
    animate() {
       console.log("animating")
        frame++
        if (frame % frameLimit === 0) {
            this.strokeStyle = getRandomColor();
            ctx.clearRect(0, 0, canvas.width, canvas.height);
        
            this.draw();
            
        }
       
        
            
        requestAnimationFrame(this.animate.bind(this));
    }
}

for (let i = 0; i < 10; i++) {
    for (let j = 0; j < 10; j++) {
        circles.push(new Circle((innerWidth/2+i)-offset,(innerHeight/2+j)-offset,40));
     
    }
 }

circles.forEach(circle => {
    circle.animate();

});

function getRandomColor() {
    // Generate a random number between 0 and 255 for each RGB component
    let letters = '0123456789ABCDEF';
    let color = '#';
    
    for (let i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    
    return color;
}

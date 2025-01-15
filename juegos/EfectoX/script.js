let canvas;
let ctx;
let aumento = false;
let counterclockwise= 0;
let endAngle=2*Math.PI;

canvas = document.getElementById("canvas1");
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

ctx = canvas.getContext("2d");

let dots = [];

class Dot {

    constructor(x, y, radius) {
        this.positionX = x;
        this.positionY = y;
        this.radius = radius;
        this.strokeStyle = 'white';
    }
    draw(counterclockwise) {
        ctx.strokeStyle = this.strokeStyle;
        ctx.beginPath();
        ctx.lineWidth=3;
        ctx.arc(this.positionX, this.positionY, this.radius,  0,counterclockwise);
        ctx.stroke();

    }
    animate() {
        if(this.radius==10)
            aumento = true;
        else if(this.radius==100)
            aumento = false;

        if(!aumento)
            this.radius--;
            else
            this.radius++;

           
                if(counterclockwise<2*Math.PI){
                    counterclockwise+=0.001;
                 } else{
                    counterclockwise = 0;
                 }
             
        

        this.draw(counterclockwise,);
   
        setInterval(() => {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
        },100);
        requestAnimationFrame(this.animate.bind(this));
    }
}

function createDots() {
    var x = 50;
    var y = 50;
    let numDots = 20;

    for (let i = 0; i < numDots; i++) {
        for (let j = 0; j < numDots; j++) {
            dots.push(new Dot(x, y, 10));
            x += 50;

        }
        x = 50;
        y += 50;
    }

}

createDots();


dots.forEach(dot => {
    dot.animate();
    console.log(' running dots')
});

function getRandomColor() {
  // Generate a random number between 0 and 255 for each RGB component
  let letters = "0123456789ABCDEF";
  let color = "#";

  for (let i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }

  return color;
}
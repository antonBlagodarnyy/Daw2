let canvas = document.getElementById("canvas1");
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;


let ctx = canvas.getContext("2d");

let dots = [];

let animationsA = [];



window.addEventListener("resize",()=>refreshAnimation(animationsA));



let aumento = false;
let counterclockwise= 0;
let endAngle=2*Math.PI;


class Dot {

    constructor(x, y, radius) {
        this.positionX = x;
        this.positionY = y;
        this.radius = radius;
        this.strokeStyle = 'white';
    }
    draw() {
        ctx.strokeStyle = this.strokeStyle;
        ctx.beginPath();
        ctx.lineWidth=3;
        ctx.arc(this.positionX, this.positionY, this.radius,  0,Math.PI*2);
        ctx.stroke();

    }
    animate() {
        if(this.radius==30)
            aumento = true;
        else if(this.radius==100)
            aumento = false;

        if(!aumento)
            this.radius--;
            else
            this.radius++;

        this.draw();
   
        setInterval(() => {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
        },100);
       animationsA.push(  requestAnimationFrame(this.animate.bind(this)));
    }
}

function createDots() {
    var x = 100;
    var y = 100;


    for (let i = 0; i < canvas.height/60; i++) {
        for (let j = 0; j < canvas.width/55; j++) {
            dots.push(new Dot(x, y, 30));
            x += 50;

        }
        x = 100;
        y += 50;
    }

}

createDots();
animateDots();

function animateDots(){
    dots.forEach(dot => {
        dot.animate();
    
    });
}


function refreshAnimation (animationsId){
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    
    dots = [];
    
    animationsId.forEach(animation => {
        cancelAnimationFrame(animation);
     
    });
    
    animationsA=[];

    createDots();
    animateDots();
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
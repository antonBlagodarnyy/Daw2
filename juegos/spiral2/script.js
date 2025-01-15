let canvas;
let ctx;

let angleIncrement = 0;

canvas = document.getElementById("canvas1");
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

ctx = canvas.getContext("2d");

let dots = [];




class Spiral {

    constructor( ) {
        this.strokeStyle = 'green';
    }
    draw() {
        

        ctx.strokeStyle = this.strokeStyle;
        ctx.beginPath();
        ctx.moveTo(window.innerWidth/2,window.innerHeight/2);
        ctx.lineWidth=3;
        
        for (let i=0; i< 720; i++) {
           let angle = angleIncrement * i;
           let x=(1+angle)*Math.cos(angle)+window.innerWidth/2;
           let y=(1+angle)*Math.sin(angle)+window.innerHeight/2;
            ctx.lineTo(x, y);

          }

          setInterval(()=>{
            if(angleIncrement>0.9){
                angleIncrement=0;
              }
              angleIncrement +=0.0001;
          },1000)
          
        ctx.stroke();
      
        
    }
    animate() {
   

        this.draw();
   
        setInterval(() => {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
        },1000);
        requestAnimationFrame(this.animate.bind(this));
    }
}

let spiral= new Spiral();

spiral.animate();

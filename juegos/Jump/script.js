const canvas = document.getElementById("canvas");
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

let ctx = canvas.getContext("2d");


const gravity = { x: 0, y: 0.1 };
const ground = ctx.canvas.height / 1.2;  // ground at bottom of canvas.
const bounce = 0.5;

const balls = [];

class Ball {
    constructor(initX) {
        this.pos = { x: initX, y: Math.random() * 100 }, // position
            this.vel = { x: Math.random() - 0.5, y: 0 }, // velocity
            this.size = { w: 10, h: 10 }
    }


    update() {
        this.vel.x += gravity.x;
        this.vel.y += gravity.y;
        this.pos.x += this.vel.x;
        this.pos.y += this.vel.y;
        const g = ground - this.size.h; // adjust for size
        if (this.pos.y >= g) {
            this.pos.y = g - (this.pos.y - g); // 
            this.vel.y = -Math.abs(this.vel.y) * bounce;  // change velocity to moving away.
        }
        
        if(this.pos.x <= 0 || this.pos.x >= canvas.width){
            this.vel.x *= -1;
        }
        setInterval(() => {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
        }, 10)

    }
    draw() {
        ctx.fillStyle = "white";
        ctx.beginPath();
        ctx.arc(this.pos.x, this.pos.y, 10, 0, Math.PI * 2);
        ctx.fill();
        ctx.stroke();


    }
}

window.addEventListener("click", jump);



function jump() {
    balls.forEach(ball => {
        for (let i = 0; i < Math.random() * 20 + 1; i++) {
            ball.vel.y -= 0.5;
        }
    });

}

function createBalls() {
    for (let i = 0; i < 100; i++) {
        balls.push(new Ball(Math.random() * window.innerWidth));
    }

}

function animate() {
    balls.forEach(ball => {
        ball.update();
        ball.draw();
    });

    //ctx.clearRect(0, 0, canvas.width, canvas.height);
    requestAnimationFrame(animate);
};
init();
function init() {
    createBalls();
    animate();
}
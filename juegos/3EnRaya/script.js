let tablero = document.getElementById("tablero");

let celda1 = document.querySelector("#cell1");
let celda2 = document.querySelector("#cell2");
let celda3 = document.querySelector("#cell3");
let celda4 = document.querySelector("#cell4");
let celda5 = document.querySelector("#cell5");
let celda6 = document.querySelector("#cell6");
let celda7 = document.querySelector("#cell7");
let celda8 = document.querySelector("#cell8");
let celda9 = document.querySelector("#cell9");

//Inicializamos tablero
let cells = [
    [" ", " ", " "],
    [" ", " ", " "],
    [" ", " ", " "]
];

//Booleano para escoger al jugador
let player = true;

//Interaccion con click
celda1.addEventListener("click", function () {
    if (cells[0][0] == " ") {
        if (player) {
            cells[0][0] = "X";
            celda1.innerHTML = "X";
            player = false;
        } else {
            cells[0][0] = "O";
            celda1.innerHTML = "O";
            player = true;
        }
        console.log(cells);
        checkStatus();

    }

});
celda2.addEventListener("click", function () {
    if (cells[0][1] == " ") {
        if (player) {
            cells[0][1] = "X";
            celda2.innerHTML = "X";
            player = false;
        } else {
            cells[0][1] = "O";
            celda2.innerHTML = "O";
            player = true;
        }
        console.log(cells);
        checkStatus();

    }

});
celda3.addEventListener("click", function () {
    if (cells[0][2] == " ") {
        if (player) {
            cells[0][2] = "X";
            celda3.innerHTML = "X";
            player = false;
        } else {
            cells[0][2] = "O";
            celda3.innerHTML = "O";
            player = true;
        }
        console.log(cells);
        checkStatus();
    }

});
celda4.addEventListener("click", function () {
    if (cells[1][0] == " ") {
        if (player) {
            cells[1][0] = "X";
            celda4.innerHTML = "X";
            player = false;
        } else {
            cells[1][0] = "O";
            celda4.innerHTML = "O";
            player = true;
        }
        console.log(cells);
        checkStatus();
    }

});
celda5.addEventListener("click", function () {
    if (cells[1][1] == " ") {
        if (player) {
            cells[1][1] = "X";
            celda5.innerHTML = "X";
            player = false;
        } else {
            cells[1][1] = "O";
            celda5.innerHTML = "O";
            player = true;

        }
        console.log(cells);
        checkStatus();
    }

});
celda6.addEventListener("click", function () {
    if (cells[1][2] == " ") {
        if (player) {
            cells[1][2] = "X";
            celda6.innerHTML = "X";
            player = false;
        } else {
            cells[1][2] = "O";
            celda6.innerHTML = "O";
            player = true;
        }
        console.log(cells);
        checkStatus();

    }

});
celda7.addEventListener("click", function () {
    if (cells[2][0] == " ") {
        if (player) {
            cells[2][0] = "X";
            celda7.innerHTML = "X";
            player = false;
        } else {
            cells[2][0] = "O";
            celda7.innerHTML = "O";
            player = true;
        }
        console.log(cells);
        checkStatus();

    }

});
celda8.addEventListener("click", function () {
    if (cells[2][1] == " ") {
        if (player) {
            cells[2][1] = "X";
            celda8.innerHTML = "X";
            player = false;
        } else {
            cells[2][1] = "O";
            celda8.innerHTML = "O";
            player = true;
        }
        console.log(cells);
        checkStatus();
    }

});
celda9.addEventListener("click", function () {
    if (cells[2][2] == " ") {
        if(player){
            cells[2][2] = "X";
            celda9.innerHTML = "X";
            player = false;
        } else {
            cells[2][2] = "O";
            celda9.innerHTML = "O";
            player = true;
        }
        


    }

    console.log(cells);
    checkStatus();
});

//Logica del resultado
function checkStatus() {
    //Ganado las X
    if (cells[0][0] == "X" && cells[0][1] == "X" && cells[0][2] == "X"
        || cells[1][0] == "X" && cells[1][1] == "X" && cells[1][2] == "X"
        || cells[2][0] == "X" && cells[2][1] == "X" && cells[2][2] == "X"
        || cells[0][0] == "X" && cells[1][1] == "X" && cells[2][2] == "X"
        || cells[2][0] == "X" && cells[1][1] == "X" && cells[0][2] == "X"
        || cells[0][0] == "X" && cells [1][0] == "X" && cells [2][0] == "X"
        || cells[0][1] == "X" && cells [1][1] == "X" && cells [2][1] == "X"
        || cells[0][2] == "X" && cells [1][2] == "X" && cells [2][2] == "X"
    ) {
        console.log("Han ganado las X");
    }
    //Ganado las O
    if (cells[0][0] == "O" && cells[0][1] == "O" && cells[0][2] == "O"
        || cells[1][0] == "O" && cells[1][1] == "O" && cells[1][2] == "O"
        || cells[2][0] == "O" && cells[2][1] == "O" && cells[2][2] == "O"
        || cells[0][0] == "O" && cells[1][1] == "O" && cells[2][2] == "O"
        || cells[2][0] == "O" && cells[1][1] == "O" && cells[0][2] == "O"
        || cells[0][0] == "O" && cells [1][0] == "O" && cells [2][0] == "O"
        || cells[0][1] == "O" && cells [1][1] == "O" && cells [2][1] == "O"
        || cells[0][2] == "O" && cells [1][2] == "O" && cells [2][2] == "O"
    ) {
        console.log("Han ganado las O");
    }
}




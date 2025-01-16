function ejercicio1() {
  document.getElementById("exercise-1-text").innerText = "Texto cambiado";
}

function ejercicio2() {
  //document.querySelector("li:nth-child(2)").style = "visibility: hidden";
  document.querySelector("div").style = "visibility: hidden";
}

function ejercicio3() {
  const elements = document.getElementsByClassName("color-box");
  for (let i = 0; i < elements.length; i++) {
    elements[i].setAttribute("style", "color:red");
  }
}

function ejercicio4() {
//Pillamos el li correspondiente
  let li = document.querySelector("li:nth-of-type(4)");
    //Si no ha sido creado todavia    
    if(li.lastChild.id != "output"){
        //Creamos el parrafo, su id, su contenido y lo agregamos
        let p = document.createElement("p");
        p.id="output";
        p.textContent = document.getElementsByName("user-input")[0].value;
        li.appendChild(p);
    }
  else{
    //Si ya ha sido creado, lo machacamos
    li.lastChild.textContent= document.getElementsByName("user-input")[0].value;
  }
}

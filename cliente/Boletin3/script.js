function ejercicio1() {
  document.getElementById("exercise-1-text").innerText = "Texto cambiado";
}

function ejercicio2() {
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
function ejercicio5(){
 let divs = document.getElementsByTagName("div");

 divs[3].querySelector("p").style.color ="blue";
}

function ejercicio6(){
let hs = document.getElementsByTagName("h2");

    for (let elem of hs){
      elem.style.color = "red";
    }
}

function ejercicio7(){
  let items = document.getElementsByClassName("counter-item");

  let container = document.querySelector("li:nth-of-type(7)")

  let output = document.createElement("p");
  output.innerText = items.length;

  container.appendChild(output);
}

function ejercicio8(){
  let elem = document.getElementById("border-box");
  elem.style.border = "1px solid black";
  elem.innerText = "Caja con border"
}

function ejercicio9(){
let elem = document.getElementById("html-container");
elem.innerHTML=`<p>Contenido cambiado</p>`;

}

function ejercicio10(){

  let p = document.getElementById("search-text");
  let palabraClave = document.getElementById("keyword").value;
  console.log(palabraClave);
  let regEx = new RegExp(palabraClave);
  
  p.innerHTML=p.innerText.replace(regEx,`<b>${palabraClave}</b>`);
}
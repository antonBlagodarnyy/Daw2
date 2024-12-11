const output = document.getElementById('output');

function timeOut() {
    output.innerHTML = "<h1>Intervalo inicializado</h1>";
    setTimeout(() => {
        output.innerHTML = "<h1>Intervalo finalizado</h1>";
    },2000);
}


function interval(){
    let contador = 0;
    const intervalo = setInterval(() => {
      contador++;
      output.innerHTML=`<h1>Contador: ${contador}</h1>`;
      
      if (contador === 5) {
        clearInterval(intervalo); // Detener el intervalo después de 5 ejecuciones
        output.innerHTML="<h1>Intervalo detenido</h1>";
      }
    }, 1000); // Ejecutar cada 1 segundo

}

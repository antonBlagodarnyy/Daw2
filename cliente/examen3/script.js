window.onload = code;

function code() {
    //Si acepta cargamos el codigo, en caso contrario no hago nada
  if (confirm("Me otorga permisos?")) {
    //Sacamos los divs
    const divs = document.querySelectorAll("div");
    //Añadimos un manejador a cada div 
    for (const div of divs) {
      div.addEventListener("click", () => {
        //Logica para stop
        if (div.classList.contains("active")) {
            //Paramos el audio
          let audio = div.querySelector("audio");
          audio.pause();

          //Limpiamos el contenido
          for (const e of div.querySelectorAll("p")) {
            e.remove();
          }

          //Quitamos la clase active
          div.classList.remove("active");

          //Logica para play
        } else {
          //Comprueba que no haya ya un div reproduciendo
          if (!checkActive()) {
            div.classList.add("active");
            let audio = div.querySelector("audio");
            audio.play();

            //Sacamos el titulo de la cancion
            let tituloCancion = audio.getAttribute("src").split("/")[
              audio.getAttribute("src").split("/").length - 1
            ];

            //Pinto el parrafo para el titulo de la cancion
            let pTitulo = document.createElement("p");
            pTitulo.textContent =
              "Se esta reproduciendo una pista de audio del género " +
              div.getAttribute("data-genero") +
              ". Esta cancion se llama " +
              tituloCancion;
            div.append(pTitulo);

            //Pinto el parrafo para descubrir nueva musica
            let pMusica = document.createElement("p");
            let linkMusica = document.createElement("a");
            linkMusica.textContent =
              "Para seguir descubriendo nuevos temas visite: " +
              audio.getAttribute("src").split("/music")[0];
            linkMusica.setAttribute(
              "href",
              audio.getAttribute("src").split("/music")[0]
            );
            linkMusica.setAttribute("target", "_blank");
            pMusica.append(linkMusica);
            div.append(pMusica);

            //Parrafo para la pagina seo
            let pRegistro = document.createElement("p");
            let linkRegistro = document.createElement("a");
            linkRegistro.textContent =
              "Pulse aqui para registrar su actividad y mandarla a terceros.";
            linkRegistro.setAttribute("href", "seo.html");
            pRegistro.append(linkRegistro);
            div.append(pRegistro);

            localStorage.setItem("musica", tituloCancion);
            localStorage.setItem("fila", div.getAttribute("data-fila"));
            localStorage.setItem("columna", div.getAttribute("data-columna"));
          }
        }
      });
    }

    function checkActive() {
      for (const div of divs) {
        if (div.classList.contains("active")) {
          return true;
        }
      }
      return false;
    }
  }
}

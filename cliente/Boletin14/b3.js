const productos = [
  {
    id: 1,
    title: "Laptop",
    precio: 800,
  },
  {
    id: 2,
    title: "Telefono",
    precio: 500,
  },
  {
    id: 3,
    title: "Auriculares",
    precio: 100,
  },
  {
    id: 4,
    title: "Mouse",
    precio: 40,
  },
];

var carrito;
localStorage.getItem("carrito")
  ? (carrito = JSON.parse(localStorage.getItem("carrito")))
  : (carrito = []);

const productosContainer = document.getElementById("productos");
const carritoContainer = document.getElementById("carrito-body");
const btnVaciar = document.getElementById("vaciar-carrito");
const total = document.getElementById("total");

productos.forEach((e) => {
  pintarProducto(e);
});

refrescarCarrito();

function pintarProducto(producto) {
  let container = document.createElement("div");
  container.setAttribute("class", "col-md-3 mb-3");

  let card = document.createElement("div");
  card.setAttribute("class", "card");

  let cardBody = document.createElement("div");
  cardBody.setAttribute("class", "card-body");

  let title = document.createElement("h5");
  title.setAttribute("class", "card-title");
  title.textContent = producto.title;

  let p = document.createElement("p");
  p.setAttribute("class", "card-text");
  p.textContent = `Precio: $${producto.precio}`;

  let button = document.createElement("button");
  button.setAttribute("class", "btn btn-primary agregar-carrito");
  button.setAttribute("data-id", producto.id);
  button.textContent = "Agregar";

  container.append(card);
  card.append(cardBody);
  cardBody.append(title, p, button);

  productosContainer.append(container);
}

function interactuar(event) {
  if (event.target.tagName == "BUTTON") {
    aniadirAlCarrito(
      productos.filter((e) => e.id == event.target.getAttribute("data-id"))[0],
      event
    );
  }
}

function aniadirAlCarrito(producto) {
  if (carrito.filter((p) => p.id == producto.id)[0]) {
    let productoActualizado = carrito.filter((p) => p.id == producto.id)[0];
    productoActualizado.cantidad++;
    refrescarCarrito();
  } else {
    producto = { ...producto, cantidad: 1 };
    carrito.push(producto);
    pintarCarrito(producto);
  }
  localStorage.setItem("carrito", JSON.stringify(carrito));
}

function pintarCarrito(producto) {
  let container = document.createElement("tr");

  let titulo = document.createElement("td");
  titulo.innerText = producto.title;

  let precio = document.createElement("td");
  precio.innerText = `$${producto.precio}`;

  let cantidad = document.createElement("td");
  cantidad.innerText = producto.cantidad;

  let buttonContainer = document.createElement("td");

  let button = document.createElement("button");
  button.setAttribute("class", "btn btn-danger btn-sm eliminar");
  button.setAttribute("data-id", producto.id);
  button.addEventListener("click", () => {
    eliminarProducto(producto);
  });
  buttonContainer.append(button);

  total.textContent = calcularTotal();

  container.append(titulo, precio, cantidad, buttonContainer);
  carritoContainer.append(container);
}

function refrescarCarrito() {
  carritoContainer.textContent = "";
  for (const producto of carrito) {
    pintarCarrito(producto);
  }
}

function eliminarProducto(p) {
  if (p.cantidad > 1) {
    p.cantidad--;
    refrescarCarrito();
  } else {
    carrito.splice(carrito.indexOf(p), 1);
    refrescarCarrito();
  }
  localStorage.setItem("carrito", JSON.stringify(carrito));
}

function vaciarCarrito() {
  carrito = [];
  total.textContent = calcularTotal();
  refrescarCarrito();
  localStorage.setItem("carrito", JSON.stringify(carrito));
}

function calcularTotal() {
  return carrito.reduce((a, p) => {
    for (let i = 0; i < p.cantidad; i++) {
      a += p.precio;
    }
    return a;
  }, 0);
}

productosContainer.addEventListener("click", (e) => {
  interactuar(e);
});

btnVaciar.addEventListener("click", vaciarCarrito);

CREATE TABLE usuario(
    id INT AUTO_INCREMENT PRIMARY KEY,
    correo VARCHAR(250) UNIQUE NOT NULL,
    nombre VARCHAR(250) NOT NULL,
    clave VARCHAR(250) NOT NULL
);
CREATE TABLE mensaje (
    idUsuario INT,
    numMensaje INT,
    fecha DATE NOT NULL,
    hora TIME NOT NULL,
    texto VARCHAR(250),
    PRIMARY KEY (idUsuario, numMensaje),
    FOREIGN KEY (idUsuario) REFERENCES usuario(id)
);
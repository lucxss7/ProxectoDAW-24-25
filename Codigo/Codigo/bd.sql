DROP DATABASE IF EXISTS gestiontaller;
CREATE DATABASE gestiontaller;

CREATE TABLE rangos (
    id_tipoUsuario INT PRIMARY KEY AUTO_INCREMENT,
    tipo_usuario VARCHAR(50) NOT NULL
);

CREATE TABLE taller (
    id_taller INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    telefono VARCHAR(20) NOT NULL
);

CREATE TABLE usuarios (
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL unique,
    correo VARCHAR(100) NOT NULL UNIQUE,
    telefono VARCHAR(20) NOT NULL,
    id_taller INT,
    tipoUsuario INT,
    FOREIGN KEY (id_taller) REFERENCES Taller(id_taller),
    FOREIGN KEY (tipoUsuario) REFERENCES Tipo_Usuario(id_tipoUsuario)
);


CREATE TABLE vehiculos (
    id_vehiculo INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT,
    modelo VARCHAR(70) NOT NULL,
    año INT NOT NULL,
    matricula VARCHAR(8) NOT NULL UNIQUE,
    kilometros INT NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario)
);

CREATE TABLE citas (
    id_cita INT PRIMARY KEY AUTO_INCREMENT,
    id_vehiculo INT,
    id_taller INT,
    fecha DATE NOT NULL,
    hora_inicio TIME NOT NULL,
    descripcion VARCHAR (250),
    FOREIGN KEY (id_vehiculo) REFERENCES Vehiculos(id_vehiculo),
    FOREIGN KEY (id_taller) REFERENCES Taller(id_taller)
);



INSERT INTO rangos (tipo_usuario) VALUES
('Cliente'),
('Taller');


INSERT INTO taller (nombre, direccion, telefono) VALUES
('Taller AutoMax', 'Av. Central 123, Ciudad XYZ', '555-1234')

INSERT INTO usuarios (nombre, correo, telefono, id_taller, tipoUsuario, passwd) VALUES
('juan', 'juanperez@mail.com', '555-0001', 1, 1, '1234'),
('ana', 'anagarcia@mail.com', '555-0002', 1, 1, '1234'),
('carlos', 'carloslopez@mail.com', '555-0003', 1, 1, '1234'),
('taller', 'pedrosanchez@mail.com', '555-0004', 1, 2, '1234'),

INSERT INTO vehiculos (id_usuario, modelo, año, matricula, kilometros) VALUES
(1, 'Toyota Corolla', 2018, 'XYZ1234', 32000),
(2, 'Ford Fiesta', 2019, 'ABC5678', 15000),
(2, 'Chevrolet Spark', 2020, 'LMN9012', 12000),
(3, 'Hyundai Elantra', 2017, 'DEF3456', 40000),

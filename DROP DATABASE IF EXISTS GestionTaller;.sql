DROP DATABASE IF EXISTS gestiontaller;
CREATE DATABASE gestiontaller;

-- Tabla de Tipos de Usuario
CREATE TABLE Tipo_Usuario (
    id_tipoUsuario INT PRIMARY KEY AUTO_INCREMENT,
    tipo_usuario VARCHAR(50) NOT NULL
);

-- Tabla de Talleres
CREATE TABLE Taller (
    id_taller INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    telefono VARCHAR(20) NOT NULL
);

-- Tabla de Usuarios
CREATE TABLE Usuarios (
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    telefono VARCHAR(20) NOT NULL,
    id_taller INT,
    tipoUsuario INT,
    FOREIGN KEY (id_taller) REFERENCES Taller(id_taller),
    FOREIGN KEY (tipoUsuario) REFERENCES Tipo_Usuario(id_tipoUsuario)
);

-- Tabla de Vehículos
CREATE TABLE Vehiculos (
    id_vehiculo INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT,
    modelo VARCHAR(50) NOT NULL,
    año INT NOT NULL,
    matriculo VARCHAR(20) NOT NULL UNIQUE,
    kilometros INT NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario)
);

-- Tabla de Citas
CREATE TABLE Citas (
    id_cita INT PRIMARY KEY AUTO_INCREMENT,
    id_vehiculo INT,
    id_taller INT,
    fecha DATE NOT NULL,
    hora_inicio TIME NOT NULL,
    descripcion TEXT,
    FOREIGN KEY (id_vehiculo) REFERENCES Vehiculos(id_vehiculo),
    FOREIGN KEY (id_taller) REFERENCES Taller(id_taller)
);

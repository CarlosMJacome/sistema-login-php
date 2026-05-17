# Sistema de Login en PHP y MySQL

## Descripción

Este proyecto es un sistema web desarrollado en PHP y MySQL que permite:

- Registro de usuarios
- Inicio de sesión
- Manejo de sesiones
- Zona privada de perfil
- Actualización de datos
- Cambio seguro de contraseña
- Cierre de sesión

Las contraseñas se almacenan utilizando `password_hash()` para mejorar la seguridad.

---

## Tecnologías utilizadas

- PHP
- MySQL
- XAMPP
- HTML
- Visual Studio Code

---

## Requisitos

- PHP 8 o superior
- MySQL o MariaDB
- Apache
- XAMPP recomendado

---

## Instalación

1. Clonar o descargar el proyecto.
2. Copiar la carpeta dentro de: C:\xampp\htdocs\
3. Iniciar Apache y MySQL desde XAMPP.
4. Crear una base de datos llamada: sistema_login
5. Ejecutar el siguiente script SQL:

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cedula VARCHAR(20) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
6. Abrir en el navegador: http://localhost/login_php/login.php

---

## Funcionalidades implementadas

- Validación de correo repetido
- Validación de sesión activa
- Contraseñas seguras con hash
- Actualización de perfil
- Cambio de contraseña
- Logout seguro

---

Proyecto académico desarrollado por Mateo Jacome.

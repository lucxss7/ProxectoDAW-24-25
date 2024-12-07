const form = document.getElementById('userForm'),
nombreInput = document.getElementById('nombre'),
usuarioInput = document.getElementById('arroba'),
correoInput = document.getElementById('correo'),
telefonoInput = document.getElementById('telefono'),
passwordInput = document.getElementById('contraseña'),
passwordInput2 = document.getElementById('contraseña2');

const errors = {
nombreError: document.getElementById('nombreError'),
arrobaError: document.getElementById('arrobaError'),
correoError: document.getElementById('correoError'),
telefonoError: document.getElementById('telefonoError'),
contraseñaError: document.getElementById('contraseñaError'),
contraseña2Error: document.getElementById('contraseña2Error')
};

let nombreFlag = false,
arrobaFlag = false,
correoFlag = false,
telefonoFlag = false,
contraseñaFlag = false,
contraseña2Flag = false;

document.addEventListener('DOMContentLoaded', function () {
    nombreInput.addEventListener('blur', e => {
        if (nombreInput.value.length < 3 || nombreInput.value.length > 50) {
            errors.nombreError.textContent = "El nombre debe tener entre 3 y 100 caracteres.";
            nombreFlag = false;
        } else {
            errors.nombreError.textContent = '';
            nombreFlag = true;
        }
    });

    usuarioInput.addEventListener('blur', e => {
        if (usuarioInput.value.length < 3 || usuarioInput.value.length > 30) {
            errors.arrobaError.textContent = "El usuario debe tener entre 3 y 30 caracteres.";
            arrobaFlag = false;
        } else {
            errors.arrobaError.textContent = "";
            arrobaFlag = true;
        }
    });

    correoInput.addEventListener('blur', e => {
        if (!correoInput.value.match(/^[^@\s]+@[^@\s]+\.[^@\s]+$/)) {
            errors.correoError.textContent = "El correo no tiene un formato válido.";
            correoFlag = false;
        } else {
            errors.correoError.textContent = "";
            correoFlag = true;
        }
    });

    telefonoInput.addEventListener('blur', e => {
        if (!telefonoInput.value.match(/^\d{9}$/)) {
            errors.telefonoError.textContent = 'El número de teléfono debe tener 9 dígitos.';
            telefonoFlag = false;
        } else {
            errors.telefonoError.textContent = '';
            telefonoFlag = true;
        }
    });

    passwordInput.addEventListener('blur', e => {
        if (passwordInput.value.length < 8) {
            errors.contraseñaError.textContent = 'Contraseña demasiado corta. Debe tener mínimo 8 caracteres';
            contraseñaFlag = false;
        } else {
            errors.contraseñaError.textContent = '';
            contraseñaFlag = true;
        }
    });

    passwordInput2.addEventListener('blur', e => {
        if (passwordInput2.value.length < 8 || passwordInput.value !== passwordInput2.value) {
            errors.contraseña2Error.textContent = 'Las contraseñas no coinciden o son demasiado cortas. Deben tener mínimo 8 caracteres';
            contraseña2Flag = false;
        } else {
            errors.contraseña2Error.textContent = '';
            contraseña2Flag = true;
        }
    });

    form.addEventListener('submit', e => {
        if (!(nombreFlag && arrobaFlag && correoFlag && telefonoFlag && contraseñaFlag && contraseña2Flag)) {
            e.preventDefault();
            alert("Por favor, corrige el formulario para que pueda ser enviado.");
        }
    });
});

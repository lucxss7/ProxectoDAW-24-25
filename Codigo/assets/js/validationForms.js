document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('userForm'),
    nombreInput = document.getElementById('nombre'),
    usuarioInput = document.getElementById('arroba'),
    correoInput = document.getElementById('correo'),
    telefonoInput = document.getElementById('telefono'),
    passwordInput = document.getElementById('contraseña'),
    passwordInput2 = document.getElementById('contraseña2')
   


    const errors = {
        nombreError: document.getElementById('nombreError'),
        arrobaError: document.getElementById('arrobaError'),
        correoError: document.getElementById('correoError'),
        telefonoError: document.getElementById('telefonoError'),
        contraseñaError: document.getElementById('contraseñaError'),
        contraseña2Error: document.getElementById('contraseña2Error'),
        modeloError: document.getElementById('modeloError')
    };

    nombreInput.addEventListener('blur',e=>{
        if (nombreInput.value.length < 3 || nombreInput.value.length > 50) {
            errors.nombreError.textContent = "El nombre debe tener entre 3 y 100 caracteres.";
        }else{
            errors.nombreError.textContent = ''
        }
    })

    usuarioInput.addEventListener('blur',e=>{
        if (usuarioInput.value.length < 3 || usuarioInput.value.length > 30) {
            errors.arrobaError.textContent = "El usuario debe tener entre 3 y 30 caracteres.";
        }else{
            errors.arrobaError.textContent = "";
        }
    })

    correoInput.addEventListener('blur',e=>{
        if(!correoInput.value.match(/^[^@\s]+@[^@\s]+\.[^@\s]+$/)) {
            errors.correoError.textContent = "El correo no tiene un formato válido.";
        }else{
            errors.correoError.textContent = "";
    }})
    
    telefonoInput.addEventListener('blur',e=>{
        if(telefonoInput.value.match(/^\d{9}$/)){
            errors.correoError.textContent = 'El numero de telefono deben ser 9 digitos';
        }else{
            errors.correoError.textContent ='';
        }
    })

    passwordInput.addEventListener('blur',e=>{
        if(passwordInput.value.length < 8){
            errors.contraseñaError.textContent = 'Contraseña demasiado corta. Debe tener minimo 8 caracteres'
        }else{
            errors.contraseñaError.textContent = '';
        }
    })

    passwordInput2.addEventListener('blur',e=>{
        if(passwordInput2.value.length < 8){
            errors.contraseña2Error.textContent = 'Contraseña demasiado corta. Debe tener minimo 8 caracteres'
        }else{
            errors.contraseña2Error.textContent = '';
        }
    })

})

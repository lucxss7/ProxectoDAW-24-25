//Funcion para hacer visible el menu
    function activarMenu() {
        const navbar = document.querySelector('.navbar');
        navbar.classList.toggle('active');
    }


const $d = document,
      $dia = $d.querySelector('.fc-today');

    $d.addEventListener('DOMContentLoaded',e=>{
        $dia.style.backgroundColor = '#f4f6f9';
    })
    
const $d = document,
  $coche = $d.querySelector("#coche"),
  $calendar = $d.querySelector("#dia"),
  $hora = $d.querySelector("#hora"),
  $taller = $d.querySelector("#taller"),
  $descripcion = $d.getElementById('descripcion'),
  $descripcionError = $d.getElementById('descripcionError'),
  $form = $d.querySelector('form');
let res = [], flag = false;

async function ajax(options) {
  let { url, method = "GET", fExito, fError, data } = options;
  try {
    let resp = await fetch(url, {
      method: method,
      headers: { "Content-type": "application/json; charset=utf-8" },
      body: data ? JSON.stringify(data) : undefined,
    });
    let json = await resp.json();
    if (!resp.ok) {
      throw {
        status: resp.status,
        statusText: resp.statusText || "Ocurrió un error",
      };
    }
    fExito(json);
  } catch (error) {
    fError(error);
  }
}

function getCoches() {
  ajax({
    url: "./getValuesForm.php",
    fExito: (json) => {
      res.length = 0;
      res.push(json);
      //console.log(res);
      renderCoches();
    },
    fError: (error) => {
      console.log("Error en la solicitud:", error);
    },
  });
}

function renderCoches() {
  if (res.length === 0) {
    //console.log("No tenemos data");
    return;
  }
  let cochesHTML = res[0].coches_usuario
    .map(
      (coche) =>
        `<option value="${coche.id_vehiculo}" data-id="${coche.id_vehiculo}">
            ${coche.modelo}
        </option>`
    )
    .join("");
  $coche.innerHTML = cochesHTML;
}

$calendar.addEventListener("change", () => {
  const selectedDate = $calendar.value,
    id_taller = $taller.value;
  console.log(id_taller);
  if (selectedDate) {
    //console.log("Fecha seleccionada: ", selectedDate);
    getHorasDisponibles(selectedDate, id_taller);
  }
});

//Funcion para conseguir las horas disponibles, le pasamos por parametro la fecha y el taller que queremos saber
function getHorasDisponibles(fecha, taller) {
  //encodeURIComponent https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/encodeURIComponent
  const url = `./citas_disponibles.php?fecha=${encodeURIComponent(fecha)}&taller=${encodeURIComponent(taller)}`;
  ajax({
    url: url,
    method: "GET",
    fExito: (json) => {
      let horasHTML = json.map((cita) => `<option>${cita}</option>`).join("");
      $hora.innerHTML = horasHTML;
    },
    fError: (error) => {
      console.log("Error en la solicitud:", error);
    },
  });
}

$d.addEventListener('DOMContentLoaded',e=>{
  getCoches();


  $descripcion.addEventListener('blur', (e) => {
    if ($descripcion.value.trim().length < 8) {
      $descripcionError.textContent =
        'Por favor, explique un poco más por qué pide la cita.';
      flag = false;
    } else {
      $descripcionError.textContent = '';
      flag = true;
    }
  });
  
  $form.addEventListener('submit', (e) => {
    
    if ($descripcion.value.length < 8) {
      $descripcionError.textContent =
        'Por favor, explique un poco más por qué pide la cita.';
      flag = false;
    } else {
      $descripcionError.textContent = '';
      flag = true;
    }
    if (!flag) {
      e.preventDefault();
      console.log('Formulario no enviado: correcciones necesarias.');
    } else {
      console.log('Formulario enviado exitosamente.');
    }
  });
  
})


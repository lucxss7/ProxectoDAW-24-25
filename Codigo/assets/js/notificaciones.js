const $d = document,
  $notis = $d.querySelector("#notis"),
  $notis2 = $d.querySelector("#notis2"),
  $calendarHorario = $d.querySelector("#calendar"),
  $calendarMes = $d.querySelector("#calendar2");

let res = [];

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

function getCitas() {
  ajax({
    url: "./notificaciones.php",
    fExito: (json) => {
      res.length = 0;
      res.push(json);
      renderNotis2(res);
    },
    fError: (error) => {
      console.log("Error en la solicitud:", error);
    },
  });
}

//funcion para renderizar las notificaciones en el panel
function renderNotis2(data) {
  if (Array.isArray(data[0]) && data[0].length > 0) {
    data[0].forEach((cita) => {
      const $cita = $d.createElement("p");
      $cita.textContent = `Cita: ${cita.start} / ${cita.title}`;
      $notis2.appendChild($cita);
    });
  } else {
    $notis2.innerHTML = "<p>No hay citas disponibles.</p>";
  }
}

//funcion para renderizar las notis en una modal
function renderModal(data, error = null) {
  const $modal = $d.createElement("div");
  $modal.style.position = "fixed";
  $modal.style.zIndex = "1";
  $modal.style.left = "0";
  $modal.style.top = "0";
  $modal.style.width = "100%";
  $modal.style.height = "100%";
  $modal.style.overflow = "auto";
  $modal.style.backgroundColor = "rgba(0, 0, 0, 0.5)";
  $modal.style.display = "flex";
  $modal.style.justifyContent = "center";
  $modal.style.alignItems = "center";

  const $modalContent = $d.createElement("div");
  $modalContent.style.backgroundColor = "white";
  $modalContent.style.padding = "20px";
  $modalContent.style.borderRadius = "5px";
  $modalContent.style.width = "80%";
  $modalContent.style.boxShadow = "0 4px 8px rgba(0, 0, 0, 0.2)";

  const $cerrarBtn = $d.createElement("span");
  $cerrarBtn.textContent = "×";
  $cerrarBtn.style.float = "right";
  $cerrarBtn.style.cursor = "pointer";
  $cerrarBtn.style.fontSize = "24px";
  $cerrarBtn.style.marginBottom = "10px";

  const $modalBody = $d.createElement("div");

  if (error) {
    $modalBody.innerHTML = `<p>${error}</p>`;
  } else if (Array.isArray(data[0]) && data[0].length > 0) {
    data[0].forEach((cita) => {
      const $cita = $d.createElement("p");
      $cita.textContent = `Cita: ${cita.start} / ${cita.title}`;
      const $deleteBtn = $d.createElement("span");
      $deleteBtn.textContent = "☑️";
      $deleteBtn.style.marginLeft = "10px";
      $deleteBtn.dataset.id = cita.id;
      $deleteBtn.addEventListener("click", () => {
        console.log("Borrar cita " + cita.id);
        ajax({
          url: "./marcarVisto.php",
          method: "POST",
          data: { id: cita.id },
          fExito: (json) => {
            // Elimina dinámicamente la notificación del DOM
            $cita.remove();

            // Comprueba si quedan notificaciones, actualiza mensaje si no hay más
            if (!$modalBody.querySelector("p")) {
              $modalBody.innerHTML = "<p>No hay notificaciones nuevas.</p>";
            }
          },
          fError: (error) => {
            console.log("Error en la solicitud:", error);
          },
        });
      });
      $cita.appendChild($deleteBtn);
      $modalBody.appendChild($cita);
    });
  } else {
    $modalBody.innerHTML = "<p>No hay notificaciones.</p>";
  }

  $modalContent.appendChild($cerrarBtn);
  $modalContent.appendChild($modalBody);
  $modal.appendChild($modalContent);
  $d.body.appendChild($modal);

  $cerrarBtn.addEventListener("click", () => $modal.remove());
  $modal.addEventListener("click", (e) => {
    if (e.target === $modal) $modal.remove();
  });
}

function renderModal2(cita) {
  const $modal = $d.createElement("div");
  $modal.style.position = "fixed";
  $modal.style.zIndex = "1";
  $modal.style.left = "0";
  $modal.style.top = "0";
  $modal.style.width = "100%";
  $modal.style.height = "100%";
  $modal.style.overflow = "auto";
  $modal.style.backgroundColor = "rgba(0, 0, 0, 0.5)";
  $modal.style.display = "flex";
  $modal.style.justifyContent = "center";
  $modal.style.alignItems = "center";

  const $modalContent = $d.createElement("div");
  $modalContent.style.backgroundColor = "white";
  $modalContent.style.padding = "20px";
  $modalContent.style.borderRadius = "5px";
  $modalContent.style.width = "80%";
  $modalContent.style.boxShadow = "0 4px 8px rgba(0, 0, 0, 0.2)";

  const $cerrarBtn = $d.createElement("span");
  $cerrarBtn.textContent = "×";
  $cerrarBtn.style.float = "right";
  $cerrarBtn.style.cursor = "pointer";
  $cerrarBtn.style.fontSize = "24px";
  $cerrarBtn.style.marginBottom = "10px";

  const $cancelarBtn = $d.createElement("button");
  $cancelarBtn.textContent = "CANCELAR CITA";
  $cancelarBtn.style.backgroundColor = "red";
  $cancelarBtn.style.color = "white";
  $cancelarBtn.style.border = "none";
  $cancelarBtn.style.padding = "10px 20px";
  $cancelarBtn.style.borderRadius = "5px";
  $cancelarBtn.style.cursor = "pointer";
  $cancelarBtn.style.marginTop = "20px";
  $cancelarBtn.dataset.id = cita[0].id;
  $cancelarBtn.addEventListener("click", () => {
    console.log($cancelarBtn.dataset.id);
    if (confirm("¿Estás seguro de que deseas cancelar esta cita?")) {
      ajax({
        url: "./borrarCita.php",
        method: "POST",
        data: { id: cita[0].id },
        fExito: (json) => {
          $modal.remove();
          render;
          window.location.reload();
        },
        fError: (error) => {
          console.log("Error en la solicitud:", error);
        },
      });
    }
  });

  const $modalBody = $d.createElement("div");
  $modalBody.innerHTML = `
    <h3>${cita[0].title}</h3>
    <p><strong>Inicio:</strong> ${cita[0].start}</p>
    <p><strong>Fin:</strong> ${cita[0].end}</p>
    <p><strong>Descripción:</strong> ${cita[0].description}</p>
  `;

  $modalContent.appendChild($cerrarBtn);
  $modalContent.appendChild($modalBody);
  $modalContent.appendChild($cancelarBtn);
  $modal.appendChild($modalContent);
  $d.body.appendChild($modal);

  $cerrarBtn.addEventListener("click", () => $modal.remove());
  $modal.addEventListener("click", (e) => {
    if (e.target === $modal) $modal.remove();
  });
}

$(document).ready(function () {
  $("#calendar").fullCalendar({
    header: false,
    locale: "es",
    defaultView: "agendaDay",
    allDaySlot: false,
    minTime: "08:00:00",
    maxTime: "17:00:00",
    slotLabelInterval: "01:00",
    buttonText: {
      today: "Hoy",
      month: "Mes",
      week: "Semana",
      day: "Día",
      list: "Lista de citas",
    },
    events: "./citas.php",
    eventClick: function (event) {
      renderModal2([
        {
          start: event.start.format("YYYY-MM-DD HH:mm"),
          end: event.end
            ? event.end.format("YYYY-MM-DD HH:mm")
            : "No especificado",
          title: event.title,
          description: event.description || "Sin descripción",
        },
      ]);
    },
    eventAfterAllRender: function () {
      $(".fc-today").css("background-color", "#f4f6f9");
    },
  });

  $("#calendar2").fullCalendar({
    header: false,
    locale: "es",
    buttonText: {
      today: "Hoy",
      month: "Mes",
      week: "Semana",
      day: "Día",
      list: "Lista de citas",
    },
    events: "./citas.php",
    eventClick: function (event) {
      renderModal2([
        {
          id: event.id,
          start: event.start.format("YYYY-MM-DD HH:mm"),
          end: event.end
            ? event.end.format("YYYY-MM-DD HH:mm")
            : "No especificado",
          title: event.title,
          description: event.description,
        },
      ]);
    },
    eventAfterAllRender: function () {
      $(".fc-today").css("background-color", "#f4f6f9");
    },
  });
});

$notis.addEventListener("click", (e) => {
  renderModal(res);
});

$d.addEventListener("DOMContentLoaded", (e) => {
  getCitas();

  modeloInput.addEventListener("blur", (e) => {
    if (modeloInput.value.length < 6) {
      errors.modeloError.textContent =
        "Por favor, especifique el modelo de su coche";
    } else {
      errors.modeloError.textContent = "";
    }
  });
});

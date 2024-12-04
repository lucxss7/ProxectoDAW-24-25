/* const $d = document, 
      $notis = $d.querySelector('#notis')

let res = []

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
        url: "./citas.php",
        fExito: json => {
            res.length = 0;  
            res.push(json);
            console.log(res);
            //renderCitas();
        },
        fError: error => {
            console.log("Error en la solicitud:", error);  
        }
    });
}

$notis.addEventListener('click',e=>{
    console.log('a')
    getCitas();
}) */
    const $d = document,
    $notis = $d.querySelector('#notis');
  
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
    url: "./citas.php",
    fExito: json => {
      res.length = 0;
      res.push(json);
      //console.log(res);
      renderModal(res); 
    },
    fError: error => {
      console.log("Error en la solicitud:", error);
    }
  });
}

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
    data[0].forEach(cita => {
      const $cita = $d.createElement("p");
      $cita.textContent = `Cita: ${cita.start} / ${cita.title}`;
      
      const $deleteBtn = $d.createElement("span");
      $deleteBtn.textContent = "☑️";
      $deleteBtn.style.marginLeft = "10px";
      $deleteBtn.style.cursor = "pointer";
      $deleteBtn.dataset.id = cita.id;

     $deleteBtn.addEventListener("click", () => {
        
      });

      $cita.appendChild($deleteBtn);
      $modalBody.appendChild($cita);
    });
  } else {
    $modalBody.innerHTML = "<p>No hay citas disponibles.</p>";
  }

  $modalContent.appendChild($cerrarBtn);
  $modalContent.appendChild($modalBody);
  $modal.appendChild($modalContent);
  $d.body.appendChild($modal);

  $cerrarBtn.addEventListener("click", () => $modal.remove());
  $modal.addEventListener("click", e => {
    if (e.target === $modal) 
        $modal.remove();
  });
}

$notis.addEventListener("click", e => {
  getCitas();
});

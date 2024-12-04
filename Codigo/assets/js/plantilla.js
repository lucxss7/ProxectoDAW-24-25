const $d = document,
  $plantilla = $d.querySelector("#plantilla"),
  plantilla = [], 
  trabajos = ["Mecánico jefe", "Mecánico Aprendiz","Comercial","Administrativo", "Chapista","Mecánico"]
  let contTrabajadores  = 0;

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

function getPersonal() {
  ajax({
    url: "https://randomuser.me/api/?gender=male&results=6&nat=us,dk,fr,gb,es",
    fExito: json => {
      plantilla.length = 0;  
      plantilla.push(...json.results);
      console.log(plantilla);
      renderPlantilla();  
    },
    fError: error => {
      console.log("Error en la solicitud:", error);  
    }
  });
}

function renderPlantilla() {
  if (plantilla.length === 0) {
    console.log("No tenemos plantilla");
    return;
  }
  let html = plantilla.map(pers =>
    ` 
 
        <div class="item">
            <img src="${pers.picture.large}" style="width: 60px; height: 60px; object-fit: cover;" alt="Imagen de ${pers.name.first} ${pers.name.last}">
            <div>
                <h3>${pers.name.first} ${pers.name.last}</h3>
                <h4>${trabajos[contTrabajadores++]}</h4>
            </div>
        </div>
    `
  ).join("");
  
  $plantilla.innerHTML = html;
}

getPersonal();



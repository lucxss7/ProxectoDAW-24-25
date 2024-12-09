const $d = document,
      $coches = $d.querySelector('.coches-container');

async function ajax(options) {
    let { url, method = "POST", fExito, fError, data } = options;
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

$d.addEventListener('DOMContentLoaded', e => {
    if ($coches) {
        //creamos boton de registrar coches nuevos
        const addButton = document.createElement('a');
        addButton.href = './form_registrocoches.php';
        addButton.textContent = '+';
        addButton.classList.add('add-button');
        $coches.appendChild(addButton);
        //le ponemos un boton por si queremos eliminar un coche 
        const coches = $d.querySelectorAll('.coche');
        coches.forEach(coche => {
            const deleteButton = document.createElement('span');
            deleteButton.textContent = '−';
            deleteButton.classList.add('delete-button');
            deleteButton.style.backgroundColor = 'red';
            deleteButton.style.color = 'white';
            deleteButton.style.width = '25px';
            deleteButton.style.borderRadius = '50%';
            deleteButton.style.position = 'absolute';
            deleteButton.style.top = '10px';
            deleteButton.style.right = '10px';
            deleteButton.style.cursor = 'pointer';
            deleteButton.addEventListener('click', () => {
                const cocheId = coche.dataset.id;
                console.log('ID del coche a borrar:', cocheId);
                if (confirm('¿Estás seguro de que deseas eliminar este coche?')) {
                    ajax({
                        url: './borrarcoche.php',
                        method: 'POST',
                        data: { id: cocheId },
                        fExito: (res) => {
                            if (res.success) {
                                //alert('Coche eliminado con éxito.');
                                //coche.remove();
                                window.location.reload();
                            } else {
                                //alert(`Error: ${res.error || 'No se pudo eliminar el coche.'}`);
                            }
                        },
                        fError: (err) => {
                            //console.error('Error en la solicitud:', err);
                            alert(`Error ${err.status}: ${err.statusText}`);
                        },
                    });
                }
            });
            coche.appendChild(deleteButton);
        });
    }
});

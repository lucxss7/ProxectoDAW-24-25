const $d = document,
      $coches = $d.querySelector('.coches-container');

// Añadimos un más para añadir nuevos coches
$d.addEventListener('DOMContentLoaded', e => {
    if ($coches) {
        const addButton = document.createElement('a');
        addButton.href = './form_registrocoches.php';
        addButton.textContent = '+';
        addButton.classList.add('add-button');
        $coches.appendChild(addButton);
        
        // Añadimos un menos para eliminar coches
        const coches = $coches.querySelectorAll('.coche');
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
                console.log('borrar')
                //coche.remove();
                // Opcionalmente, enviar una solicitud al servidor para eliminar el coche
                
                
            });
            coche.appendChild(deleteButton);
        });
    }
});

const $d = document,
      $coches = $d.querySelector('.coches-container');

//A;adimos un mas para a;adir nuevos coches
$d.addEventListener('DOMContentLoaded', e => {
    if ($coches) {
        const addButton = document.createElement('a');
        addButton.href = './form_registrocoches.php';
        addButton.textContent = '+';
        addButton.classList.add('add-button');
        $coches.appendChild(addButton);
    }
});

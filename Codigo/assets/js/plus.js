const $d = document,
      $coches = $d.querySelector('.coches-container');

$d.addEventListener('DOMContentLoaded', e => {
    if ($coches) {
        const addButton = document.createElement('a');
        addButton.href = './form_registrocoches.html';
        addButton.textContent = '+';
        addButton.classList.add('add-button');
        $coches.appendChild(addButton);
    }
});

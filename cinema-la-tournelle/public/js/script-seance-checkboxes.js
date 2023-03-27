function showSeanceCheckboxes() { // Get the film dropdown and checkboxes
    const filmDropdown = document.querySelector('.film-dropdown');
    const voCheckbox = document.querySelector('.vo-checkbox');
    const vostCheckbox = document.querySelector('.vost-checkbox');
    const deuxDCheckbox = document.querySelector('.deux-d-checkbox');
    const troisDCheckbox = document.querySelector('.trois-d-checkbox');

    // Hide the checkboxes initially
    voCheckbox.style.display = 'none';
    vostCheckbox.style.display = 'none';
    deuxDCheckbox.style.display = 'none';
    troisDCheckbox.style.display = 'none';

    // Show the checkboxes if a film is selected
    if (filmDropdown.value !== '') {
        voCheckbox.style.display = 'block';
        vostCheckbox.style.display = 'block';
        deuxDCheckbox.style.display = 'block';
        troisDCheckbox.style.display = 'block';
    }
}



//TODO separare file?

// prevent default degli input quando si schiaccia invio
const formInputs = document.querySelectorAll('.form-control');
formInputs.forEach(input => {
  input.addEventListener('keypress', e => {
    if (e.key === 'Enter') {
      // const form = e.target.closest('form');
      e.preventDefault();
    }
  })
})

// recupera tutte le checkboxes
const checkboxes = document.querySelectorAll('.form-check-input');

// validazione input text

// Alert delete
const buttons = document.querySelectorAll('.delete-form [type="submit"]');

buttons.forEach(element => {

    element.addEventListener('click', function(el) {

        el.preventDefault(); 

        const btn = el.target; 

        const form = btn.closest('.delete-form'); 
        console.log(form);

        if(form && confirm('Do you really want to delete this place?') ) { 
            form.submit(); 
        }
    })
})

// fn js che mostra un alert se non è stata checkata almeno una checkbox
const submitButtons = document.getElementById('form-submit-button');

submitButtons.addEventListener('click', () => {

    const arrayAmenities = document.getElementsByName('amenities[]');
    let hasChecked = false;

    console.log(arrayAmenities);

    for (var i = 0; i < arrayAmenities.lenght; i++) {
        if (arrayAmenities[i].checked) {
            hasChecked = true;
            console.log(hasChecked);
        }
    }

    if (hasChecked == false) {
        alert('Please, select at least one amenity');
    } 
})
//input non fanno submit quando gli si da l'enter
const formInputs = document.querySelectorAll('.form-control');
formInputs.forEach(input => {
  input.addEventListener('keypress', e => {
    if (e.key === 'Enter') {
      // const form = e.target.closest('form');
      e.preventDefault();
    }
  })
})

// Compare alert quando si clicca sul delete
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

// Compare alert se non è stata checkata almeno una checkbox delle amenities
//TODO erro in console
const submitButtons = document.getElementById('form-submit-button');
const checkboxes = document.querySelectorAll("input[type=checkbox]");
let arrayChecked = [];

checkboxes.forEach(element => {

    if(element.checked){
        arrayChecked.push(element);
    }

    element.addEventListener('change', function(el) {
        if(element.checked){
            arrayChecked.push(element);

        } else if (!element.checked){
            arrayChecked.splice(element, 1);
        }
    })

})

submitButtons.addEventListener('click', function() {
    if (arrayChecked.length == 0) {
        alert('Please, select at least one amenity');
    } 
})

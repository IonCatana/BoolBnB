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

// js che mostra un alert se non è stata checkata almeno una checkbox
const submitButtons = document.getElementById('form-submit-button');
const checkboxes = document.querySelectorAll("input[type=checkbox]");
let arrayChecked = [];

checkboxes.forEach(element => {
    if(element.checked){
        arrayChecked.push(element);
    }
})

console.log(arrayChecked);
console.log(arrayChecked.length);

checkboxes.forEach(element => {

    element.addEventListener('change', function(el) {

        if(element.checked){
            arrayChecked.push(element);
            console.log(arrayChecked);

        } else if (!element.checked){
            arrayChecked.splice(element, 1);
            console.log(arrayChecked);
        }
    })

})

submitButtons.addEventListener('click', function() {
    console.log('dentro al button', arrayChecked.length);
    if (arrayChecked.length == 0) {
        alert('Please, select at least one amenity');
    } 
})

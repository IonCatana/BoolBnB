//create & edit
// const { isEmpty } = require("lodash");
import { isEmpty } from 'lodash';
window.$ = window.jQuery = require('jquery');

// array che conterrà gli errori
let validationErrors = []; 
//prende i pulsanti submit dei form create e edit
const submitButtons = document.getElementById('form-submit-button');
//prende le checkbox delle amenities
const checkboxes = document.getElementsByClassName('validation-amenity');

//fn che controlla se almeno una checkbox è checkata
function checkAmenities (checklist) {

    // ciclo for che ritorna true se almeno una checkbox è checkata
    for (const element of checklist) {
        if (element.checked) return true;
    }
    
    return false; // se non ne trova, la fn ritorna false
}

// function checkTitlesAddress () {
    
// }

function checkFields () {

    let requiredFields = ['title', 'address'];

    requiredFields.forEach (fieldName => {
        const inputs = document.querySelectorAll('.form-control');

        inputs.forEach ( input => {
            if (input['id'] == fieldName) {
                if (isEmpty(input.value)) 
                    validationErrors.push(`- ${fieldName} must be filled out`);
            }
        });
    })

    let numericFields = ['rooms', 'beds', 'bathrooms', 'square_meters'];

    numericFields.forEach (fieldName => {
        const inputs = document.querySelectorAll('.form-control');

        inputs.forEach ( input => {
            // console.log(input);
            if (input['id'] == fieldName) {
                if ( !(isEmpty(input.value) ) ) {
                    if ( isNaN(input.value) || input.value < 1 )
                        validationErrors.push(`- ${fieldName} must be a number and greater than 0`);
                }
            }
        });
    })

    let imgInput = document.forms["place-form"]["img"];
    let allowedExtensions = /(\.jpg|\.jpeg|\.png|\.webp)$/i;
    if ( typeof imgInput !== 'undefined' && !(isEmpty(imgInput.value) ) ) {
        if (!allowedExtensions.exec(imgInput.value)) {
            validationErrors.push('- Invalid file type');
        }
    }

}

if (submitButtons) {
    // se c'è qualche errore, compare modal, quando si invia il form
    submitButtons.addEventListener('click', function(e) { 
        
        // reset dell'array degli errori ogni volta che si clicca sul submit button
        validationErrors = [];

        // fn che controlla i campi
        checkFields();

        // fn che controlla le checkboxes
        if (!checkAmenities(checkboxes)) 
            validationErrors.push('- Select at least one amenity');
        
        //logica che serve a mostrare la modale
        if(validationErrors.length > 0){
            e.preventDefault();
            submitButtons.dataset.target = '#exampleModal';
            let message = document.getElementById('modal-msg');
            message.innerText = validationErrors.join("\n");
        }else{
            submitButtons.dataset.target = "";
        }
    });
}

//visibility
const visibility = document.getElementById('visible-check');
// TODO controlla se funziona una volta sistemata la visibility lato backend

if (visibility) {
    setVisibilityRequirements(visibility);
    
    visibility.addEventListener('change', e => {
        setVisibilityRequirements(e.target);
    })
    
    function setVisibilityRequirements (visibleCheckbox) {
        if (visibleCheckbox.checked) {
            // info text
            const smallText = document.getElementById('visible-check-info');
            smallText.classList.remove('d-none');
            
            const inputs = document.forms['place-form'];
            for (let input of inputs) {
                if (input.classList.contains('required_if_visible')) {
                    input.setAttribute('required', '');
                }
            }
        }
        
        if (!visibleCheckbox.checked) {
            const smallText = document.getElementById('visible-check-info');
            smallText.classList.add('d-none');
    
            const inputs = document.forms['place-form'];
            for (let input of inputs) {
                if (input.classList.contains('required_if_visible')) {
                    input.removeAttribute('required');
                }
            }
        }
    }
}

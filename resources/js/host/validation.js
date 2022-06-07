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

function checkFields () {

    let requiredFields = ['title', 'address'];

    requiredFields.forEach (fieldName => {
        const inputs = document.querySelectorAll('.form-control');

        inputs.forEach ( input => {
            // console.log(input);
            if (input['id'] == fieldName) {
                if (title == "") 
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
    if ( !(isEmpty(imgInput.value) ) ) {
        if (!allowedExtensions.exec(imgInput.value)) {
            validationErrors.push('- Invalid file type');
        }
    }

    //controllo dei campi
    // let title = document.forms["place-form"]["title"].value;
    // if (title == "") 
    //     validationErrors.push("- Title must be filled out");

    // let address = document.forms["place-form"]["address"].value;
    // if (address == "") 
    //     validationErrors.push("- Address must be filled out");

    // // let lat = document.forms["place-form"]["lat"].value;
    // // if (lat == "") 
    // //     alert("Latitude must be filled out");

    // // let lon = document.forms["place-form"]["lon"].value;
    // // if (lon == "") 
    // //     alert("Longitude must be filled out");

    // let rooms = document.forms["place-form"]["rooms"].value;
    // if ( !(isEmpty(rooms) ) ) {
    //     if ( isNaN(rooms) || rooms < 1 )
    //         validationErrors.push("- Rooms must be a number and greater than 0");
    // }

    // let beds = document.forms["place-form"]["beds"].value;
    // if ( !(isEmpty(beds) ) ) {
    //     if (isNaN(beds) || beds < 1) 
    //         validationErrors.push("- Beds must be a number and greater than 0");
    // }

    // let baths = document.forms["place-form"]["bathrooms"].value;
    // if ( !(isEmpty(baths) ) ) {
    //     if (isNaN(baths) || baths < 1) 
    //         validationErrors.push("- Bathrooms must be a number and greater than 0");
    // }

    // let squareM = document.forms["place-form"]["square_meters"].value;
    // if ( !(isEmpty(squareM) ) ) {
    //     if (isNaN(squareM) || squareM < 1)
    //         validationErrors.push("- Square meters must be a number and greater than 0");
    // }

    // let imgInput = document.forms["place-form"]["img"];
    // let imgPath;
    // if (imgInput.value) {
    //     imgPath = imgInput.value;
    // } 
    
    // let allowedExtensions = /(\.jpg|\.jpeg|\.png|\.webp)$/i;

    // if ( !(isEmpty(imgPath) ) ) {
    //     if (!allowedExtensions.exec(imgPath)) {
    //         validationErrors.push('- Invalid file type');
    //     }
    // }
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

        //se l'array ha almeno un elemento, appare modale con errori
        // richiamo fn che controlla le checkboxes
        if (!checkAmenities(checkboxes)) validationErrors.push('- Select at least one amenity');
    
        // let lat = document.forms["place-form"]["lat"].value;
        // if (lat == "") 
        //     alert("Latitude must be filled out");
    
        // let lon = document.forms["place-form"]["lon"].value;
        // if (lon == "") 
        //     alert("Longitude must be filled out");
    
        let rooms = document.forms["place-form"]["rooms"].value;
        if ( !(isEmpty(rooms) ) ) {
            if ( isNaN(rooms) || rooms < 1 )
                validationErrors.push("- Rooms must be a number and greater than 0");
        }
    
        let beds = document.forms["place-form"]["beds"].value;
        if ( !(isEmpty(beds) ) ) {
            if (isNaN(beds) || beds < 1) 
                validationErrors.push("- Beds must be a number and greater than 0");
        }
    
        let baths = document.forms["place-form"]["bathrooms"].value;
        if ( !(isEmpty(baths) ) ) {
            if (isNaN(baths) || baths < 1) 
                validationErrors.push("- Bathrooms must be a number and greater than 0");
        }
    
        let squareM = document.forms["place-form"]["square_meters"].value;
        if ( !(isEmpty(squareM) ) ) {
            if (isNaN(squareM) || squareM < 1)
                validationErrors.push("- Square meters must be a number and greater than 0");
        }
    
        let imgInput = document.forms["place-form"]["img"];
        let imgPath;
        if (typeof imgInput !== 'undefined') {
            imgPath = imgInput.value;
        } 
        
        let allowedExtensions = /(\.jpg|\.jpeg|\.png|\.webp)$/i;
    
        if ( !(isEmpty(imgPath) ) ) {
            if (!allowedExtensions.exec(imgPath)) {
                validationErrors.push('- Invalid file type');
            }
        }
    
        if (validationErrors.length > 0) {
            e.preventDefault();
            // alert(validationErrors.join("\n"));
            submitButtons.dataset.target = '#exampleModal';
            let message = document.getElementById('modal-msg');
            message.innerText = validationErrors.join("\n");
            // console.log(validationErrors);
        } 
        else 
            submitButtons.dataset.target = '';
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

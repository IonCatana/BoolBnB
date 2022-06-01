//create & edit

const { isEmpty } = require("lodash");

//prendo i pulsanti submit dei form create e edit
const submitButtons = document.getElementById('form-submit-button');

//quando si preme submit eseguo la fn di verifica
submitButtons.addEventListener('click', function() {
    let title = document.forms["place-form"]["title"].value;
    if (title == "") 
        alert("Title must be filled out");

    let address = document.forms["place-form"]["address"].value;
    if (address == "") 
        alert("Address must be filled out");

    // let lat = document.forms["place-form"]["lat"].value;
    // if (lat == "") 
    //     alert("Latitude must be filled out");

    // let lon = document.forms["place-form"]["lon"].value;
    // if (lon == "") 
    //     alert("Longitude must be filled out");

    let rooms = document.forms["place-form"]["rooms"].value;
    if ( !(isEmpty(rooms) ) ) {
        if ( isNaN(rooms) || rooms < 1 )
            alert("Rooms must be a number and greater than 0");
    }

    let beds = document.forms["place-form"]["beds"].value;
    if ( !(isEmpty(beds) ) ) {
        if (isNaN(beds) || beds < 1) 
        alert("Beds must be a number and greater than 0");
    }

    let baths = document.forms["place-form"]["bathrooms"].value;
    if ( !(isEmpty(baths) ) ) {
        if (isNaN(baths) || baths < 1) 
        alert("Baths must be a number and greater than 0");
    }

    let squareM = document.forms["place-form"]["square_meters"].value;
    if ( !(isEmpty(squareM) ) ) {
        if (isNaN(squareM) || squareM < 1)
        alert("Square meters must be a number and greater than 0");
    }
        
})

//visibility
//prendo il pulsante submit del form visibility
const visibility = document.getElementById('visibility-btn');

//quando si preme submit eseguo la fn di verifica
visibility.addEventListener('click', function() {
    // let title = document.forms["visibility-form"]["title"].value;
    // if (title == "") 
    //     alert("Title must be filled out");

    // let address = document.forms["visibility-form"]["address"].value;
    // if (address == "") 
    //     alert("Address must be filled out");

    let rooms = document.forms["visibility-form"]["rooms"].value;
    if (rooms == "") 
        alert("Rooms must be filled out");
    else if (isNaN(rooms) || rooms < 1)
        alert("Rooms must be a number and greater than 0");

    let beds = document.forms["visibility-form"]["beds"].value;
    if (beds == "") 
        alert("Beds must be filled out");
    else if (isNaN(beds) || beds < 1) 
        alert("Beds must be a number and greater than 0");

    let baths = document.forms["visibility-form"]["bathrooms"].value;
    if (baths == "") 
        alert("Longitude must be filled out");
    else if (isNaN(baths) || baths < 1) 
        alert("Baths must be a number and greater than 0");

    let squareM = document.forms["visibility-form"]["square_meters"].value;
    if (squareM == "") 
        alert("Square meters must be filled out");
    else if (isNaN(squareM) || squareM < 1) 
        alert("Square meters must be a number and greater than 0");
})
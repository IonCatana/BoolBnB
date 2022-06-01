//TODO refactoring

//prendo i pulsanti submit dei form
const submitButtons = document.getElementById('form-submit-button');

//quando si preme submit eseguo la fn di verifica

// create input
submitButtons.addEventListener('click', function() {
    let createTitle = document.forms["create-form"]["title"].value;
    if (createTitle == "") 
        alert("Title must be filled out");
    
    let createAddress = document.forms["create-form"]["address"].value;
    if (createAddress == "") 
        alert("Address must be filled out");
    
    // let createLatitude = document.forms["create-form"]["lat"].value;
    // if (createLatitude == "") 
    //     alert("Latitude must be filled out");
    
    // let createLongitude = document.forms["create-form"]["lon"].value;
    // if (createLongitude == "") 
    //     alert("Longitude must be filled out");
})

// edit input
submitButtons.addEventListener('click', function() {
    let editTitle = document.forms["edit-form"]["title"].value;
    if (editTitle == "") 
        alert("Title must be filled out");

    let editAddress = document.forms["edit-form"]["address"].value;
    if (editAddress == "") 
        alert("Address must be filled out");

    // let editLatitude = document.forms["edit-form"]["lat"].value;
    // if (editLatitude == "") 
    //     alert("Latitude must be filled out");

    // let editLongitude = document.forms["edit-form"]["lon"].value;
    // if (editLongitude == "") 
    //     alert("Longitude must be filled out");

    let editRooms = document.forms["edit-form"]["rooms"].value;
    if (editRooms == "") 
        alert("Rooms must be filled out");
    else if (isNaN(editRooms) || editRooms < 1)
        alert("Rooms must be a number and greater than 0");

    let editBeds = document.forms["edit-form"]["beds"].value;
    if (editBeds == "") 
        alert("Beds must be filled out");
    else if (isNaN(editBeds) || editBeds < 1) 
        alert("Beds must be a number and greater than 0");

    let editBaths = document.forms["edit-form"]["bathrooms"].value;
    if (editBaths == "") 
        alert("Longitude must be filled out");
    else if (isNaN(editBaths) || editBaths < 1) 
        alert("Baths must be a number and greater than 0");

    let editSquares = document.forms["edit-form"]["square_meters"].value;
    if (editSquares == "") 
        alert("Square meters must be filled out");
    else if (isNaN(editSquares) || editSquares < 1) 
        alert("Square meters must be a number and greater than 0");
})
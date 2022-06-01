//prendo tutti gli input presenti in pagina
// const formInputs = document.querySelectorAll('.form-control');
// const forms = document.querySelectorAll('.form-control');
const submitButtons = document.getElementById('form-submit-button');

//per ogni input eseguo la fn
submitButtons.addEventListener('click', function() {
    let title = document.forms["place-form"]["title"].value;
    if (title == "") {
        alert("Title must be filled out");
    }

    let address = document.forms["place-form"]["address"].value;
    if (address == "") {
        alert("Address must be filled out");
    }

    let latitude = document.forms["place-form"]["latitude"].value;
    if (latitude == "") {
        alert("latitude must be filled out");
    }

    let longitude = document.forms["place-form"]["longitude"].value;
    if (longitude == "") {
        alert("longitude must be filled out");
    }
})
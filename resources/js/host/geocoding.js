const formInputs = document.querySelectorAll('.form-control');
formInputs.forEach(input => {
  input.addEventListener('keypress', e => {
    if (e.key === 'Enter') {
      const form = e.target.closest('form');
      // console.log(e)
      e.preventDefault();
    }
  })
})

import Axios from "axios";
const TOMTOM_API_KEY = 'yQdOXmdWcQjythjoyUwOQaQSJBBNCvPj';

function fetchCoordinates(query) {
  Axios.get(`https://api.tomtom.com/search/2/geocode/${query}.json`, {
    params: {'key': TOMTOM_API_KEY}
  })
    .then(res => {
      const { results } = res.data;
      
      // TODO usiamo il primo risultato che di solito è il più preciso
      // potremmo però mostrarli tutti all'utente e lasciare scegliere a lui ???
      const position = results[0].position;

      return position;
    })
    .catch(err => {
      console.log(err);
    });
}


let position;
const address = document.getElementById('address');

// quando si toglie il focus dall'input
address.addEventListener('focusout', e => {
  console.log(e)
  const query = encodeURIComponent(e.target.value);
  position = fetchCoordinates(query)
});

// quando si preme enter sull'input
address.addEventListener('keypress', e => {
  if (e.key === 'Enter') {
    console.log(e)
    // e.target.preventDefault();
    const query = encodeURIComponent(e.target.value);
    position = fetchCoordinates(query);
  }
});


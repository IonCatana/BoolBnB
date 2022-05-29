const createInputs = document.querySelectorAll('input');
addEventListener('keypress', e => {
  e.preventDefault();
})

const { default: Axios } = require("axios");
const TOMTOM_API_KEY = 'yQdOXmdWcQjythjoyUwOQaQSJBBNCvPj';

const position = {};

function fetchCoordinates(query) {
  Axios.get(`https://api.tomtom.com/search/2/geocode/${query}.json`, {
    params: {'key': TOMTOM_API_KEY}
  })
    .then(res => {
      const { results } = res.data;
      
      // TODO usiamo il primo risultato che di solito è il più preciso
      // potremmo però mostrarli tutti all'utente e lasciare scegliere a lui ???
      position = results[0].position;
      console.log(position);

      return position;
    })
    .catch(err => {
      console.log(err);
    });
}



const address = document.getElementById('address');

// quando si toglie il focus dall'input
address.addEventListener('focusout', e => {
  const query = encodeURIComponent(query.target.value);
  position = fetchCoordinates(query)
});

// quando si preme enter sull'input
address.addEventListener('keypress', e => {
  if (e.key === 'enter') {
    const query = encodeURIComponent(query.target.value);
    position = fetchCoordinates(query);
  }
});


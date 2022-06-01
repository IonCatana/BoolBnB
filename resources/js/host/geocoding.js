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
      
      // assegno i valori ai campi corrispondenti nell'html
      latitude.value = position.lat;
      longitude.value = position.lon;
    })
    .catch(err => {
      console.log(err);
    });
}


const address = document.getElementById('address');
const latitude = document.getElementById('latitude');
const longitude = document.getElementById('longitude');

// quando si toglie il focus dall'input
address.addEventListener('focusout', e => {
  const query = encodeURIComponent(e.target.value);
  fetchCoordinates(query);
});

// quando si preme enter sull'input
address.addEventListener('keypress', e => {
  if (e.key === 'Enter') {
    const query = encodeURIComponent(e.target.value);
    fetchCoordinates(query);
  }
});




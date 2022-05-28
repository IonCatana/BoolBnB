const { default: Axios } = require("axios");
const TOMTOM_API_KEY = 'yQdOXmdWcQjythjoyUwOQaQSJBBNCvPj';

function fetchCoordinates(event) {
  const query = encodeURIComponent(event.target.value);

  Axios.get(`https://api.tomtom.com/search/2/geocode/${query}.json`, {
    params: {'key': TOMTOM_API_KEY}
  })
    .then(res => {
      const { results } = res.data;
      
      // TODO usiamo il primo risultato che di solito è il più preciso
      // potremmo però mostrarli tutti all'utente e lasciare scegliere a lui ???
      const { lat, lon } = results[0].position;
      console.log(lat, lon);
    })
    .catch(err => {
      console.log(err);
    });
}



const address = document.getElementById('address');

address.addEventListener('focusout', fetchCoordinates);
// TODO parte anche quando si schiaccia enter
// address.addEventListener('keypress', fetchCoordinates);



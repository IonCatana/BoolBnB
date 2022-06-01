import Axios from "axios";
const TOMTOM_API_KEY = 'yQdOXmdWcQjythjoyUwOQaQSJBBNCvPj';

function fetchAddressMatches(query) {
  Axios.get(`https://api.tomtom.com/search/2/geocode/${query}.json`, {
    params: {'key': TOMTOM_API_KEY}
  })
    .then(res => {
      return res.data.results
    })
    .catch(err => {
      console.log(err);
    });
}

const MIN_LENGTH = 4; // arbitrario, corrisponde alla lunghezza di Via_, cosi non inizia a cercare prima che l'utente abbia inserito info specifiche
const address = document.getElementById('address');
let searchMatches = [];

address.addEventListener('keypress', e => {
  if (e.target.value.length > MIN_LENGTH) {
    const query = encodeURIComponent(e.target.value);
    searchMatches = fetchAddressMatches(query);
  }
});

address.addEventListener('focusout', e => {
  const query = encodeURIComponent(e.target.value);
  searchMatches = fetchAddressMatches(query);
});

export default searchMatches;

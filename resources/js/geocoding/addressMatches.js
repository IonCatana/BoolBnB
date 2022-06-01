/**
 * 
 * 
 * 
 */

import Axios from "axios";
const TOMTOM_API_KEY = 'yQdOXmdWcQjythjoyUwOQaQSJBBNCvPj';

async function fetchAddressMatches(query) {
  Axios.get(`https://api.tomtom.com/search/2/geocode/${query}.json`, {
    params: {'key': TOMTOM_API_KEY}
  })
    .then(res => {
      const { results } = res.data;

      results.forEach(result => {
        const { address, position } = result;
        
        const option = document.createElement('option');
        option.value = address.streetName + ',' 
          + address.municipality + ','
          + address.country;
        list.appendChild(option);

        let pos = {};
        console.log(pos)
      });
    })
    .catch(err => {
      console.log(err);
    });
}

const MIN_LENGTH = 4; // arbitrario, corrisponde alla lunghezza di Via_, cosi non inizia a cercare prima che l'utente abbia inserito info specifiche
const address = document.getElementById('address');
const list = document.getElementById('matches');
// let addressMatches = [];

address.addEventListener('keypress', e => {
  if (e.target.value.length > MIN_LENGTH) {
    const query = encodeURIComponent(e.target.value);
    fetchAddressMatches(query);
    console.log(pos)
    // addressMatches.forEach(item => {
    //   console.warn('press')
    //   const { address, position } = item;
      
    //   const option = document.createElement('option');
    //   option.value = address.streetName;
    //   console.log(option)
    //   list.appendChild(option);
    // });
  }
});

// address.addEventListener('focusout', e => {
//   const query = encodeURIComponent(e.target.value);
//   addressMatches = fetchAddressMatches(query);

//   addressMatches.forEach(item => {
//     console.warn('press')
//     const { address, position } = item;
    
//     const option = document.createElement('option');
//     option.value = address.streetName;
//     console.log(option)
//     list.appendChild(option);
//   });
// });

// export default searchMatches;



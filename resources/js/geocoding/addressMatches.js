 window.$ = window.jQuery = require('jquery');
import Axios from "axios";


function setCoordinatesToForm(lat, lon) {
  document.getElementById('latitude').value = lat;
  document.getElementById('longitude').value = lon;
}

function setAddressToForm(address) {
  document.getElementById('address').value = address;
}


const TOMTOM_API_KEY = 'yQdOXmdWcQjythjoyUwOQaQSJBBNCvPj';

async function fetchAndSetAddress(query) {
  Axios.get(`https://api.tomtom.com/search/2/geocode/${query}.json`, {
    params: {'key': TOMTOM_API_KEY}
  })
    .then(res => {
      const { results } = res.data;

      list.textContent = '';
      results.forEach((result, index) => {
        const { address, position } = result;
        
        const anchor = document.createElement('a');

        anchor.setAttribute('href', '#');
        anchor.className = 'list-group-item list-group-item-action';
        if (index === 0) anchor.classList.add('active');

        let {streetName, municipality, country } = address;
        if (streetName == null) streetName = 'Unnamed street';
        const builtAddress = `${streetName}, ${municipality}, ${country}`;
        anchor.append(builtAddress);

        list.appendChild(anchor);

        anchor.addEventListener('click', e => {
          setCoordinatesToForm(position.lat, position.lon);
          setAddressToForm(builtAddress);
          $('#exampleModal').modal('hide');
        });
      });
    })
    .catch(err => {
      console.log(err);
    });
}

const MIN_LENGTH = 4; // arbitrario, corrisponde alla lunghezza di Via_, cosi non inizia a cercare prima che l'utente abbia inserito info specifiche
const address = document.getElementById('address-modal');
const list = document.getElementById('list-modal');
let pos = {};

address.addEventListener('keypress', e => {
  if (e.target.value.length > MIN_LENGTH) {
    const query = encodeURIComponent(e.target.value);
    fetchAndSetAddress(query);

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

// const modal = document.getElementById('exampleModal');
// modal.addEventListener('shown.bs.modal', e => {
//   console.log('shown')
//   address.focus();
// });

/**
 * focus sull'input quando mostro la modale
 */
$(document).on('shown.bs.modal','#exampleModal', function () {
  address.focus();
})
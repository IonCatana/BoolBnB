 window.$ = window.jQuery = require('jquery');
import Axios from "axios";


function setCoordinatesToForm(lat, lon) {
  document.getElementById('latitude').value = lat;
  document.getElementById('longitude').value = lon;
}

function setAddressToForm(address) {
  document.getElementById('address').value = address;
}

function composeAddress(address) {
  let { freeformAddress, countrySubdivision, countrySecondarySubdivision, country, municipality } = address;
  let str = '';

  if (freeformAddress != null) str += freeformAddress;
  if (countrySubdivision != null) str += ', ' + countrySubdivision;
  if (countrySecondarySubdivision != null && countrySecondarySubdivision !== municipality) countrySecondarySubdivision;
  if (country != null) str += ', ' + country;
  
  return str;
}

function makeAddressAnchor() {
  const anchor = document.createElement('a');

  anchor.setAttribute('href', '#');
  anchor.className = 'list-group-item list-group-item-action';

  return anchor;
}

function firstMatchTriggersOnEnter(element, str, position) {
  element.classList.add('active');
  addressInput.addEventListener('keypress', e => {
    if (e.key === 'Enter') {
      setCoordinatesToForm(position.lat, position.lon);
      setAddressToForm(str);
      $('#addressModal').modal('hide');
    }
  });
}

const TOMTOM_API_KEY = 'yQdOXmdWcQjythjoyUwOQaQSJBBNCvPj';

function fetchAndSetAddress(query) {
  Axios.get(`https://api.tomtom.com/search/2/geocode/${query}.json`, {
    params: {'key': TOMTOM_API_KEY}
  })
    .then(res => {
      const { results } = res.data;

      list.textContent = '';
      results.forEach((result, index) => {
        const { address, position } = result;
        
        const a = makeAddressAnchor(index);
        
        const addressStr = composeAddress(address);
        a.append(addressStr);
        
        if (index === 0) firstMatchTriggersOnEnter(a, addressStr, position);

        list.appendChild(a);

        // TODO TAB navigation (on focus event??)
        a.addEventListener('click', () => {
          setCoordinatesToForm(position.lat, position.lon);
          setAddressToForm(addressStr);
          $('#addressModal').modal('hide');
          console.log(document.getElementById('latitude'))
        });
      });
    })
    .catch(err => {
      console.log(err);
    });
}

const MIN_LENGTH = 4; // arbitrario, corrisponde alla lunghezza di Via_, cosi non inizia a cercare prima che l'utente abbia inserito info specifiche
const addressInput = document.getElementById('address-modal');
const list = document.getElementById('list-modal');
let pos = {};

addressInput.addEventListener('keypress', e => {
  if (e.target.value.length > MIN_LENGTH) {
    const query = encodeURIComponent(e.target.value);
    fetchAndSetAddress(query);
  }
});
addressInput.addEventListener('keydown', e => {
  if (e.key === 'Backspace') {
    const query = encodeURIComponent(e.target.value);
    fetchAndSetAddress(query);
  }
});

/**
 * focus sull'input quando mostro la modale
 */
$(document).on('shown.bs.modal','#addressModal', function () {
  addressInput.focus();
})




// export { composeAddress };
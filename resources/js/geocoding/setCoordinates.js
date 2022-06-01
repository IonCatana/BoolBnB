// import addressMatches from './addressMatches'
const list = document.getElementById('matches');
console.log(list)

const input = document.getElementById('address');

input.addEventListener('keypress', e => {
  const addressMatches = require('./addressMatches');
  console.log(addressMatches)

  addressMatches.forEach(item => {
    console.warn('press')
    const { address, position } = item;
    
    const option = document.createElement('option');
    option.value = address.streetName;
    console.log(option)
    list.appendChild(option);
  });
});
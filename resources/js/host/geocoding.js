const { default: Axios } = require("axios");

const address = document.getElementById('address');


address.addEventListener('focusout', e => {
  Axios.get('https://api.tomtom.com/search/2/geocode/9390 santa monica boulevard beverly hills california los angeles.json?key=yQdOXmdWcQjythjoyUwOQaQSJBBNCvPj')
    .then(res => {
      console.log(res);
    })
});


// &storeResult={storeResult}&typeahead={typeahead}&limit={limit}&ofs={ofs}&lat={lat}&lon={lon}&countrySet={countrySet}&radius={radius}&topLeft={topLeft}&btmRight={btmRight}&language={language}&extendedPostalCodesFor={extendedPostalCodesFor}&view={view}&mapcodes={mapcodes}&entityTypeSet={entityTypeSet}
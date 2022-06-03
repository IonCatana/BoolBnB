/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no exports provided */
<<<<<<< HEAD
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _host_form_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./host/form.js */ "./resources/js/host/form.js");
/* harmony import */ var _host_geocoding_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./host/geocoding.js */ "./resources/js/host/geocoding.js");
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
__webpack_require__(/*! ./bootstrap */ "./resources/js/bootstrap.js");
/**
 * Qui importiamo i diversi file javascript per le funzionalità
 * custom
 * 
 */





/***/ }),

/***/ "./resources/js/bootstrap.js":
/*!***********************************!*\
  !*** ./resources/js/bootstrap.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

window._ = __webpack_require__(/*! lodash */ "./node_modules/lodash/lodash.js");
/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
  window.Popper = __webpack_require__(/*! popper.js */ "./node_modules/popper.js/dist/esm/popper.js")["default"];
  window.$ = window.jQuery = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");

  __webpack_require__(/*! bootstrap */ "./node_modules/bootstrap/dist/js/bootstrap.js");
} catch (e) {}
/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */


window.axios = __webpack_require__(/*! axios */ "./node_modules/axios/index.js"); // questo header ci generava errori CORS nelle chiamate a API esterne
// window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */
// import Echo from 'laravel-echo';
// window.Pusher = require('pusher-js');
// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });

/***/ }),

/***/ "./resources/js/host/form.js":
/*!***********************************!*\
  !*** ./resources/js/host/form.js ***!
  \***********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _validation_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./validation.js */ "./resources/js/host/validation.js");
/* harmony import */ var _validation_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_validation_js__WEBPACK_IMPORTED_MODULE_0__);
//input non fanno submit quando gli si da l'enter
var formInputs = document.querySelectorAll('.form-control');
formInputs.forEach(function (input) {
  input.addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
      // const form = e.target.closest('form');
      e.preventDefault();
    }
  });
}); // Compare alert quando si clicca sul delete

var buttons = document.querySelectorAll('.delete-form [type="submit"]');
buttons.forEach(function (element) {
  element.addEventListener('click', function (el) {
    el.preventDefault();
    var btn = el.target;
    var form = btn.closest('.delete-form');
    console.log(form);

    if (form && confirm('Do you really want to delete this place?')) {
      form.submit();
    }
  });
}); // Compare alert se non è stata checkata almeno una checkbox delle amenities

var submitButtons = document.getElementById('form-submit-button');
var checkboxes = document.querySelectorAll("input[type=checkbox]");
var arrayChecked = []; // checkboxes.forEach(element => {
//     if(element.checked){
//         arrayChecked.push(element);
//     }
//     element.addEventListener('change', function(el) {
//         if(element.checked){
//             arrayChecked.push(element);
//         } else if (!element.checked){
//             arrayChecked.splice(element, 1);
//         }
//     })
// })
// submitButtons.addEventListener('click', function() {
//     if (arrayChecked.length == 0) {
//         alert('Please, select at least one amenity');
//     } 
// })



/***/ }),

/***/ "./resources/js/host/geocoding.js":
/*!****************************************!*\
  !*** ./resources/js/host/geocoding.js ***!
  \****************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_0__);

var TOMTOM_API_KEY = 'yQdOXmdWcQjythjoyUwOQaQSJBBNCvPj';

function fetchCoordinates(query) {
  axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("https://api.tomtom.com/search/2/geocode/".concat(query, ".json"), {
    params: {
      'key': TOMTOM_API_KEY
    }
  }).then(function (res) {
    var results = res.data.results; // TODO usiamo il primo risultato che di solito è il più preciso
    // potremmo però mostrarli tutti all'utente e lasciare scegliere a lui ???

    var position = results[0].position; // assegno i valori ai campi corrispondenti nell'html

    latitude.value = position.lat;
    longitude.value = position.lon;
  })["catch"](function (err) {
    console.log(err);
  });
}

var address = document.getElementById('address');
var latitude = document.getElementById('latitude');
var longitude = document.getElementById('longitude'); // quando si toglie il focus dall'input

address.addEventListener('focusout', function (e) {
  var query = encodeURIComponent(e.target.value);
  fetchCoordinates(query);
}); // quando si preme enter sull'input

address.addEventListener('keypress', function (e) {
  if (e.key === 'Enter') {
    var query = encodeURIComponent(e.target.value);
    fetchCoordinates(query);
  }
});
=======
/***/ (function(module, exports) {

throw new Error("Module build failed (from ./node_modules/babel-loader/lib/index.js):\nSyntaxError: /Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/resources/js/app.js: Unexpected token (15:0)\n\n\u001b[0m \u001b[90m 13 |\u001b[39m \u001b[90m */\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 14 |\u001b[39m\u001b[0m\n\u001b[0m\u001b[31m\u001b[1m>\u001b[22m\u001b[39m\u001b[90m 15 |\u001b[39m \u001b[33m<<\u001b[39m\u001b[33m<<\u001b[39m\u001b[33m<<\u001b[39m\u001b[33m<\u001b[39m \u001b[33mHEAD\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m    |\u001b[39m \u001b[31m\u001b[1m^\u001b[22m\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 16 |\u001b[39m \u001b[36mimport\u001b[39m \u001b[32m'./host/form.js'\u001b[39m\u001b[33m;\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 17 |\u001b[39m \u001b[36mimport\u001b[39m \u001b[32m'./host/geocoding.js'\u001b[39m\u001b[33m;\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 18 |\u001b[39m \u001b[33m===\u001b[39m\u001b[33m===\u001b[39m\u001b[33m=\u001b[39m\u001b[0m\n    at instantiate (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:72:32)\n    at constructor (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:358:12)\n    at Parser.raise (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:3336:19)\n    at Parser.unexpected (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:3374:16)\n    at Parser.parseExprAtom (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:13120:22)\n    at Parser.parseExprSubscripts (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:12645:23)\n    at Parser.parseUpdate (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:12624:21)\n    at Parser.parseMaybeUnary (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:12595:23)\n    at Parser.parseMaybeUnaryOrPrivate (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:12389:61)\n    at Parser.parseExprOps (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:12396:23)\n    at Parser.parseMaybeConditional (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:12366:23)\n    at Parser.parseMaybeAssign (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:12318:21)\n    at Parser.parseExpressionBase (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:12254:23)\n    at /Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:12248:39\n    at Parser.allowInAnd (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:14343:16)\n    at Parser.parseExpression (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:12248:17)\n    at Parser.parseStatementContent (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:14783:23)\n    at Parser.parseStatement (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:14640:17)\n    at Parser.parseBlockOrModuleBlockBody (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:15283:25)\n    at Parser.parseBlockBody (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:15274:10)\n    at Parser.parseProgram (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:14558:10)\n    at Parser.parseTopLevel (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:14545:25)\n    at Parser.parse (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:16508:10)\n    at parse (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:16560:38)\n    at parser (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/core/lib/parser/index.js:52:34)\n    at parser.next (<anonymous>)\n    at normalizeFile (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/core/lib/transformation/normalize-file.js:87:38)\n    at normalizeFile.next (<anonymous>)\n    at run (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/core/lib/transformation/index.js:31:50)\n    at run.next (<anonymous>)\n    at Function.transform (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/core/lib/transform.js:25:41)\n    at transform.next (<anonymous>)\n    at step (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/gensync/index.js:261:32)\n    at /Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/gensync/index.js:273:13\n    at async.call.result.err.err (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/gensync/index.js:223:11)");
>>>>>>> master

/***/ }),

/***/ "./resources/js/host/validation.js":
/*!*****************************************!*\
  !*** ./resources/js/host/validation.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

//create & edit
var _require = __webpack_require__(/*! lodash */ "./node_modules/lodash/lodash.js"),
    isEmpty = _require.isEmpty;

var validationErrors = []; //array che contiene gli errori
// Compare alert se non è stata checkata almeno una checkbox delle amenities

var submitButtons = document.getElementById('form-submit-button');
var checkboxes = document.querySelectorAll("input[type=checkbox]");
var arrayChecked = [];
checkboxes.forEach(function (element) {
  if (element.checked) {
    arrayChecked.push(element);
  }

  element.addEventListener('change', function (el) {
    if (element.checked) {
      arrayChecked.push(element);
    } else if (!element.checked) {
      arrayChecked.splice(element, 1);
    }
  });
});
submitButtons.addEventListener('click', function () {
  if (arrayChecked.length == 0) {
    // alert('Please, select at least one amenity');
    validationErrors.push('- Select at least one amenity');
  }
}); //prendo i pulsanti submit dei form create e edit
// const submitButtons = document.getElementById('form-submit-button');
//quando si preme submit eseguo la fn di verifica

submitButtons.addEventListener('click', function () {
  // let title = document.forms["place-form"]["title"].value;
  // if (title == "") 
  //     alert("Title must be filled out");
  // let address = document.forms["place-form"]["address"].value;
  // if (address == "") 
  //     alert("Address must be filled out");
  // let lat = document.forms["place-form"]["lat"].value;
  // if (lat == "") 
  //     alert("Latitude must be filled out");
  // let lon = document.forms["place-form"]["lon"].value;
  // if (lon == "") 
  //     alert("Longitude must be filled out");
  var rooms = document.forms["place-form"]["rooms"].value;

  if (!isEmpty(rooms)) {
    if (isNaN(rooms) || rooms < 1) validationErrors.push("- Rooms must be a number and greater than 0");
  }

  var beds = document.forms["place-form"]["beds"].value;

  if (!isEmpty(beds)) {
    if (isNaN(beds) || beds < 1) validationErrors.push("- Beds must be a number and greater than 0");
  }

  var baths = document.forms["place-form"]["bathrooms"].value;

  if (!isEmpty(baths)) {
    if (isNaN(baths) || baths < 1) validationErrors.push("- Bathrooms must be a number and greater than 0");
  }

  var squareM = document.forms["place-form"]["square_meters"].value;

  if (!isEmpty(squareM)) {
    if (isNaN(squareM) || squareM < 1) validationErrors.push("- Square meters must be a number and greater than 0");
  }

  var imgInput = document.forms["place-form"]["img"];
  var imgPath = imgInput.value;
  var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

  if (!isEmpty(imgPath)) {
    if (!allowedExtensions.exec(imgPath)) {
      validationErrors.push('- Invalid file type');
    }
  }

  if (validationErrors.length > 0) alert(validationErrors.join("\n"));
}); //visibility
//prendo il pulsante submit del form visibility

var visibility = document.getElementById('visibility-btn'); //quando si preme submit eseguo la fn di verifica

visibility.addEventListener('click', function () {
  // let title = document.forms["visibility-form"]["title"].value;
  // if (title == "") 
  //     alert("Title must be filled out");
  // let address = document.forms["visibility-form"]["address"].value;
  // if (address == "") 
  //     alert("Address must be filled out");
  var rooms = document.forms["visibility-form"]["rooms"].value;
  if (rooms == "") alert("Rooms must be filled out");else if (isNaN(rooms) || rooms < 1) alert("Rooms must be a number and greater than 0");
  var beds = document.forms["visibility-form"]["beds"].value;
  if (beds == "") alert("Beds must be filled out");else if (isNaN(beds) || beds < 1) alert("Beds must be a number and greater than 0");
  var baths = document.forms["visibility-form"]["bathrooms"].value;
  if (baths == "") alert("Longitude must be filled out");else if (isNaN(baths) || baths < 1) alert("Baths must be a number and greater than 0");
  var squareM = document.forms["visibility-form"]["square_meters"].value;
  if (squareM == "") alert("Square meters must be filled out");else if (isNaN(squareM) || squareM < 1) alert("Square meters must be a number and greater than 0");
  var imgInput = document.forms["visibility-form"]["img"];
  var imgPath = imgInput.value;
  var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

  if (!allowedExtensions.exec(imgPath)) {
    alert('Invalid file type');
  }
});

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/front.scss":
/*!***********************************!*\
  !*** ./resources/sass/front.scss ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*****************************************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ./resources/sass/front.scss ***!
  \*****************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

<<<<<<< HEAD
__webpack_require__(/*! C:\Users\holog\Boolean\BoolBnB\resources\js\app.js */"./resources/js/app.js");
__webpack_require__(/*! C:\Users\holog\Boolean\BoolBnB\resources\sass\app.scss */"./resources/sass/app.scss");
module.exports = __webpack_require__(/*! C:\Users\holog\Boolean\BoolBnB\resources\sass\front.scss */"./resources/sass/front.scss");
=======
<<<<<<< HEAD
__webpack_require__(/*! /Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/resources/js/app.js */"./resources/js/app.js");
__webpack_require__(/*! /Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/resources/sass/app.scss */"./resources/sass/app.scss");
module.exports = __webpack_require__(/*! /Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/resources/sass/front.scss */"./resources/sass/front.scss");
=======
__webpack_require__(/*! C:\Users\holog\Boolean\BoolBnb\resources\js\app.js */"./resources/js/app.js");
__webpack_require__(/*! C:\Users\holog\Boolean\BoolBnb\resources\sass\app.scss */"./resources/sass/app.scss");
module.exports = __webpack_require__(/*! C:\Users\holog\Boolean\BoolBnb\resources\sass\front.scss */"./resources/sass/front.scss");
>>>>>>> develop
>>>>>>> master


/***/ })

/******/ });
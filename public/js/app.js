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
/***/ (function(module, exports) {

throw new Error("Module build failed (from ./node_modules/babel-loader/lib/index.js):\nSyntaxError: /Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/resources/js/app.js: Unexpected token (15:0)\n\n\u001b[0m \u001b[90m 13 |\u001b[39m \u001b[90m */\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 14 |\u001b[39m\u001b[0m\n\u001b[0m\u001b[31m\u001b[1m>\u001b[22m\u001b[39m\u001b[90m 15 |\u001b[39m \u001b[33m<<\u001b[39m\u001b[33m<<\u001b[39m\u001b[33m<<\u001b[39m\u001b[33m<\u001b[39m \u001b[33mHEAD\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m    |\u001b[39m \u001b[31m\u001b[1m^\u001b[22m\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 16 |\u001b[39m \u001b[36mimport\u001b[39m \u001b[32m'./host/form.js'\u001b[39m\u001b[33m;\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 17 |\u001b[39m \u001b[36mimport\u001b[39m \u001b[32m'./host/geocoding.js'\u001b[39m\u001b[33m;\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 18 |\u001b[39m \u001b[33m===\u001b[39m\u001b[33m===\u001b[39m\u001b[33m=\u001b[39m\u001b[0m\n    at instantiate (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:72:32)\n    at constructor (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:358:12)\n    at Parser.raise (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:3336:19)\n    at Parser.unexpected (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:3374:16)\n    at Parser.parseExprAtom (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:13120:22)\n    at Parser.parseExprSubscripts (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:12645:23)\n    at Parser.parseUpdate (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:12624:21)\n    at Parser.parseMaybeUnary (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:12595:23)\n    at Parser.parseMaybeUnaryOrPrivate (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:12389:61)\n    at Parser.parseExprOps (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:12396:23)\n    at Parser.parseMaybeConditional (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:12366:23)\n    at Parser.parseMaybeAssign (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:12318:21)\n    at Parser.parseExpressionBase (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:12254:23)\n    at /Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:12248:39\n    at Parser.allowInAnd (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:14343:16)\n    at Parser.parseExpression (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:12248:17)\n    at Parser.parseStatementContent (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:14783:23)\n    at Parser.parseStatement (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:14640:17)\n    at Parser.parseBlockOrModuleBlockBody (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:15283:25)\n    at Parser.parseBlockBody (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:15274:10)\n    at Parser.parseProgram (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:14558:10)\n    at Parser.parseTopLevel (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:14545:25)\n    at Parser.parse (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:16508:10)\n    at parse (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/parser/lib/index.js:16560:38)\n    at parser (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/core/lib/parser/index.js:52:34)\n    at parser.next (<anonymous>)\n    at normalizeFile (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/core/lib/transformation/normalize-file.js:87:38)\n    at normalizeFile.next (<anonymous>)\n    at run (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/core/lib/transformation/index.js:31:50)\n    at run.next (<anonymous>)\n    at Function.transform (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/@babel/core/lib/transform.js:25:41)\n    at transform.next (<anonymous>)\n    at step (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/gensync/index.js:261:32)\n    at /Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/gensync/index.js:273:13\n    at async.call.result.err.err (/Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/node_modules/gensync/index.js:223:11)");

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
__webpack_require__(/*! /Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/resources/js/app.js */"./resources/js/app.js");
__webpack_require__(/*! /Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/resources/sass/app.scss */"./resources/sass/app.scss");
module.exports = __webpack_require__(/*! /Users/antonio/Desktop/web-dev/esercitazioni-boolean/boolBnb/resources/sass/front.scss */"./resources/sass/front.scss");
=======
__webpack_require__(/*! C:\Users\holog\Boolean\BoolBnb\resources\js\app.js */"./resources/js/app.js");
__webpack_require__(/*! C:\Users\holog\Boolean\BoolBnb\resources\sass\app.scss */"./resources/sass/app.scss");
module.exports = __webpack_require__(/*! C:\Users\holog\Boolean\BoolBnb\resources\sass\front.scss */"./resources/sass/front.scss");
>>>>>>> develop


/***/ })

/******/ });
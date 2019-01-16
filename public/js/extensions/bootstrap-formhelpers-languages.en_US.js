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
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/extensions/bootstrap-formhelpers-languages.en_US.js":
/*!**************************************************************************!*\
  !*** ./resources/js/extensions/bootstrap-formhelpers-languages.en_US.js ***!
  \**************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/* ==========================================================
 * bootstrap-formhelpers-languages.en_US.js
 * https://github.com/vlamanna/BootstrapFormHelpers
 * ==========================================================
 * Copyright 2012 Vincent Lamanna
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ========================================================== */
var BFHLanguagesList = {
  'om': 'Afaan Oromoo',
  'aa': 'Afaraf',
  'af': 'Afrikaans',
  'ak': 'Akan',
  'an': 'aragonés',
  'ig': 'Asụsụ Igbo',
  'gn': 'Avañe\'ẽ',
  'ae': 'avesta',
  'ay': 'aymar aru',
  'az': 'azərbaycan dili',
  'id': 'Bahasa Indonesia',
  'ms': 'bahasa Melayu',
  'bm': 'bamanankan',
  'jv': 'basa Jawa',
  'su': 'Basa Sunda',
  'bi': 'Bislama',
  'bs': 'bosanski jezik',
  'br': 'brezhoneg',
  'ca': 'català',
  'ch': 'Chamoru',
  'ny': 'chiCheŵa',
  'sn': 'chiShona',
  'co': 'corsu',
  'cy': 'Cymraeg',
  'da': 'dansk',
  'se': 'Davvisámegiella',
  'de': 'Deutsch',
  'nv': 'Diné bizaad',
  'et': 'eesti',
  'na': 'Ekakairũ Naoero',
  'en': 'English',
  'es': 'español',
  'eo': 'Esperanto',
  'eu': 'euskara',
  'ee': 'Eʋegbe',
  'to': 'faka Tonga',
  'mg': 'fiteny malagasy',
  'fr': 'français',
  'fy': 'Frysk',
  'ff': 'Fulfulde',
  'fo': 'føroyskt',
  'ga': 'Gaeilge',
  'gv': 'Gaelg',
  'sm': 'gagana fa\'a Samoa',
  'gl': 'galego',
  'sq': 'gjuha shqipe',
  'gd': 'Gàidhlig',
  'ki': 'Gĩkũyũ',
  'ha': 'Hausa',
  'ho': 'Hiri Motu',
  'hr': 'hrvatski jezik',
  'io': 'Ido',
  'rw': 'Ikinyarwanda',
  'rn': 'Ikirundi',
  'ia': 'Interlingua',
  'nd': 'isiNdebele',
  'nr': 'isiNdebele',
  'xh': 'isiXhosa',
  'zu': 'isiZulu',
  'it': 'italiano',
  'ik': 'Iñupiaq',
  'pl': 'polski',
  'mh': 'Kajin M̧ajeļ',
  'kl': 'kalaallisut',
  'kr': 'Kanuri',
  'kw': 'Kernewek',
  'kg': 'KiKongo',
  'sw': 'Kiswahili',
  'ht': 'Kreyòl ayisyen',
  'kj': 'Kuanyama',
  'ku': 'Kurdî',
  'la': 'latine',
  'lv': 'latviešu valoda',
  'lt': 'lietuvių kalba',
  'ro': 'limba română',
  'li': 'Limburgs',
  'ln': 'Lingála',
  'lg': 'Luganda',
  'lb': 'Lëtzebuergesch',
  'hu': 'magyar',
  'mt': 'Malti',
  'nl': 'Nederlands',
  'no': 'Norsk',
  'nb': 'Norsk bokmål',
  'nn': 'Norsk nynorsk',
  'uz': 'O\'zbek',
  'oc': 'occitan',
  'ie': 'Interlingue',
  'hz': 'Otjiherero',
  'ng': 'Owambo',
  'pt': 'português',
  'ty': 'Reo Tahiti',
  'rm': 'rumantsch grischun',
  'qu': 'Runa Simi',
  'sc': 'sardu',
  'za': 'Saɯ cueŋƅ',
  'st': 'Sesotho',
  'tn': 'Setswana',
  'ss': 'SiSwati',
  'sl': 'slovenski jezik',
  'sk': 'slovenčina',
  'so': 'Soomaaliga',
  'fi': 'suomi',
  'sv': 'Svenska',
  'mi': 'te reo Māori',
  'vi': 'Tiếng Việt',
  'lu': 'Tshiluba',
  've': 'Tshivenḓa',
  'tw': 'Twi',
  'tk': 'Türkmen',
  'tr': 'Türkçe',
  'ug': 'Uyƣurqə',
  'vo': 'Volapük',
  'fj': 'vosa Vakaviti',
  'wa': 'walon',
  'tl': 'Wikang Tagalog',
  'wo': 'Wollof',
  'ts': 'Xitsonga',
  'yo': 'Yorùbá',
  'sg': 'yângâ tî sängö',
  'is': 'Íslenska',
  'cs': 'čeština',
  'el': 'ελληνικά',
  'av': 'авар мацӀ',
  'ab': 'аҧсуа бызшәа',
  'ba': 'башҡорт теле',
  'be': 'беларуская мова',
  'bg': 'български език',
  'os': 'ирон æвзаг',
  'kv': 'коми кыв',
  'ky': 'Кыргызча',
  'mk': 'македонски јазик',
  'mn': 'монгол',
  'ce': 'нохчийн мотт',
  'ru': 'Русский язык',
  'sr': 'српски језик',
  'tt': 'татар теле',
  'tg': 'тоҷикӣ',
  'uk': 'українська мова',
  'cv': 'чӑваш чӗлхи',
  'cu': 'ѩзыкъ словѣньскъ',
  'kk': 'қазақ тілі',
  'hy': 'Հայերեն',
  'yi': 'ייִדיש',
  'he': 'עברית',
  'ur': 'اردو',
  'ar': 'العربية',
  'fa': 'فارسی',
  'ps': 'پښتو',
  'ks': 'कश्मीरी',
  'ne': 'नेपाली',
  'pi': 'पाऴि',
  'bh': 'भोजपुरी',
  'mr': 'मराठी',
  'sa': 'संस्कृतम्',
  'sd': 'सिन्धी',
  'hi': 'हिन्दी',
  'as': 'অসমীয়া',
  'bn': 'বাংলা',
  'pa': 'ਪੰਜਾਬੀ',
  'gu': 'ગુજરાતી',
  'or': 'ଓଡ଼ିଆ',
  'ta': 'தமிழ்',
  'te': 'తెలుగు',
  'kn': 'ಕನ್ನಡ',
  'ml': 'മലയാളം',
  'si': 'සිංහල',
  'th': 'ไทย',
  'lo': 'ພາສາລາວ',
  'bo': 'བོད་ཡིག',
  'dz': 'རྫོང་ཁ',
  'my': 'ဗမာစာ',
  'ka': 'ქართული',
  'ti': 'ትግርኛ',
  'am': 'አማርኛ',
  'iu': 'ᐃᓄᒃᑎᑐᑦ',
  'oj': 'ᐊᓂᔑᓈᐯᒧᐎᓐ',
  'cr': 'ᓀᐦᐃᔭᐍᐏᐣ',
  'km': 'ខ្មែរ',
  'zh': '中文 (Zhōngwén)',
  'ja': '日本語 (にほんご)',
  'ii': 'ꆈꌠ꒿ Nuosuhxop',
  'ko': '한국어 (韓國語)'
};

/***/ }),

/***/ 4:
/*!********************************************************************************!*\
  !*** multi ./resources/js/extensions/bootstrap-formhelpers-languages.en_US.js ***!
  \********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! F:\homestead_projects\onburo\resources\js\extensions\bootstrap-formhelpers-languages.en_US.js */"./resources/js/extensions/bootstrap-formhelpers-languages.en_US.js");


/***/ })

/******/ });
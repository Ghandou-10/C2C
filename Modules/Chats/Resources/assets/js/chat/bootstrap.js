/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

// try {
//     window.Popper = require('popper.js').default;
//     window.$ = window.jQuery = require('jquery');
//     window.bootstrap = require('bootstrap5');
//     require('simplebar');
//     window.Waves = require('node-waves/dist/waves.min');
//     require('@simonwep/pickr');
//     window.GLightbox = require('glightbox');
//     require('swiper');
//     require('fg-emoji-picker');
//     require('moment');
//     // require('./index.init');
//     require('./echo');
//     require('./app');
// } catch (e) {
// }


import $ from 'jquery';
import Popper from 'popper.js';
import 'bootstrap-select/dist/js/bootstrap-select.js';
import 'bootstrap5';
import 'simplebar';
import Waves from 'node-waves';
import '@simonwep/pickr';
import GLightbox from 'glightbox';
import 'swiper';
import 'fg-emoji-picker';
import moment from "moment";
import './echo';
import './app';


window.jQuery = $;
window.$ = $;

window.Popper = Popper;
window.GLightbox = GLightbox;
window.Waves = Waves;
window.moment = moment;

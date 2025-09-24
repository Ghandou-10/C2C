/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

import $ from 'jquery';

window.jQuery = $;
window.$ = $;

import Popper from 'popper.js';

window.Popper = Popper;

import * as bootstrap from 'bootstrap5';
// import 'summernote';
import select2 from 'select2';
import 'parsleyjs';
import 'parsleyjs/src/i18n/ar';
import 'parsleyjs/src/i18n/en';
import 'parsleyjs/src/i18n/tr';
import SimpleBar from "simplebar";
import feather from 'feather-icons';

window.bootstrap = bootstrap;
select2();
window.SimpleBar = SimpleBar;
window.feather = feather;

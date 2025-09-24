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

import * as bootstrap from 'bootstrap4';
import 'bootstrap-select/dist/js/bootstrap-select.js';

import 'summernote';
import select2 from 'select2';

select2();
import 'parsleyjs';
import 'parsleyjs/src/i18n/ar';
import 'parsleyjs/src/i18n/en';
import 'parsleyjs/src/i18n/tr';
import 'metismenu';
import 'simplebar';

window.bootstrap = bootstrap;
import './config';
import '../editor';
import '../formValidation';

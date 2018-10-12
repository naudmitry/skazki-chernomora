window._ = require('lodash');

import $ from 'jquery';

window.$ = window.jQuery = $;

require('bootstrap');
require('select2/dist/js/select2.full');
require('bootstrap-notify');

import swal from 'sweetalert';
window.swal = swal;

const notifyService = require("./pages/admin/notify");

window.notifyService = notifyService;

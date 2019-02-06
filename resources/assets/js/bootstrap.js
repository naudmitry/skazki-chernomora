window._ = require('lodash');

import $ from 'jquery';

window.$ = window.jQuery = $;

require('jquery-ui/ui/core');
require('jquery-ui/ui/effect');
require('jquery-ui/ui/effects/effect-fade');
require('jquery-ui/ui/position');
require('jquery-ui/ui/tabbable');
require('jquery-ui/ui/widget');
require('jquery-ui/ui/widgets/mouse');
require('jquery-ui/ui/widgets/draggable');
require('jquery-ui/ui/widgets/droppable');
require('jquery-ui/ui/widgets/sortable');
require('jquery-ui/ui/widgets/spinner');
require('jquery-ui/ui/widgets/tabs');

require('bootstrap');
require('select2/dist/js/select2.full');
require('bootstrap-notify');

import swal from 'sweetalert';
window.swal = swal;

const notifyService = require("./pages/admin/notify");

window.notifyService = notifyService;

window._ = require('lodash');

import $ from 'jquery';
import swal from 'sweetalert';

window.$ = window.jQuery = $;

require('bootstrap');
require('select2/dist/js/select2.full');

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key'
// });

const notifyService = require("./pages/admin/notify");

window.notifyService = notifyService;

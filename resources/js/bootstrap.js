window._ = require('lodash');
window.Popper = require('popper.js/dist/umd/popper.js').default;
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.$ = window.jQuery = require('jquery');
require('bootstrap');

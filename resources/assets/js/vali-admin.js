require('./bootstrap');

$('.app-sidebar').scrollTo('.scroll-here', 300, {offset: -100});
InputMask({"mask": "375(99)999-99-99"}).mask($('input[type="tel"]'));

require('./vali-admin/core');
require('./vali-admin/main');
require('./vali-admin/swith-companies');
require('./vali-admin/blog');
require('./vali-admin/orders');
require('./vali-admin/faq');
require('./vali-admin/pages');
require('./vali-admin/settings');
require('./vali-admin/staff');
require('./vali-admin/companies');
require('./vali-admin/showcases');
require('./vali-admin/roles');
require('./vali-admin/content');
require('./vali-admin/common');
require('./vali-admin/buyers');
require('./vali-admin/reviews');
require('./vali-admin/handbooks');
require('./vali-admin/applications');
require('./vali-admin/seo-integrations');
require('./vali-admin/communication');
require('./vali-admin/pre-entry');
require('./vali-admin/history');
require('./vali-admin/children');

'use strict';

module.exports = function (app) {
    var controller = require('./controller');

    app.route('/').get(controller.index);
    app.route('/admin/:action/:page').get(controller.admin);
    app.route('/server/:action/:page').post(controller.server);
    app.route('/product/:id').get(controller.product);
}
'use strict';

module.exports = function(app){
    var controller = require('./controller');

    app.route('/').get(controller.index);
    app.route('/product/:id').get(controller.product);
}
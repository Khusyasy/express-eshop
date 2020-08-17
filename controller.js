'use strict';

var connection = require('./conn');

exports.index = function(req, res) {
    res.render('homepage');
};

exports.product = function(req, res) {
    res.render('product', {id: req.params.id});
};
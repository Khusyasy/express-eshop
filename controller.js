'use strict';

var connection = require('./conn');

exports.index = function(req, res) {
    connection.query("SELECT * FROM products;", function(error, rows){
        if(error){
            throw(error);
        }else{
            res.render('homepage', { products: rows });
        }
    });
};

exports.product = function(req, res) {
    res.render('product', {id: req.params.id});
};
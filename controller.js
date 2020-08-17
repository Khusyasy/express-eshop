'use strict';

var connection = require('./conn');

exports.index = function (req, res) {
    connection.query("SELECT * FROM products;", function (error, rows) {
        if (error) {
            throw (error);
        } else {
            res.render('homepage', { products: rows });
        }
    });
};

exports.product = function (req, res) {
    res.render('product', { id: req.params.id });
};

exports.admin = function (req, res) {
    const { action, page } = req.params;
    console.log(page, action);
    if (action == "add") {
        if (page == "product") {
            connection.query("SELECT * FROM categories;", function (error, cat) {
                res.render('form_add_product', { categories: cat });
            });
        }
    } else {
        res.redirect('/');
    }
};

exports.server = function (req, res) {
    const { action, page } = req.params;

    if (action == "add") {
        if (page == "product") {
            const name = req.body.name;
            const cat = req.body.cat;
            const price = req.body.price;
            const qty = req.body.qty;
            const img = req.files.img;
            img.mv('./public/images/products/' + img.name);
            connection.query(`INSERT INTO products (name, category, seller, price, quantity, image) VALUES ('${name}', ${cat}, '1', ${price}, ${qty}, '${img.name}');`, function (error, rows) {
                res.redirect('/');
            });
        }
    } else {
        res.redirect('/');
    }
};
var express = require('express');
var app = express();

app.set('view engine', 'pug');
app.set('views', './views');


app.use(express.urlencoded({ extended: true }));
app.use(express.json());

app.use(express.static('public'));

var routes = require('./routes');
routes(app);

app.listen(3000);
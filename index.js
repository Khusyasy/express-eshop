var express = require('express');
var app = express();
var fileUpload = require('express-fileupload');

app.set('view engine', 'pug');
app.set('views', './views');

app.use(fileUpload({ createParentpath: true }))
app.use(express.urlencoded({ extended: true }));
app.use(express.json());

app.use(express.static('public'));

var routes = require('./routes');
routes(app);

app.listen(3000);
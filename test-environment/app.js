const express = require('express');
const createError = require('http-errors');
const path = require('path');
const configs = require('./config');
const httpHeaders = require('./config/headers');
const routes = require('./routes');
const router = express.Router();

const app = express();

const config = configs[app.get('env')];

app.set('view engine', 'pug');

if ( app.get('env') === 'development' ) {
    app.locals.pretty = true;
}

app.set('views', path.join(__dirname, './views'));

app.locals.title = config.sitename;

app.use((req, res, next) => {
    res.set(httpHeaders);
    return next();
});

app.use(express.static("public"));

app.use((req, res, next) => {
    res.set(httpHeaders);
    return next();
});

router.get('/', (req, res, next) => {
    res.render('index');
});

app.use('/', router);

app.use((req, res, next) => {
    return next(createError(404, 'File not found'));
});

app.use((err, req, res, next) => {
    res.locals.message = err.message;
    const status = err.status || 500;
    res.locals.status = status;
    res.locals.error = req.app.get('env') === 'development' ? err: {};
    res.status(status);
    res.render('errors');
});

app.listen(3000);

module.export = app;
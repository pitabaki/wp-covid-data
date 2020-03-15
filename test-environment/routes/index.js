const express = require('express');

const router = express.Router();

router.get('/', (req, res, next) => {
    //res.send('GET route on things.');
    res.render('index');
    /*return res.render('index', {
        page: 'Home',
    });*/

});

module.exports = router;
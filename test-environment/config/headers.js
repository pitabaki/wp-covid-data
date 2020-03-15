const httpHeaders = {
    'X-Xss-Protection' : '1; mode=block' ,
    'X-Content-Type-Options' : 'nosniff' ,
    'Content-Security-Policy' : 'upgrade-insecure-requests' ,
    'Strict-Transport-Security' : 'max-age=31536000' ,
    'Referrer-Policy' : 'strict-origin-when-cross-origin',
    'Access-Control-Allow-Origin' : '*',
    'Access-Control-Allow-Credentials' : 'true'
}

module.exports = httpHeaders;
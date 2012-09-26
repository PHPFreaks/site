site
====
PHPFreaks Main Site

Setup
-----
git clone git://github.com/PHPFreaks/site.git phpfsite

Make sure you have installed [Composer][].
[Composer]: http://getcomposer.org

    cd phpfsite
    composer install
    
This should checkout all the libraries, build you a vendor directory and handle autoloader.

Point a vhost to phpfsite/web

If all goes well, you should be able to get a response from:

    yourvhost.domain.tld/hello/world



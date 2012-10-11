site
====
PHPFreaks Main Site

Setup
-----
git clone git@github.com:PHPFreaks/site.git phpfsite

Make sure you have installed [Composer][].
[Composer]: http://getcomposer.org

* A side note, if you get failures or script errors, change your php.ini for cli timeout to be > 300 seconds 

    cd phpfsite
    composer install
    
This should checkout all the libraries, build you a vendor directory and handle autoloader.

Point a vhost to phpfsite/web

If all goes well, you should be able to get a response from:

    yourvhost.domain.tld/hello/world


Coding Standards
----
Please use the [PSR-0][] coding standards for changes to the code.
[PSR-0]: https://gist.github.com/1234504
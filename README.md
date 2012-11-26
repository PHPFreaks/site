Site
====
PHPFreaks Main Site

Setup
-----
git clone git@github.com:PHPFreaks/site.git phpfsite

Make sure you have installed [Composer][].
[Composer]: http://getcomposer.org

* A side note, if you get failures or script errors, change your php.ini for cli timeout to be > 300 seconds 

    `cd phpfsite`

    `composer install`
    
This should checkout all the libraries, build you a vendor directory and handle autoloader.

Then update your configuration parameters, found at `app/config/parameters.yml`. A default version is available
for you to copy from, located at `app/config/parameters.dist.yml`. 

Point a vhost to `phpfsite/public`

If all goes well, you should be able to get a response from:

    yourvhost.domain.tld/


Coding Standards
----
Please use the [PSR-2][] coding standards / style for changes to the code.
[PSR-2]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md
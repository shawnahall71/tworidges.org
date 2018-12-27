tworidges.org
=============

This is the website code for www.tworidges.org.

Technologies
------------

* PHP
* MySQL
* HTML
* Javascript
  * Bootstrap
  * AngularUI
* CSS
  * Bootstrap

Organization
------------

* `*.php` - Files are the pages of the website.  Most use PHP just to be able to include reused components, like the navbar.  Some use PHP more extensively for things like emailing and database operations.
* `sitemap.xml` - The current sitemap that is placed on the site to be friendly to Google.
* `css/` - CSS files used on the website.  Primarily has a few custom CSS tweaks.  The Bootstrap CSS files are pulled from a CDN.
* `include/` - PHP files that are included on other pages of the website.  Includes shared Javascript, CSS, Navbar, and helper functions.
* `js/` - Javascript files that are used on the website, including the pdfjs library for displaying PDF files.  The Bootstrap Javascript files are pulled from a CDN.

References
----------

Many parts of the site include components and ideas that were borrowed from others.  I have tried to include these where I can.

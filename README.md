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
* `css/` - CSS files used on the website.  Primarily has a a few custom CSS tweaks.  The Bootstrap CSS files are pulled from a CDN.
* `include/` - PHP files that are included on other pages of the website.  Includes shared Javascript, CSS, Navbar, and helper functions.
* `js/` - Javascript files that are used on the website, including the Bootstrap AngularUI and the pdfjs library for displaying PDF files.  The Bootstrap Javascript files are pulled from a CDN.
* `directory/` - Subdirectory of the website, which contains the `*.php` files to display the church member directory.  Pulls information from a back end MySQL DB.  This directory is password protected on the actual web server.

References
----------

Many parts of the site include components and ideas that were borrowed from others.  I have tried to include these where I can.

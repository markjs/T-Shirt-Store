# Web Programming 2012 Assignment
## T-Shirt Store

This document will talk through the application, highlighting key struggles and learning points along the way.

### Requests

Using the `.htaccess` file, all requests are routed to the `index.php` file, which looks like this:

	<?php

	session_start();

	include 'functions.php';
	include 'config.php';
	include 'routes.php';
		
This file includes the `functions.php` and `config.php` files which are used to define common settings and functions to be used across the site. The `routes.php` function then handles the urls to display the relevant content.

### Routing

I was not immediately keen on the routing method provided by the framework for two main reasons. Firstly, it forced the usage of untidy URLs in the pages, lacking semantic meaning and a consistent structure. Secondly, and more importantly, it required the adding of pages in multiple places. You not only had to create the relevant files for the page, but you also had to define it within the routing document. I knew this could be made more efficient, so vastly refactored the routing function.

The `routes.php` function is heavily commented to explain exactly what is happening.

This routing function evolved over a number of iterations, with minor tweaks and improvements made along the way. Many of these were made as it was realised that many different URL patterns needed to be accepted. The routing is set up to point all requests to the page with the same name as the top level URL path, and pointing other parts of the request to that page as parameters.

eg: `/products/red-tshirt` gets handled by the `products` page with `red-tshirt` being passed to it as a parameter.
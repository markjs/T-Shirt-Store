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

A key struggle in the development of this routing function was consistently allowing multi-level paths in requests as well as HTTP GET parameters if necessary. This was eventually solved using a number of PHP string methods, such as `parse_str` and `substr`, and using `explode` to store the URL fragments in arrays, to allow them to be more easily accessible. **This also provides a good area for future expansion, with the routing function allowing for more complex URLs if necessary.**

### Page Controllers

Once the router parses a request, it pulls in a page controller using PHP's `include` function. The page controllers are automatically detected from the URL requested, with a 404 catch if a controller is not found. These page controllers then manage all the logic and processing for the application, connecting the UI tier with the Data in the database.

The controllers behave differently depending on the request passed to them. By accessing the `$request_args` array, the controllers can determine parts of the URL requested by the user, and perform functions accordingly. In the controllers in the application, the first entry of the array, `$request_args[0]`, is tested through multiple `if` statements and blocks of the application's code are executed if it matches a particular value. In a number of situations, this could be executed with a single `switch` statement, but `if` and `else if` statements were used for more freedom. In the future, it may well be necessary to test for more than just `$request_args[0]` to determine the necessary functions, and by avoiding a `switch` statement, this will be much easier to integrate into the system.

#### Database Requests

Page controllers are the glue between the application's front end and the database, so the SQL queries happen in these files. A number of online resources were helpful in building queries and I learnt a lot about the power of SQL and how to access some of this power with PHP through different forms of queries to perform a variety of functions.

One issue was found when constructing the SQL queries, which was a severe lack of standards in online documentation. Many online resources used slightly different methods and conventions for SQL queries, resulting in a lack of consistency across the application. This caused some minor problems with variable names overlapping and conflicting in the program logic but renaming a number of the queries to more specific names was the solution of choice here.

### Views

On the front end, the content must be presented and structured through HTML. PHP integrates extremely well with HTML and allows simple rendering of browser output from within your programming logic. Combining many separate disciplines into one file, however, is poor practice and results in cluttered and confusing documents, often causing errors in code that can be hard to debug. For this application, the content output structure was handled using view files, located in the `views` directory and saved with a `.view.php` file extension.

The view files handle the HTML markup and structure, and small amounts of PHP to inject the relevant data into the final output.

One of the more logic heavy views is `size_form.view.php`. This is used to generate a form in which the user can select the size for the t-shirt. Database access was necessary, to query the `size-stock` table to determine the stock levels of the product across different sizes. From this data, the select options were generated showing the stock level of that product in that size, and omitting any options that were out of stock. Different outcomes of this can be seen across the different products, with particular reference to "Women's Red T-Shirt" correctly displaying its out of stock status.

Many of the other views contain less code, and are just used for a very specific piece of data structure in HTML. One good example of this is the `category_list.view.php` file, which is a single of HTML with some PHP values echoed in, designed to be looped over for each of the categories being displayed.

#### Including View Files

View files are included from within the page controllers when necessary. A common function was built to aid in getting the view files included. This function simply appends the `.view.php` extension onto the requested view to include the file more simply and cleanly, making the code much more readable and consistent. This also allows for quick customisation, should it be decided that `.view.php` be changed to `.html.php`, for example, this can be changed in one place, as opposed to having to trawl through many pages to refactor multiple repetitions of the function.
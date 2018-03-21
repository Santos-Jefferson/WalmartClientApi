# Walmart Search API
Demo: https://walmart-client-api.herokuapp.com/

This application was written using PHP and HTML, connecting to the Walmart Labs endpoint with CURL. It is published on Heroku, because the PHP is not supported on github pages.To access the application, please click: https://walmart-client-api.herokuapp.com/
All code is commented with easy understanding. 

Search Feature
 - This application accepts a product search string from the user.
 - The string is passed throught an API connection with Walmart Labs.
 - The Walmart Labs Product Lookup API retrieve details about the first 10 items in the search result
 - Details about the first 10 product search results is showed to the user.

Recommendations Feature
 - Accept user input via selection on a product name or thumbnail image
 - Walmart Labs Product Recommendation API is used to search for recommendations based upon the user's selected item
 - Walmart Labs Product Lookup API to retrieve details about the first 10 items in the recommended results
 - Display the recommendation results (first 10 items) to the user below the specific product selected.

# HEROKU
A barebones PHP app that makes use of the [Silex](http://silex.sensiolabs.org/) web framework, which can easily be deployed to Heroku.

This application supports the [Getting Started with PHP on Heroku](https://devcenter.heroku.com/articles/getting-started-with-php) article - check it out.

## Deploying

Install the [Heroku Toolbelt](https://toolbelt.heroku.com/).

```sh
$ git clone git@github.com:heroku/php-getting-started.git # or clone your own fork
$ cd php-getting-started
$ heroku create
$ git push heroku master
$ heroku open
```

or

[![Deploy to Heroku](https://www.herokucdn.com/deploy/button.png)](https://heroku.com/deploy)

## Documentation

For more information about using PHP on Heroku, see these Dev Center articles:

- [Getting Started with PHP on Heroku](https://devcenter.heroku.com/articles/getting-started-with-php)
- [PHP on Heroku](https://devcenter.heroku.com/categories/php)

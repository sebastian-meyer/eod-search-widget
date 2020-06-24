OpenSearch widget for VuFind
============================

This is just a rough proof-of-concept made during an [eod](https://books2ebooks.eu) hackathon back in 2011. Please do not use this in production, but merely as an inspiration!

Since the [eod](https://books2ebooks.eu) catalog is based on the popular [VuFind](https://vufind.org) library resource discovery system you can easily adapt this for other instances as well (or basically any other [OpenSearch](http://www.opensearch.org) interface). [VuFind is open source](https://github.com/vufind-org/vufind) and developed and maintained by [Villanova University's Falvey Memorial Library](https://www.library.villanova.edu/).

Installation
------------

- Adjust `$eodOpenSearch` in [server/search.php](server/search.php) according to your requirements.
- Copy the `server/*` files to any webserver.
- Adjust [client/js/jquery.eod.js](client/js/jquery.eod.js) according to your requirements.
- Add the `client/js/*` files to your website.
- Take a look at [client/index.html](client/index.html) for integrating with your pages.

Ideas
-----

Instead of going for a client/server approach I'd do the RSS parsing completely client-side in Javascript nowadays. The server part just adds unnecessary complexity. Back in the day I was curious about [jQuery-PHP](http://jquery.hohli.com/) and wanted to try it out. [jQuery-PHP is open source](https://code.google.com/archive/p/jquery-php/) and developed by [Anton Shevchuk](http://anton.shevchuk.name/).

Known Issues
------------

The OpenSearch interface of VuFind only returns the top 50 results. There is no paging or any chance of getting more hits.

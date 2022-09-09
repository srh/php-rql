PHP-RQL
=======

A PHP client driver for the RethinkDB query language (ReQL).

PHP-RQL is licensed under the terms of the Apache License 2.0 http://www.apache.org/licenses/LICENSE-2.0

This is based off the original PHP-RQL, whose project website is at http://php-rql.dnsalias.net

Testing
-----------------------

To run the tests at the command line, issue `composer install` and then `composer test` at the package root. This requires `composer` to be available in `$PATH`.

Documentation
----------------

Read `docs/index.html`, or `docs/php-index.md`.

The official [JavaScript driver documentation](http://rethinkdb.com/api/javascript/) has more details on the available terms. Most examples for the JavaScript driver can be translated to PHP-RQL with few changes.

Example
----------------

```php
<?php
    // Load the driver
    require_once("rdb/rdb.php");

    // Connect to localhost
    $conn = r\connect('localhost');

    // Create a test table
    r\db("test")->tableCreate("tablePhpTest")->run($conn);

    // Insert a document
    $document = array('someKey' => 'someValue');
    $result = r\table("tablePhpTest")->insert($document)
        ->run($conn);
    echo "Insert: $result\n";

    // How many documents are in the table?
    $result = r\table("tablePhpTest")->count()->run($conn);
    echo "Count: $result\n";

    // List the someKey values of the documents in the table
    // (using a mapping-function)
    $result = r\table("tablePhpTest")->map(function($x) {
            return $x('someKey');
        })->run($conn);

    foreach ($result as $doc) {
        print_r($doc);
    }

    // Delete the test table
    r\db("test")->tableDrop("tablePhpTest")->run($conn);
?>
```

Release Notes
----------------

This is based off of https://github.com/danielmewes/php-rql, and his
past release notes as of version 2.3.0 are available on its website:
http://php-rql.dnsalias.net

Further changes:
- Added support for PHP 8 (and dropped support for prior versions)
- Added support for RethinkDB 2.4 commands (write hooks and bitwise ops)

Attributions
------------
* PHP-RQL was originally developed by Daniel Mewes.
* PHP-RQL uses pb4php http://code.google.com/p/pb4php/ by Nikolai Kordulla.
* The API documentation is based on the official RethinkDB API documentation.
* The API documentation is built using jTokenizer by Tim Whitlock (http://timwhitlock.info) and PHP Markdown by Michel Fortin (https://michelf.ca/).

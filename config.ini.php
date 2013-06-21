<?php

require('meekrodb.2.2.class.php');

// Set database
DB::$user = 'dbo473369652';
DB::$password = 'about:blank';
DB::$dbName = 'db473369652';
DB::$host = 'db473369652.db.1and1.com'; //defaults to localhost if omitted
DB::$port = '3306'; // defaults to 3306 if omitted
DB::$encoding = 'utf8'; // defaults to latin1 if omitted
DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;

?>
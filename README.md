# Description
  Small and convenient library for working with superglobal or regular arrays.
  
  Such as $_GET, $_POST, $_REQUEST, $_COOKIE, $_SESSION, $_SERVER.
  
  Supports nested keys: $_POST['foo']['bar']['baz'] ==> Input::post('foo.bar.baz')

# Install

```text
composer require balambasik/input
```

# Using

```php
<?php

include_once 'vendor/autoload.php';

use \Balambasik\Input;

// $_POST
$post = Input::post();

// $_POST["foo"]
$foo = Input::post("foo");

// nested $_POST["foo"]["bar"]["baz"]
$baz = Input::post("foo.bar.baz");

// default value - if the key is not set
$bar = Input::post("foo.bar", "default");

// custom delimiter
Input::setDelimiter(":");
$baz = Input::post("foo:bar:baz", "default");

// methods
Input::get(); // $_GET
Input::post(); // $_POST
Input::request(); // $_REQUEST
Input::cookie(); // $_COOKIE
Input::session(); // $_SESSION
Input::server(); // $_SERVER

// any array
$bar = Input::arr($array, "foo.bar", "default");

```


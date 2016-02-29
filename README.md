Akismet
-------
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/dbe229b7-2d94-4b89-ae1b-94acb80ee91d/mini.png)](https://insight.sensiolabs.com/projects/dbe229b7-2d94-4b89-ae1b-94acb80ee91d)
[![Build Status](https://travis-ci.org/OpenClassrooms/Akismet.svg)](https://travis-ci.org/OpenClassrooms/Akismet)
[![Coverage Status](https://coveralls.io/repos/OpenClassrooms/Akismet/badge.svg?branch=master)](https://coveralls.io/r/OpenClassrooms/Akismet?branch=master)

This is a PHP5 library that provides functionality of [Akismet Spam Protection service](https://akismet.com/) in your application.

## Installation
The easiest way to install Akismet Library is via [composer](http://getcomposer.org/).

Create the following `composer.json` file and run the `php composer.phar install` command to install it.

```json
{
    "require": {
        "openclassrooms/akismet": "*"
    }
}
```
```php
<?php
require 'vendor/autoload.php';

use OpenClassrooms\Akismet\Services\AkismetService;

//do things
```
<a name="install-nocomposer"/>

## Basic Usage
AkismetServiceImpl class need to set a Client to communicate with Akismet Spam Protection service. This library provides a client base on GuzzleHttp\Client. But you can implement your owns client. Then you can set the client by the method ```AkismetServiceImpl::setClient()```

### The Models
#### Object
This Library defines an object "Comment" which have to passed as argument into the differents method of AkismetService
```php
use OpenClassrooms\Akismet\Models\Comment;

$comment = new CommentImpl();
```
#### Builder
This library provides a Builder to create this object : 
```php
use OpenClassrooms\Akismet\Models\CommentBuilder;

$comment = $commentBuilder->create()
                          ->withUserIp(CommentStub::USER_IP)
                          ->withUserAgent(CommentStub::USER_AGENT)
                          ->withReferrer(CommentStub::REFERRER)
                          ->withPermalink(CommentStub::PERMALINK)
                          ->withAuthorName(CommentStub::AUTHOR_NAME)
                          ->withAuthorEmail(CommentStub::AUTHOR_EMAIL)
                          ->withContent(CommentStub::CONTENT)
                          ->build();
```
#### Service
```php
use OpenClassrooms\Akismet\Services\Impl\AkismetServiceImpl;

$akismetService = new AkismetServiceImpl();

// commentCheck method need 1 only one parameter which have to be the Object Comment to check
if ($akismetService->commentCheck($comment)) {
 // store the comment and mark it as spam (in case of a mis-diagnosis).
} else {
 // store the comment normally
}
```
to submit mis-diagnosed spam and ham, which improves the system for everybody.
```php
$akismetService->submitSpam($comment);
```
And
```php
$akismetService->submitHam($comment);
```

## Besides this Library
If you plan to use Akismet Library in a Symfony2 project, check out the AkismetBundle. The bundle provides an easy configuration option for this library.

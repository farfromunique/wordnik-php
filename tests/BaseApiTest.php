<?php

// Unit tests for PHP Wordnik API client.
//
// Requires you to set three environment varibales:
//     API_KEY      your API key
//     USER_NAME    the username of a user
//     PASSWORD     the user's password

// Run all tests:
//
//     phpunit tests/AccountApiTest.php
//     phpunit tests/WordApiTest.php
//     phpunit tests/WordsApiTest.php
//     phpunit tests/WordListApiTest.php
//     phpunit tests/WordListsApiTest.php

// If you require PHPUnit to be installed, first get PEAR:
//
// $ wget http://pear.php.net/go-pear.phar
// $ php -d detect_unicode=0 go-pear.phar
//
// Then install PHPUnit:
//
// $ pear config-set auto_discover
// $ pear install pear.phpunit.de/PHPUnit

namespace wordnik\tests;

require_once __DIR__ . '/../vendor/autoload.php';

/* Load the .env file into environment variables. */
$dotenv = new \Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

// This used to be required, but now gives an error:
// Cannot redeclare phpunit_autoload()
// require_once '/usr/lib/php/PHPUnit/Autoload.php';
use PHPUnit\Framework\TestCase;

class BaseApiTest extends TestCase {

  public function setUp() {
    $this->apiUrl = 'http://api.wordnik.com/v4';
    $this->apiKey = getenv('API_KEY');
    $this->username = getenv('USER_NAME');
    $this->password = getenv('PASSWORD');
    $this->client = new \wordnik\APIClient($this->apiKey, $this->apiUrl);
    $this->accountApi = new \wordnik\AccountApi($this->client);
    $this->wordApi = new \wordnik\WordApi($this->client);
    $this->wordListApi = new \wordnik\WordListApi($this->client);
    $this->wordListsApi = new \wordnik\WordListsApi($this->client);
    $this->wordsApi = new \wordnik\WordsApi($this->client);
  }

  public function tearDown() {
      unset($this->client);
  }

}

?>

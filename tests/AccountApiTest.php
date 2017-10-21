<?php
namespace wordnik\tests;

require_once __DIR__ . '/../vendor/autoload.php';

class AccountApiTest extends BaseApiTest {

  public function setUp() {
    parent::setUp();
    $this->authToken = $this->accountApi->authenticate($this->username, $this->password);
    date_default_timezone_set('America/Los_Angeles');
  }

  public function testAuthenticate() {
    $res = $this->accountApi->authenticate($this->username, $this->password);
    $this->assertObjectHasAttribute('token', $res);
    $this->assertNotEquals(0, $res->userId);
    $this->assertObjectHasAttribute('userSignature', $res);
  }

/* Disabling this test, as the underlying function is disabled
  public function testAuthenticatePost() {
    $res = $this->accountApi->authenticatePost($this->username, $this->password);
    $this->assertObjectHasAttribute('token', $res);
    $this->assertNotEquals(0, $res->userId);
    $this->assertObjectHasAttribute('userSignature', $res);
  } */

  public function testGetWordListsForLoggedInUser() {
    $res = $this->accountApi->getWordListsForLoggedInUser($this->authToken);
    $this->assertNotEquals(0, count($res));
  }

  public function testGetApiTokenStatus() {
    $res = $this->accountApi->getApiTokenStatus($this->authToken);
    $this->assertObjectHasAttribute('valid', $res);
    $this->assertNotEquals(0, count($res->remainingCalls));
  }

  public function testGetLoggedInUser() {
    $res = $this->accountApi->getLoggedInUser($this->authToken);
    $this->assertNotEquals(0, $res->id);
    $this->assertEquals($this->username, $res->username);
    $this->assertEquals(0, $res->status);
    $this->assertNotEquals(null, $res->email);
  }


}
?>

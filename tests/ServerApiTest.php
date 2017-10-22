<?php
namespace wordnik\tests;

require_once __DIR__ . '/../vendor/autoload.php';

date_default_timezone_set('America/Los_Angeles');

class ServerApiTest extends BaseApiTest {

	public function testWordApis() {
		/* tests if the server is present, and responding as expected. Not a test of the PHP. */
		$ch = curl_init("http://api.wordnik.com/v4/word.json");
		if (! $ch) {
			die("No php curl handle");
		}
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$data = curl_exec($ch);
		$doc = json_decode($data);

		$this->assertEquals(12, count($doc->apis));
	}
}
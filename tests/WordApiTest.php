<?php
namespace wordnik\tests;

require_once __DIR__ . '/../vendor/autoload.php';

date_default_timezone_set('America/Los_Angeles');

class WordApiTest extends BaseApiTest {

	public function setUp() {
		parent::setUp();
		$this->options = new \wordnik\WordnikOptions();
	}

	public function testGetWord() {
		$res = $this->wordApi->getWord('cat');
		$this->assertEquals('cat', $res->word);
	}

	public function testGetWordWithSuggestions() {
		$this->options->setIncludeSuggestions(true);
		$res = $this->wordApi->getWord('cAt', $this->options);
		$this->assertEquals('cAt', $res->word);
	}

	public function testGetWordWithCanonicalForm() {
		$this->options->setUseCanonical(true);
		$res = $this->wordApi->getWord('cAt', $this->options);
		$this->assertEquals('cat', $res->word);
	}

	public function testGetDefinitions() {
		$res = $this->wordApi->getDefinitions('cat');
		$this->assertEquals(15, count($res));
	}

	public function testGetDefinitionsWithSpacesInWord() {
		$res = $this->wordApi->getDefinitions('bon vivant');
		$this->assertEquals(1, count($res));
	}

	public function testGetExamples() {
		$this->options->setIncludeDuplicates(false)->setUseCanonical(false)->setSkip(0)->setLimit(5);
		$res = $this->wordApi->getExamples('cat', $this->options);
		$this->assertEquals(5, count($res->examples));
	}

	public function testGetTopExample() {
		$this->options->setLimit(5);
		$res = $this->wordApi->getTopExample('cat', $this->options);
		$this->assertEquals('cat', $res->word);
	}

	public function testGetHyphenation() {
		$this->options->setSourceDictionary('')->setUseCanonical(false)->setLimit(1);
		$res = $this->wordApi->getHyphenation('catalog', $this->options);
		$this->assertEquals(1, count($res));
	}

	public function testGetWordFrequency() {
		$res = $this->wordApi->getWordFrequency('catalog');
		$this->assertFalse($res->totalCount == 0);
	}

	public function testGetPhrases() {
		$res = $this->wordApi->getPhrases('money');
		$this->assertFalse(count($res) == 0);
	}

	public function testGetRelatedWords() {
		$res = $this->wordApi->getRelatedWords('cat');
		foreach ($res as $related) {
			$this->assertLessThan(11, count($related->words));
		}
	}

	public function testGetAudio() {
		$this->options->setUseCanonical(true)->setLimit(2);
		$res = $this->wordApi->getAudio('cat', $this->options);
		$this->assertEquals(2, count($res));
	}

	public function testGetScrabbleScore() {
		$res = $this->wordApi->getScrabbleScore('quixotry');
		$this->assertEquals(27, $res->value);
	}

	public function testGetEtymologies() {
		$res = $this->wordApi->getEtymologies('butter');
		$this->assertFalse(strpos($res[0], 'of Scythian origin') === false);
	}

}
?>

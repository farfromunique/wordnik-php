<?php
namespace wordnik\tests;

require_once __DIR__ . '/../vendor/autoload.php';

date_default_timezone_set('America/Los_Angeles');

class WordApiTest extends BaseApiTest {

  public function testGetWordWithSuggestions() {
    $res = $this->wordApi->getWord('cAt', $includeSuggestions=true);
    $this->assertEquals('cAt', $res->word);
  }

  public function testGetWordWithCanonicalForm() {
    $res = $this->wordApi->getWord('cAt', 'true');
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
    $res = $this->wordApi->getExamples('cat', 'false', 'false', 0, $limit=5);
    $this->assertEquals(5, count($res->examples));
  }

  public function testGetTopExample() {
    $res = $this->wordApi->getTopExample('cat', $limit=5);
    $this->assertEquals('cat', $res->word);
  }

  public function testGetHyphenation() {
    $res = $this->wordApi->getHyphenation('catalog', $sourceDictionary='', $useCanonical=false, $limit=1);
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
    $res = $this->wordApi->getAudio('cat', $useCanonical=True, $limit=2);
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
	public function setUp() {
		parent::setUp();
		$this->options = new \wordnik\WordnikOptions();
	}

	public function testGetWord() {
		$res = $this->wordApi->getWord('cat');
		$this->assertEquals('cat', $res->word);
	}


}
?>

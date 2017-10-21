<?php 

namespace wordnik\tests;

require_once __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class ClassesTest extends TestCase {
	private $apiUrl;
	private $apiKey;
	private $username;
	private $password;
	private $apiClient;

	public function setUp()
	{
		$this->apiUrl = 'http://api.wordnik.com/v4';
		$this->apiKey = "b1672335056adf6367729016818029d8dd66d4aa52d5a7886";
		$this->username = "aaron@acwpd.com";
		$this->password = "CoqueAC160NK!";
		$this->apiClient = new \wordnik\APIClient($this->apiKey, $this->apiUrl);
	}

	public function testCreateAPIClient()
	{
		$this->apiClient = new \wordnik\APIClient($this->apiKey, $this->apiUrl);
		$this->assertInstanceOf(\wordnik\APIClient::class, $this->apiClient);
	}

	public function testCreateAccountAPI()
	{
		$instance = new \wordnik\AccountAPI($this->apiClient);
		$this->assertInstanceOf(\wordnik\AccountAPI::class, $instance);
	}

	public function testCreateWordAPI()
	{
		$instance = new \wordnik\WordAPI($this->apiClient);
		$this->assertInstanceOf(\wordnik\WordAPI::class, $instance);
	}

	public function testCreateWordListAPI()
	{
		$instance = new \wordnik\WordListAPI($this->apiClient);
		$this->assertInstanceOf(\wordnik\WordListAPI::class, $instance);
	}

	public function testCreateWordListsAPI()
	{
		$instance = new \wordnik\WordListsAPI($this->apiClient);
		$this->assertInstanceOf(\wordnik\WordListsAPI::class, $instance);
	}

	public function testCreateWordsAPI()
	{
		$instance = new \wordnik\WordsAPI($this->apiClient);
		$this->assertInstanceOf(\wordnik\WordsAPI::class, $instance);
	}

	public function testCreateModelApiTokenStatus()
	{
		$instance = new \wordnik\APITokenStatus();
		$this->assertInstanceOf(\wordnik\APITokenStatus::class, $instance);
	}

	public function testCreateModelAudioFile()
	{
		$instance = new \wordnik\AudioFile();
		$this->assertInstanceOf(\wordnik\AudioFile::class, $instance);
	}

	public function testCreateModelAuthenticationToken()
	{
		$instance = new \wordnik\AuthenticationToken();
		$this->assertInstanceOf(\wordnik\AuthenticationToken::class, $instance);
	}

	public function testCreateModelBigram()
	{
		$instance = new \wordnik\Bigram();
		$this->assertInstanceOf(\wordnik\Bigram::class, $instance);
	}

	public function testCreateModelCitation()
	{
		$instance = new \wordnik\Citation();
		$this->assertInstanceOf(\wordnik\Citation::class, $instance);
	}

	public function testCreateModelContentProvider()
	{
		$instance = new \wordnik\ContentProvider();
		$this->assertInstanceOf(\wordnik\ContentProvider::class, $instance);
	}

	public function testCreateModelDefinition()
	{
		$instance = new \wordnik\Definition();
		$this->assertInstanceOf(\wordnik\Definition::class, $instance);
	}

	public function testCreateModelDefinitionSearchResults()
	{
		$instance = new \wordnik\DefinitionSearchResults();
		$this->assertInstanceOf(\wordnik\DefinitionSearchResults::class, $instance);
	}

	public function testCreateModelExample()
	{
		$instance = new \wordnik\Example();
		$this->assertInstanceOf(\wordnik\Example::class, $instance);
	}

	public function testCreateModelExampleSearchResults()
	{
		$instance = new \wordnik\ExampleSearchResults();
		$this->assertInstanceOf(\wordnik\ExampleSearchResults::class, $instance);
	}

	public function testCreateModelExampleUsage()
	{
		$instance = new \wordnik\ExampleUsage();
		$this->assertInstanceOf(\wordnik\ExampleUsage::class, $instance);
	}

	public function testCreateModelFacet()
	{
		$instance = new \wordnik\Facet();
		$this->assertInstanceOf(\wordnik\Facet::class, $instance);
	}

	public function testCreateModelFacetValue()
	{
		$instance = new \wordnik\FacetValue();
		$this->assertInstanceOf(\wordnik\FacetValue::class, $instance);
	}

	public function testCreateModelFrequency()
	{
		$instance = new \wordnik\Frequency();
		$this->assertInstanceOf(\wordnik\Frequency::class, $instance);
	}

	public function testCreateModelFrequencySummary()
	{
		$instance = new \wordnik\FrequencySummary();
		$this->assertInstanceOf(\wordnik\FrequencySummary::class, $instance);
	}

	public function testCreateModelLabel()
	{
		$instance = new \wordnik\Label();
		$this->assertInstanceOf(\wordnik\Label::class, $instance);
	}

	public function testCreateModelNote()
	{
		$instance = new \wordnik\Note();
		$this->assertInstanceOf(\wordnik\Note::class, $instance);
	}

	public function testCreateModelRelated()
	{
		$instance = new \wordnik\Related();
		$this->assertInstanceOf(\wordnik\Related::class, $instance);
	}

	public function testCreateModelScoredWord()
	{
		$instance = new \wordnik\ScoredWord();
		$this->assertInstanceOf(\wordnik\ScoredWord::class, $instance);
	}

	public function testCreateModelScrabbleScoreResult()
	{
		$instance = new \wordnik\ScrabbleScoreResult();
		$this->assertInstanceOf(\wordnik\ScrabbleScoreResult::class, $instance);
	}

	public function testCreateModelSentence()
	{
		$instance = new \wordnik\Sentence();
		$this->assertInstanceOf(\wordnik\Sentence::class, $instance);
	}

	public function testCreateModelSimpleDefinition()
	{
		$instance = new \wordnik\SimpleDefinition();
		$this->assertInstanceOf(\wordnik\SimpleDefinition::class, $instance);
	}

	public function testCreateModelSimpleExample()
	{
		$instance = new \wordnik\SimpleExample();
		$this->assertInstanceOf(\wordnik\SimpleExample::class, $instance);
	}

	public function testCreateModelStringValue()
	{
		$instance = new \wordnik\StringValue();
		$this->assertInstanceOf(\wordnik\StringValue::class, $instance);
	}

	public function testCreateModelSyllable()
	{
		$instance = new \wordnik\Syllable();
		$this->assertInstanceOf(\wordnik\Syllable::class, $instance);
	}

	public function testCreateModelTextPron()
	{
		$instance = new \wordnik\TextPron();
		$this->assertInstanceOf(\wordnik\TextPron::class, $instance);
	}

	public function testCreateModelUser()
	{
		$instance = new \wordnik\User();
		$this->assertInstanceOf(\wordnik\User::class, $instance);
	}

	public function testCreateModelWordList()
	{
		$instance = new \wordnik\WordList();
		$this->assertInstanceOf(\wordnik\WordList::class, $instance);
	}

	public function testCreateModelWordListWord()
	{
		$instance = new \wordnik\WordListWord();
		$this->assertInstanceOf(\wordnik\WordListWord::class, $instance);
	}

	public function testCreateModelWordObject()
	{
		$instance = new \wordnik\WordObject();
		$this->assertInstanceOf(\wordnik\WordObject::class, $instance);
	}

	public function testCreateModelWordOfTheDay()
	{
		$instance = new \wordnik\WordOfTheDay();
		$this->assertInstanceOf(\wordnik\WordOfTheDay::class, $instance);
	}

	public function testCreateModelWordSearchResult()
	{
		$instance = new \wordnik\WordSearchResult();
		$this->assertInstanceOf(\wordnik\WordSearchResult::class, $instance);
	}

	public function testCreateModelWordSearchResults()
	{
		$instance = new \wordnik\WordSearchResults();
		$this->assertInstanceOf(\wordnik\WordSearchResults::class, $instance);
	}

}
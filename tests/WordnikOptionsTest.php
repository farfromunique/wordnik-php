<?php 

namespace wordnik\tests;

require_once __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class WordnikOptionsTest extends TestCase {
	private $opt;

	public function setUp()
	{
		$this->opt = new \wordnik\WordnikOptions();
	}

	public function testBasicGettersAndSetters()
	{
		$this->opt->setSkip( 3 );
		$this->assertEquals(3,$this->opt->getSkip());

		$this->opt->setLimit( 2 );
		$this->assertEquals(2,$this->opt->getLimit());

		$this->opt->setIncludeDuplicates( true );
		$this->assertEquals('true',$this->opt->getIncludeDuplicates());

		$this->opt->setUseCanonical( true );
		$this->assertEquals('true',$this->opt->getUseCanonical());

		$this->opt->setIncludeSuggestions( true );
		$this->assertEquals('true',$this->opt->getIncludeSuggestions());

		$this->opt->setPartOfSpeech( 'verb' );
		$this->assertEquals('verb',$this->opt->getPartOfSpeech());

		$this->opt->setIncludeRelated( true );
		$this->assertEquals('true',$this->opt->getIncludeRelated());

		$this->opt->setSourceDictionary( 'all' );
		$this->assertEquals('all',$this->opt->getSourceDictionary());

		$this->opt->setSourceDictionaries( 'ahd,century' );
		$this->assertEquals('ahd,century',$this->opt->getSourceDictionaries());

		$this->opt->setRelationshipTypes( 'synonym' );
		$this->assertEquals('synonym',$this->opt->getRelationshipTypes());

		$this->opt->setLimitPerRelationshipType( 3 );
		$this->assertEquals(3,$this->opt->getLimitPerRelationshipType());

		$this->opt->setTypeFormat( 'ahd' );
		$this->assertEquals('ahd',$this->opt->getTypeFormat());

		$this->opt->setStartYear( 1950 );
		$this->assertEquals(1950,$this->opt->getStartYear());

		$this->opt->setEndYear( 1970 );
		$this->assertEquals(1970,$this->opt->getEndYear());

		$this->opt->setWlmi( 1 );
		$this->assertEquals(1,$this->opt->getWlmi());

		$this->opt->setCaseSensitive( true );
		$this->assertEquals('true',$this->opt->getCaseSensitive());

		$this->opt->setIncludePartOfSpeech( 'noun' );
		$this->assertEquals('noun',$this->opt->getIncludePartOfSpeech());

		$this->opt->setExcludePartOfSpeech( 'noun' );
		$this->assertEquals('noun',$this->opt->getExcludePartOfSpeech());

		$this->opt->setMinCorpusCount( 2 );
		$this->assertEquals(2,$this->opt->getMinCorpusCount());

		$this->opt->setMaxCorpusCount( 3 );
		$this->assertEquals(3,$this->opt->getMaxCorpusCount());

		$this->opt->setMinDictionaryCount( 2 );
		$this->assertEquals(2,$this->opt->getMinDictionaryCount());

		$this->opt->setMaxDictionaryCount( 3 );
		$this->assertEquals(3,$this->opt->getMaxDictionaryCount());

		$this->opt->setMinLength( 3 );
		$this->assertEquals(3,$this->opt->getMinLength());

		$this->opt->setMaxLength( 4 );
		$this->assertEquals(4,$this->opt->getMaxLength());

		$this->opt->setDateFromString( '2005-08-12' );
		$this->assertEquals('2005-08-12',$this->opt->getDate());

		$this->opt->setDateFromDate( new \DateTime('2005-08-12') );
		$this->assertEquals('2005-08-12',$this->opt->getDate());

		$this->opt->setFindSenseForWord( 'past' );
		$this->assertEquals('past',$this->opt->getFindSenseForWord());

		$this->opt->setIncludeSourceDictionaries( 'ahd' );
		$this->assertEquals('ahd',$this->opt->getIncludeSourceDictionaries());

		$this->opt->setExcludeSourceDictionaries( 'century' );
		$this->assertEquals('century',$this->opt->getExcludeSourceDictionaries());

		$this->opt->setExpandTerms( 'synonym' );
		$this->assertEquals('synonym',$this->opt->getExpandTerms());

		$this->opt->setIncludeTags( true );
		$this->assertEquals('true',$this->opt->getIncludeTags());

		$this->opt->setSortBy( 'alpha' );
		$this->assertEquals('alpha',$this->opt->getSortBy());

		$this->opt->setSortOrder( 'asc' );
		$this->assertEquals('asc',$this->opt->getSortOrder());

		$this->opt->setHasDictionaryDef( false );
		$this->assertEquals('false',$this->opt->getHasDictionaryDef());

		$this->opt->setPermalink( 'http://www.wordnik.com/test' );
		$this->assertEquals('http://www.wordnik.com/test',$this->opt->getPermalink());

		$this->opt->setWordList( new \wordnik\WordList() );
		$this->assertEquals(new \wordnik\WordList(),$this->opt->getWordList());
	}
}
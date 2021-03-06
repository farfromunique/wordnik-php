<?php 

namespace wordnik;

class WordnikOptions
{
	/******************************************************************/
	/*                                                                */
	/*                                                                */
	/*                                                                */
	/*                                                                */
	/*                  Private variables below here                  */
	/*                                                                */
	/*                                                                */
	/*                                                                */
	/*                                                                */
	/******************************************************************/

	private $caseSensitive;				// bool
	private $date;						// string (yyyy-mm-dd)
	private $endYear;					// int
	private $excludePartOfSpeech;		// string
	private $excludeSourceDictionaries;	// string
	private $expandTerms;				// string [synonym, hypernym]
	private $findSenseForWord;			// string
	private $hasDictionaryDef;			// bool
	private $includeDuplicates;			// bool
	private $includePartOfSpeech;		// string
	private $includeRelated;			// bool
	private $includeSourceDictionaries; // string
	private $includeSuggestions;		// bool
	private $includeTags;				// bool
	private $limit;						// int
	private $limitPerRelationshipType;	// int
	private $maxCorpusCount;			// int
	private $maxDictionaryCount;		// int
	private $maxLength;					// int
	private $minCorpusCount;			// int
	private $minDictionaryCount;		// int
	private $minLength;					// int
	private $partOfSpeech;				// string
	private $permalink;					// string
	private $relationshipTypes;			// string
	private $skip;						// int
	private $sortBy;					// string [alpha, count, length]
	private $sortOrder;					// string [asc, desc]
	private $sourceDictionaries;		// string
	private $sourceDictionary;			// string
	private $startYear;					// int
	private $StringValue;				// array/StringValue
	private $typeFormat;				// string
	private $useCanonical;				// bool
	private $wlmi;						// int
	private $WordList;					// WordList


	/******************************************************************/
	/*            __construct() sets everything to default            */
	/******************************************************************/
	public function __construct()
	{
		$this->skip = 0;
		$this->limit = 100;
		$this->includeDuplicates = 'false';
		$this->useCanonical = 'false';
		$this->includeSuggestions = 'false';
		$this->partOfSpeech = '';
		$this->includeRelated = 'true';
		$this->sourceDictionary = '';
		$this->sourceDictionaries = '';
		$this->relationshipTypes = '';
		$this->limitPerRelationshipType = 10;
		$this->typeFormat = '';
		$this->startYear = 1800;
		$this->endYear = 2012;
		$this->wlmi = 0;
		$this->caseSensitive = 'false';
		$this->includePartOfSpeech = '';
		$this->excludePartOfSpeech = '';
		$this->minCorpusCount = 5;
		$this->maxCorpusCount = -1;
		$this->minDictionaryCount = 1;
		$this->maxDictionaryCount = -1;
		$this->minLength = 1;
		$this->maxLength = -1;
		$this->date = '';
		$this->findSenseForWord = '';
		$this->includeSourceDictionaries = '';
		$this->excludeSourceDictionaries = '';
		$this->expandTerms = '';
		$this->includeTags = 'false';
		$this->sortBy = 'alpha';
		$this->sortOrder = 'desc';
		$this->hasDictionaryDef = 'true';
		$this->permalink = '';
		$this->WordList = new WordList;
		$this->StringValue = array();

		return $this;
	}

	/******************************************************************/
	/*                                                                */
	/*                                                                */
	/*                                                                */
	/*                                                                */
	/*                    'set' methods below here                    */
	/*                                                                */
	/*                                                                */
	/*                                                                */
	/*                                                                */
	/******************************************************************/

	public function setSkip(int $attrValue): WordnikOptions
	{
		$this->skip = $attrValue;
		return $this;
	}

	public function setLimit(int $attrValue): WordnikOptions
	{
		$this->limit = $attrValue;
		return $this;
	}

	public function setIncludeDuplicates(bool $attrValue): WordnikOptions
	{
		$this->includeDuplicates = ($attrValue ? 'true' : 'false');
		return $this;
	}

	public function setUseCanonical(bool $attrValue): WordnikOptions
	{
		$this->useCanonical = ($attrValue ? 'true' : 'false');
		return $this;
	}

	public function setIncludeSuggestions(bool $attrValue): WordnikOptions
	{
		$this->includeSuggestions = ($attrValue ? 'true' : 'false');
		return $this;
	}

	public function setPartOfSpeech(string $attrValue): WordnikOptions
	{
		$this->partOfSpeech = $attrValue;
		return $this;
	}

	public function setIncludeRelated(bool $attrValue): WordnikOptions
	{
		$this->includeRelated = ($attrValue ? 'true' : 'false');
		return $this;
	}

	public function setSourceDictionary(string $attrValue): WordnikOptions
	{
		$this->sourceDictionary = $attrValue;
		return $this;
	}

	public function setSourceDictionaries(string $attrValue): WordnikOptions
	{
		$this->sourceDictionaries = $attrValue;
		return $this;
	}

	public function setRelationshipTypes(string $attrValue): WordnikOptions
	{
		$this->relationshipTypes = $attrValue;
		return $this;
	}

	public function setLimitPerRelationshipType(int $attrValue): WordnikOptions
	{
		$this->limitPerRelationshipType = $attrValue;
		return $this;
	}

	public function setTypeFormat(string $attrValue): WordnikOptions
	{
		$this->typeFormat = $attrValue;
		return $this;
	}

	public function setStartYear(int $attrValue): WordnikOptions
	{
		$this->startYear = $attrValue;
		return $this;
	}

	public function setEndYear(int $attrValue): WordnikOptions
	{
		$this->endYear = $attrValue;
		return $this;
	}

	public function setWlmi(int $attrValue): WordnikOptions
	{
		$this->wlmi = $attrValue;
		return $this;
	}

	public function setCaseSensitive(bool $attrValue): WordnikOptions
	{
		$this->caseSensitive = ($attrValue ? 'true' : 'false');
		return $this;
	}

	public function setIncludePartOfSpeech(string $attrValue): WordnikOptions
	{
		$this->includePartOfSpeech = $attrValue;
		return $this;
	}

	public function setExcludePartOfSpeech(string $attrValue): WordnikOptions
	{
		$this->excludePartOfSpeech = $attrValue;
		return $this;
	}
	
	public function setMinCorpusCount(int $attrValue): WordnikOptions
	{
		$this->minCorpusCount = $attrValue;
		return $this;
	}

	public function setMaxCorpusCount(int $attrValue): WordnikOptions
	{
		$this->maxCorpusCount = $attrValue;
		return $this;
	}

	public function setMinDictionaryCount(int $attrValue): WordnikOptions
	{
		$this->minDictionaryCount = $attrValue;
		return $this;
	}

	public function setMaxDictionaryCount(int $attrValue): WordnikOptions
	{
		$this->maxDictionaryCount = $attrValue;
		return $this;
	}

	public function setMinLength(int $attrValue): WordnikOptions
	{
		$this->minLength = $attrValue;
		return $this;
	}

	public function setMaxLength(int $attrValue): WordnikOptions
	{
		$this->maxLength = $attrValue;
		return $this;
	}

	public function setDateFromString(string $attrValue): WordnikOptions
	{
		$this->date = $attrValue;
		return $this;
	}

	public function setDateFromDate(\DateTime $attrValue): WordnikOptions
	{
		$this->date = $attrValue->format('Y-m-d');
		return $this;
	}

	public function setFindSenseForWord(string $attrValue): WordnikOptions
	{
		$this->findSenseForWord = $attrValue;
		return $this;
	}

	public function setIncludeSourceDictionaries(string $attrValue): WordnikOptions
	{
		$this->includeSourceDictionaries = $attrValue;
		return $this;
	}

	public function setExcludeSourceDictionaries(string $attrValue): WordnikOptions
	{
		$this->excludeSourceDictionaries = $attrValue;
		return $this;
	}

	public function setExpandTerms(string $attrValue): WordnikOptions
	{
		$validOptions = ['synonym','hypernym'];
		
		if (\in_array($attrValue, $validOptions)) {
			$this->expandTerms = $attrValue;
			return $this;
		} else {
			throw new \Exception('Expand Terms must be one of "'. \implode('", "', $validOptions) . '". Value provided: "' . $attrValue . '"', 2);
		}
	}

	public function setIncludeTags(bool $attrValue): WordnikOptions
	{
		$this->includeTags = ($attrValue ? 'true' : 'false');
		return $this;
	}

	public function setSortBy(string $attrValue): WordnikOptions
	{
		$validOptions = ['alpha','count', 'length'];
		
		if (\in_array($attrValue, $validOptions)) {
			$this->sortBy = $attrValue;
			return $this;
		} else {
			throw new \Exception('Sort By must be one of '. \implode('", "', $validOptions) . ' Value provided: ' . $attrValue, 2);
		}
	}

	public function setSortOrder(string $attrValue): WordnikOptions
	{
		$validOptions = ['asc','desc'];
		
		if (\in_array($attrValue, $validOptions)) {
			$this->sortOrder = $attrValue;
			return $this;
		} else {
			throw new \Exception('Sort Order must be one of '. \implode('", "', $validOptions) . ' Value provided: ' . $attrValue, 2);
		}
	}

	public function setHasDictionaryDef(bool $attrValue): WordnikOptions
	{
		$this->hasDictionaryDef = ($attrValue ? 'true' : 'false');
		return $this;
	}

	public function setPermalink(string $attrValue): WordnikOptions
	{
		$this->permalink = $attrValue;
		return $this;
	}

	public function setWordList(WordList $attrValue): WordnikOptions
	{
		$this->WordList = $attrValue;
		return $this;
	}

	public function setStringValue(array $attrValue): WordnikOptions
	{
		foreach ($attrValue as $key) {
			if (\getType($key) !== "StringValue") {
				throw new \Exception("'String Value' must be an array of type 'StringValue'. " . 'Provided: ' . \getType($key), 2);
			}
		}
		$this->setStringValue = $attrValue;
		return $this;
	}

	/******************************************************************/
	/*                                                                */
	/*                                                                */
	/*                                                                */
	/*                                                                */
	/*           'magic set / multi-set' methods below here           */
	/*                                                                */
	/*                                                                */
	/*                                                                */
	/*                                                                */
	/******************************************************************/

	public function magicSetPage(int $pageNumber, int $pageSize): WordnikOptions
	{
		$this->skip = (($pageNumber-1) * $pageSize);
		$this->limit = $pageSize;
		return $this;
	}

	public function magicSetYearRange(int $start, int $end): WordnikOptions
	{
		$this->setStartYear($start)->setEndYear($end);
		return $this;
	}

	public function magicSetCorpusCountRange(int $min, int $max): WordnikOptions
	{
		$this->setMinCorpusCount($min)->setMaxCorpusCount($max);
		return $this;
	}

	public function magicSetDictionaryCountRange(int $min, int $max): WordnikOptions
	{
		$this->setMinDictionaryCount($min)->setMaxDictionaryCount($max);
		return $this;
	}

	public function magicSetLengthRange(int $min, int $max): WordnikOptions
	{
		$this->setMinLength($min)->setMaxLength($max);
		return $this;
	}

	/******************************************************************/
	/*                                                                */
	/*                                                                */
	/*                                                                */
	/*                                                                */
	/*                    'Get' methods below here                    */
	/*                                                                */
	/*                                                                */
	/*                                                                */
	/*                                                                */
	/******************************************************************/

	public function getSkip(): int { return $this->skip; }

	public function getLimit(): int { return $this->limit; }

	public function getIncludeDuplicates(): string { return $this->includeDuplicates; }

	public function getUseCanonical(): string { return $this->useCanonical; }

	public function getIncludeSuggestions(): string { return $this->includeSuggestions; }

	public function getPartOfSpeech(): string { return $this->partOfSpeech; }

	public function getIncludeRelated(): string { return $this->includeRelated; }

	public function getSourceDictionary(): string { return $this->sourceDictionary; }

	public function getSourceDictionaries(): string { return $this->sourceDictionaries; }

	public function getRelationshipTypes(): string { return $this->relationshipTypes; }

	public function getLimitPerRelationshipType(): int { return $this->limitPerRelationshipType; }

	public function getTypeFormat(): string { return $this->typeFormat; }

	public function getStartYear(): int { return $this->startYear; }

	public function getEndYear(): int { return $this->endYear; }

	public function getWlmi(): int { return $this->wlmi; }

	public function getCaseSensitive(): string { return $this->caseSensitive; }

	public function getIncludePartOfSpeech(): string { return $this->includePartOfSpeech; }

	public function getExcludePartOfSpeech(): string { return $this->excludePartOfSpeech; }
	
	public function getMinCorpusCount(): int { return $this->minCorpusCount; }

	public function getMaxCorpusCount(): int { return $this->maxCorpusCount; }

	public function getMinDictionaryCount(): int { return $this->minDictionaryCount; }

	public function getMaxDictionaryCount(): int { return $this->maxDictionaryCount; }

	public function getMinLength(): int { return $this->minLength; }

	public function getMaxLength(): int { return $this->maxLength; }

	public function getDate(): string { return $this->date; }

	public function getFindSenseForWord(): string { return $this->findSenseForWord; }

	public function getIncludeSourceDictionaries(): string { return $this->includeSourceDictionaries; }

	public function getExcludeSourceDictionaries(): string { return $this->excludeSourceDictionaries; }

	public function getExpandTerms(): string { return $this->expandTerms; }

	public function getIncludeTags(): string { return $this->includeTags; }

	public function getSortBy(): string {return $this->sortBy; }

	public function getSortOrder(): string { return $this->sortOrder; }

	public function getHasDictionaryDef(): string { return $this->hasDictionaryDef; }

	public function getPermalink(): string { return $this->permalink; }

	public function getWordList(): WordList { return $this->WordList; }

	public function getStringValue(): array { return $this->stringValue; }

}

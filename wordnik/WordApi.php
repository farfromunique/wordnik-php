<?php
/**
 *  Copyright 2011 Wordnik, Inc.
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 */

/**
 *
 * NOTE: This class is auto generated by the swagger code generator program. Do not edit the class manually.
 */

 /**
 *
 * NOTE: This has been updated from the version created by Swagger, to mesh with PSR-4 and be installable by composer.
 * 
 * The update was done by Aaron Coquet (aaron@acwpd.com) in 2017.
 */
namespace wordnik;

class WordApi {

	function __construct(APIClient $apiClient) {
		$this->apiClient = $apiClient;
	}

	/**
	 * getExamples
	 * Returns examples for a word
	 * word, string: Word to return examples for (required)
	 * includeDuplicates, string: Show duplicate examples from different sources (optional)
	 * useCanonical, string: If true will try to return the correct word root ('cats' -&gt; 'cat'). If false returns exactly what was requested. (optional)
	 * skip, int: Results to skip (optional)
	 * limit, int: Maximum number of results to return (optional)
	 * @return ExampleSearchResults
	 */
	 public function getExamples(string $word, WordnikOptions $options = null): ExampleSearchResults {
		// Unpack Options
		$options = $options ?? new WordnikOptions();
		$includeDuplicates = $options->getIncludeDuplicates();
		$useCanonical = $options->getUseCanonical();
		$skip = $options->getSkip();
		$limit = $options->getLimit();
		
		//parse inputs
		$resourcePath = "/word.{format}/{word}/examples";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$method = "GET";
		$queryParams = array();
		$headerParams = array();

		$queryParams['includeDuplicates'] = $this->apiClient->toPathValue($includeDuplicates);
		$queryParams['useCanonical'] = $this->apiClient->toPathValue($useCanonical);
		$queryParams['skip'] = $this->apiClient->toPathValue($skip);
		$queryParams['limit'] = $this->apiClient->toPathValue($limit);
		$resourcePath = str_replace("{" . "word" . "}", $this->apiClient->toPathValue($word), $resourcePath);
		//make the API Call
		
		if (! isset($body)) {
			$body = array();
		}
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $body, $headerParams);

		if(! $response){
			return null; // TODO: Throw error, instead.
		}

		$responseObject = $this->apiClient->deserialize($response, 'ExampleSearchResults');
		return $responseObject;
	}

	/**
	 * getWord
	 * Given a word as a string, returns the WordObject that represents it
	 * word, string: String value of WordObject to return (required)
	 * useCanonical, string: If true will try to return the correct word root ('cats' -&gt; 'cat'). If false returns exactly what was requested. (optional)
	 * includeSuggestions, string: Return suggestions (for correct spelling, case variants, etc.) (optional)
	 * @return WordObject
	 */
	 public function getWord(string $word, WordnikOptions $options = null): WordObject {

		// Unpack options
		$options = $options ?? new WordnikOptions();
		$useCanonical = $options->getUseCanonical();
		$includeSuggestions = $options->getIncludeSuggestions();
		if($useCanonical === 'false' && $includeSuggestions === 'false') {
			$includeSuggestions = 'true';
		}

		//parse inputs
		$resourcePath = "/word.{format}/{word}";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$method = "GET";
		$queryParams = array();
		$headerParams = array();

		$queryParams['useCanonical'] = $this->apiClient->toPathValue($useCanonical);
		$queryParams['includeSuggestions'] = $this->apiClient->toPathValue($includeSuggestions);
		$resourcePath = str_replace("{" . "word" . "}", $this->apiClient->toPathValue($word), $resourcePath);
		//make the API Call
		if (! isset($body)) {
			$body = array();
		}
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $body, $headerParams);

		if(! $response){
			return null; // TODO: Throw error, instead.
		}

		$responseObject = $this->apiClient->deserialize($response,'WordObject');
		return $responseObject;

	}

	/**
	 * getDefinitions
	 * Return definitions for a word
	 * word, string: Word to return definitions for (required)
	 * partOfSpeech, string: CSV list of part-of-speech types (optional)
	 * sourceDictionaries, string: Source dictionary to return definitions from.  If 'all' is received, results are returned from all sources. If multiple values are received (e.g. 'century,wiktionary'), results are returned from the first specified dictionary that has definitions. If left blank, results are returned from the first dictionary that has definitions. By default, dictionaries are searched in this order: ahd, wiktionary, webster, century, wordnet (optional)
	 * limit, int: Maximum number of results to return (optional)
	 * includeRelated, string: Return related words with definitions (optional)
	 * useCanonical, string: If true will try to return the correct word root ('cats' -&gt; 'cat'). If false returns exactly what was requested. (optional)
	 * includeTags, string: Return a closed set of XML tags in response (optional)
	 * @return array[Definition]
	 */
	 public function getDefinitions(string $word, string $partOfSpeech='', string $sourceDictionaries='', int $limit=200, bool $includeRelated=true, bool $useCanonical=false, bool $includeTags=false): array {

		//parse inputs
		$resourcePath = "/word.{format}/{word}/definitions";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$method = "GET";
		$queryParams = array();
		$headerParams = array();

		$queryParams['limit'] = $this->apiClient->toPathValue($limit);
		$queryParams['partOfSpeech'] = $this->apiClient->toPathValue($partOfSpeech);
		$queryParams['includeRelated'] = $this->apiClient->toPathValue($includeRelated);
		$queryParams['sourceDictionaries'] = $this->apiClient->toPathValue($sourceDictionaries);
		$queryParams['useCanonical'] = $this->apiClient->toPathValue($useCanonical);
		$queryParams['includeTags'] = $this->apiClient->toPathValue($includeTags);
		$resourcePath = str_replace("{" . "word" . "}", $this->apiClient->toPathValue($word), $resourcePath);
		//make the API Call
		if (! isset($body)) {
			$body = array();
		}
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $body, $headerParams);


		if(! $response){
			if (count($response) === 0) {
				$err = 'Response has length 0';
			} else {
				$err = 'Unknown Error';
			}
			throw new \Exception("Error: Response is falsey" . $err, 1);			
		}

		$responseObject = $this->apiClient->deserialize($response, 'array[Definition]');
		return $responseObject;

	}

	/**
	 * getTopExample
	 * Returns a top example for a word
	 * word, string: Word to fetch examples for (required)
	 * useCanonical, string: If true will try to return the correct word root ('cats' -&gt; 'cat'). If false returns exactly what was requested. (optional)
	 * @return Example
	 */
	 public function getTopExample(string $word, WordnikOptions $options = null): Example {
		// Unpack Options
		$options = $options ?? new WordnikOptions();
		$useCanonical = $options->getUseCanonical();

		//parse inputs
		$resourcePath = "/word.{format}/{word}/topExample";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$method = "GET";
		$queryParams = array();
		$headerParams = array();

		$queryParams['useCanonical'] = $this->apiClient->toPathValue($useCanonical);
		$resourcePath = str_replace("{" . "word" . "}", $this->apiClient->toPathValue($word), $resourcePath);

		//make the API Call
		if (! isset($body)) {
			$body = array();
		}
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $body, $headerParams);

		if(! $response){
			return null; // TODO: Throw error, instead.
		}

		$responseObject = $this->apiClient->deserialize($response, 'Example');
		return $responseObject;

	}

	/**
	 * getRelatedWords
	 * Given a word as a string, returns relationships from the Word Graph
	 * word, string: Word to fetch relationships for (required)
	 * relationshipTypes, string: Limits the total results per type of relationship type (optional)
	 * useCanonical, string: If true will try to return the correct word root ('cats' -&gt; 'cat'). If false returns exactly what was requested. (optional)
	 * limitPerRelationshipType, int: Restrict to the supplied relatinship types (optional)
	 * @return array[Related]
	 */
	 public function getRelatedWords(string $word, string $relationshipTypes='', bool $useCanonical=false, int $limitPerRelationshipType=0): array {

		//parse inputs
		$resourcePath = "/word.{format}/{word}/relatedWords";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$method = "GET";
		$queryParams = array();
		$headerParams = array();

		$queryParams['useCanonical'] = $this->apiClient->toPathValue($useCanonical);
		$queryParams['relationshipTypes'] = $this->apiClient->toPathValue($relationshipTypes);
		$queryParams['limitPerRelationshipType'] = $this->apiClient->toPathValue($limitPerRelationshipType);

		if($word != null) {
			$resourcePath = str_replace("{" . "word" . "}", $this->apiClient->toPathValue($word), $resourcePath);
		}
		//make the API Call
		if (! isset($body)) {
			$body = array();
		}
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $body, $headerParams);


		if(! $response){
			return null; // TODO: Throw error, instead.
		}

		$responseObject = $this->apiClient->deserialize($response, 'array[Related]');
		return $responseObject;

	}

	/**
	 * getTextPronunciations
	 * Returns text pronunciations for a given word
	 * word, string: Word to get pronunciations for (required)
	 * sourceDictionary, string: Get from a single dictionary (optional)
	 * typeFormat, string: Text pronunciation type (optional)
	 * useCanonical, string: If true will try to return a correct word root ('cats' -&gt; 'cat'). If false returns exactly what was requested. (optional)
	 * limit, int: Maximum number of results to return (optional)
	 * @return array[TextPron]
	 */
	 public function getTextPronunciations(string $word, string $sourceDictionary='', string $typeFormat='', bool $useCanonical=false, int $limit=100): array {

		//parse inputs
		$resourcePath = "/word.{format}/{word}/pronunciations";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$method = "GET";
		$queryParams = array();
		$headerParams = array();

		$queryParams['useCanonical'] = $this->apiClient->toQueryValue($useCanonical);
		$queryParams['sourceDictionary'] = $this->apiClient->toQueryValue($sourceDictionary);
		$queryParams['typeFormat'] = $this->apiClient->toQueryValue($typeFormat);
		$queryParams['limit'] = $this->apiClient->toQueryValue($limit);
		
		if($word != null) {
			$resourcePath = str_replace("{" . "word" . "}", $this->apiClient->toPathValue($word), $resourcePath);
		}
		//make the API Call
		if (! isset($body)) {
			$body = array();
		}
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $body, $headerParams);


		if(! $response){
			return null; // TODO: Throw error, instead.
		}

		$responseObject = $this->apiClient->deserialize($response, 'array[TextPron]');
		return $responseObject;

	}

	/**
	 * getHyphenation
	 * Returns syllable information for a word
	 * word, string: Word to get syllables for (required)
	 * sourceDictionary, string: Get from a single dictionary. Valid options: ahd, century, wiktionary, webster, and wordnet. (optional)
	 * useCanonical, string: If true will try to return a correct word root ('cats' -&gt; 'cat'). If false returns exactly what was requested. (optional)
	 * limit, int: Maximum number of results to return (optional)
	 * @return array[Syllable]
	 */
	 public function getHyphenation(string $word, WordnikOptions $options = null): array {
		// Unpack options
		$options = $options ?? new WordnikOptions();
		$sourceDictionary = $options->getSourceDictionary();
		$useCanonical = $options->getUseCanonical();
		$limit = $options->getLimit();

		//parse inputs
		$resourcePath = "/word.{format}/{word}/hyphenation";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$method = "GET";
		$queryParams = array();
		$headerParams = array();

		$queryParams['useCanonical'] = $this->apiClient->toQueryValue($useCanonical);
		$queryParams['sourceDictionary'] = $this->apiClient->toQueryValue($sourceDictionary);
		$queryParams['limit'] = $this->apiClient->toQueryValue($limit);
		
		if($word != null) {
			$resourcePath = str_replace("{" . "word" . "}", $this->apiClient->toPathValue($word), $resourcePath);
		}
		//make the API Call
		if (! isset($body)) {
			$body = array();
		}
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $body, $headerParams);

		if(! $response){
			return null; // TODO: Throw error, instead.
		}

		$responseObject = $this->apiClient->deserialize($response, 'array[Syllable]');
		return $responseObject;

	}

	/**
	 * getWordFrequency
	 * Returns word usage over time
	 * word, string: Word to return (required)
	 * useCanonical, string: If true will try to return the correct word root ('cats' -&gt; 'cat'). If false returns exactly what was requested. (optional)
	 * startYear, int: Starting Year (optional)
	 * endYear, int: Ending Year (optional)
	 * @return FrequencySummary
	 */
	 public function getWordFrequency(string $word, bool $useCanonical=false, int $startYear=0, int $endYear=9999): FrequencySummary {

		//parse inputs
		$resourcePath = "/word.{format}/{word}/frequency";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$method = "GET";
		$queryParams = array();
		$headerParams = array();

		$queryParams['useCanonical'] = $this->apiClient->toQueryValue($useCanonical);
		$queryParams['startYear'] = $this->apiClient->toQueryValue($startYear);
		$queryParams['endYear'] = $this->apiClient->toQueryValue($endYear);
		if($word != null) {
			$resourcePath = str_replace("{" . "word" . "}", $this->apiClient->toPathValue($word), $resourcePath);
		}
		//make the API Call
		if (! isset($body)) {
			$body = array();
		}
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $body, $headerParams);


		if(! $response){
			return null; // TODO: Throw error, instead.
		}

		$responseObject = $this->apiClient->deserialize($response, 'FrequencySummary');
		return $responseObject;
	}

	/**
	 * getPhrases
	 * Fetches bi-gram phrases for a word
	 * word, string: Word to fetch phrases for (required)
	 * limit, int: Maximum number of results to return (optional)
	 * wlmi, int: Minimum WLMI for the phrase (optional)
	 * useCanonical, string: If true will try to return the correct word root ('cats' -&gt; 'cat'). If false returns exactly what was requested. (optional)
	 * @return array[Bigram]
	 */
	 public function getPhrases(string $word, int $limit=100, int $wlmi=0, bool $useCanonical=false): array {

		//parse inputs
		$resourcePath = "/word.{format}/{word}/phrases";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$method = "GET";
		$queryParams = array();
		$headerParams = array();

		$queryParams['limit'] = $this->apiClient->toQueryValue($limit);
		$queryParams['wlmi'] = $this->apiClient->toQueryValue($wlmi);
		$queryParams['useCanonical'] = $this->apiClient->toQueryValue($useCanonical);
		
		if($word != null) {
			$resourcePath = str_replace("{" . "word" . "}", $this->apiClient->toPathValue($word), $resourcePath);
		}
		//make the API Call
		if (! isset($body)) {
			$body = array();
		}
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $body, $headerParams);

		if(! $response){
			return null; // TODO: Throw error, instead.
		}

		$responseObject = $this->apiClient->deserialize($response, 'array[Bigram]');
		return $responseObject;

	}

	/**
	 * getEtymologies
	 * Fetches etymology data
	 * word, string: Word to return (required)
	 * useCanonical, string: If true will try to return the correct word root ('cats' -&gt; 'cat'). If false returns exactly what was requested. (optional)
	 * @return array[string]
	 */
	 public function getEtymologies(string $word, bool $useCanonical=false): array {

		//parse inputs
		$resourcePath = "/word.{format}/{word}/etymologies";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$method = "GET";
		$queryParams = array();
		$headerParams = array();

		$queryParams['useCanonical'] = $this->apiClient->toQueryValue($useCanonical);
		$resourcePath = str_replace("{" . "word" . "}", $this->apiClient->toPathValue($word), $resourcePath);

		//make the API Call
		if (! isset($body)) {
			$body = array();
		}
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $body, $headerParams);


		if(! $response){
			return null; // TODO: Throw error, instead.
		}

		$responseObject = $this->apiClient->deserialize($response, 'array[string]');
		return $responseObject;

	}

	/**
	 * getAudio
	 * Fetches audio metadata for a word.
	 * word, string: Word to get audio for. (required)
	 * useCanonical, string: Use the canonical form of the word (optional)
	 * limit, int: Maximum number of results to return (optional)
	 * @return array[AudioFile]
	 */
	 public function getAudio(string $word, WordnikOptions $options = null): array {
		// Unpack Options
		$options = $options ?? new WordnikOptions();
		$useCanonical = $options->getUseCanonical();
		$limit = $options->getLimit();

		//parse inputs
		$resourcePath = "/word.{format}/{word}/audio";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$method = "GET";
		$queryParams = array();
		$headerParams = array();

		$queryParams['useCanonical'] = $this->apiClient->toQueryValue($useCanonical);
		$queryParams['limit'] = $this->apiClient->toQueryValue($limit);
		
		$resourcePath = str_replace("{" . "word" . "}", $this->apiClient->toPathValue($word), $resourcePath);
		
		//make the API Call
		if (! isset($body)) {
			$body = array();
		}
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $body, $headerParams);


		if(! $response){
			return null; // TODO: Throw error, instead.
		}

		$responseObject = $this->apiClient->deserialize($response, 'array[AudioFile]');
		return $responseObject;

	}

	/**
	 * getScrabbleScore
	 * Returns the Scrabble score for a word
	 * word, string: Word to get scrabble score for. (required)
	 * @return ScrabbleScoreResult
	 */
	 public function getScrabbleScore(string $word): ScrabbleScoreResult {

		//parse inputs
		$resourcePath = "/word.{format}/{word}/scrabbleScore";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$method = "GET";
		$queryParams = array();
		$headerParams = array();

		$resourcePath = str_replace("{" . "word" . "}", $this->apiClient->toPathValue($word), $resourcePath);

		//make the API Call
		if (! isset($body)) {
			$body = array();
		}
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $body, $headerParams);


		if(! $response){
			return null; // TODO: Throw error, instead.
		}

		$responseObject = $this->apiClient->deserialize($response, 'ScrabbleScoreResult');
		return $responseObject;
	}

}


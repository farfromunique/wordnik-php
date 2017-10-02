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

class WordListApi {

	function __construct(APIClient $apiClient) {
		$this->apiClient = $apiClient;
	}

	/**
	 * updateWordList
	 * Updates an existing WordList
	 * permalink, string: permalink of WordList to update (required)
	 * body, WordList: Updated WordList (optional)
	 * auth_token, string: The auth token of the logged-in user, obtained by calling /account.{format}/authenticate/{username} (described above) (required)
	 * @return
	 */

	 public function updateWordList(string $permalink, $body=null, AuthenticationToken $auth_token) {

		//parse inputs
		$resourcePath = "/wordList.{format}/{permalink}";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$method = "PUT";
		$queryParams = array();
		$headerParams = array();

		$headerParams['auth_token'] = $this->apiClient->toHeaderValue($auth_token->token);
		$resourcePath = str_replace("{" . "permalink" . "}", $this->apiClient->toPathValue($permalink), $resourcePath);

		//make the API Call

		if (! isset($body)) {
			$body = array();
		}
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $body, $headerParams);

	}
	/**
	 * deleteWordList
	 * Deletes an existing WordList
	 * permalink, string: ID of WordList to delete (required)
	 * auth_token, string: The auth token of the logged-in user, obtained by calling /account.{format}/authenticate/{username} (described above) (required)
	 * @return
	 */

	 public function deleteWordList(string $permalink, AuthenticationToken $auth_token) {

		//parse inputs
		$resourcePath = "/wordList.{format}/{permalink}";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$method = "DELETE";
		$queryParams = array();
		$headerParams = array();

		$headerParams['auth_token'] = $this->apiClient->toHeaderValue($auth_token);
		$resourcePath = str_replace("{" . "permalink" . "}", $this->apiClient->toPathValue($permalink), $resourcePath);

		//make the API Call
		if (! isset($body)) {
			$body = array();
		}
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $body, $headerParams);

	}
	/**
	 * getWordListByPermalink
	 * Fetches a WordList by ID
	 * permalink, string: permalink of WordList to fetch (required)
	 * auth_token, string: The auth token of the logged-in user, obtained by calling /account.{format}/authenticate/{username} (described above) (required)
	 * @return WordList
	 */

	 public function getWordListByPermalink(string $permalink, AuthenticationToken $auth_token): WordList {

		//parse inputs
		$resourcePath = "/wordList.{format}/{permalink}";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$method = "GET";
		$queryParams = array();
		$headerParams = array();

		$headerParams['auth_token'] = $this->apiClient->toHeaderValue($auth_token->token);
		$resourcePath = str_replace("{" . "permalink" . "}", $this->apiClient->toPathValue($permalink), $resourcePath);

		//make the API Call
		if (! isset($body)) {
			$body = array();
		}
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $body, $headerParams);

		if(! $response){
			return null; // TODO: Throw error, instead.
		}

		$responseObject = $this->apiClient->deserialize($response, 'WordList');
		return $responseObject;

	}
	/**
	 * addWordsToWordList
	 * Adds words to a WordList
	 * permalink, string: permalink of WordList to user (required)
	 * body, array[StringValue]: Array of words to add to WordList (optional)
	 * auth_token, string: The auth token of the logged-in user, obtained by calling /account.{format}/authenticate/{username} (described above) (required)
	 * @return
	 */

	 public function addWordsToWordList(string $permalink, array $body=array(), AuthenticationToken $auth_token) {

		//parse inputs
		$resourcePath = "/wordList.{format}/{permalink}/words";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$method = "POST";
		$queryParams = array();
		$headerParams = array();

		$headerParams['auth_token'] = $this->apiClient->toHeaderValue($auth_token->token);
		$resourcePath = str_replace("{" . "permalink" . "}", $this->apiClient->toPathValue($permalink), $resourcePath);

		//make the API Call
		if (! isset($body)) {
			$body = array();
		}
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $body, $headerParams);

	}
	/**
	 * getWordListWords
	 * Fetches words in a WordList
	 * permalink, string: ID of WordList to use (required)
	 * auth_token, string: The auth token of the logged-in user, obtained by calling /account.{format}/authenticate/{username} (described above) (required)
	 * sortBy, string: Field to sort by (optional)
	 * sortOrder, string: Direction to sort (optional)
	 * skip, int: Results to skip (optional)
	 * limit, int: Maximum number of results to return (optional)
	 * @return array[WordListWord]
	 */

	 public function getWordListWords(string $permalink, AuthenticationToken $auth_token, string $sortBy='', string $sortOrder='desc', int $skip=0, int $limit=100): array {

		//parse inputs
		$resourcePath = "/wordList.{format}/{permalink}/words";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$method = "GET";
		$queryParams = array();
		$headerParams = array();

		$queryParams['sortBy'] = $this->apiClient->toQueryValue($sortBy);
		$queryParams['sortOrder'] = $this->apiClient->toQueryValue($sortOrder);
		$queryParams['skip'] = $this->apiClient->toQueryValue($skip);
		$queryParams['limit'] = $this->apiClient->toQueryValue($limit);
		$headerParams['auth_token'] = $this->apiClient->toHeaderValue($auth_token->token);
		$resourcePath = str_replace("{" . "permalink" . "}", $this->apiClient->toPathValue($permalink), $resourcePath);

		//make the API Call
		if (! isset($body)) {
			$body = array();
		}
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $body, $headerParams);

		if(! $response){
			return null; // TODO: Throw error, instead.
		}

		$responseObject = $this->apiClient->deserialize($response,'array[WordListWord]');
		return $responseObject;

	}
	/**
	 * deleteWordsFromWordList
	 * Removes words from a WordList
	 * permalink, string: permalink of WordList to use (required)
	 * body, array[StringValue]: Words to remove from WordList (optional)
	 * auth_token, string: The auth token of the logged-in user, obtained by calling /account.{format}/authenticate/{username} (described above) (required)
	 * @return
	 */

	 public function deleteWordsFromWordList(string $permalink, array $body=array(), AuthenticationToken $auth_token) {

		//parse inputs
		$resourcePath = "/wordList.{format}/{permalink}/deleteWords";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$method = "POST";
		$queryParams = array();
		$headerParams = array();

		$headerParams['auth_token'] = $this->apiClient->toHeaderValue($auth_token->token);
		$resourcePath = str_replace("{" . "permalink" . "}", $this->apiClient->toPathValue($permalink), $resourcePath);

		//make the API Call
		if (! isset($body)) {
			$body = array();
		}
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $body, $headerParams);


	}

}


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
 
class WordListsApi {

	function __construct(APIClient $apiClient) {
		$this->apiClient = $apiClient;
	}

	/**
	 * createWordList
	 * Creates a WordList.
	 * body, WordList: WordList to create (optional)
	 * auth_token, string: The auth token of the logged-in user, obtained by calling /account.{format}/authenticate/{username} (described above) (required)
	 * @return WordList
	 */

	 public function createWordList(WordList $body=null, AuthenticationToken $auth_token): WordList {

		//parse inputs
		$resourcePath = "/wordLists.{format}";
		$resourcePath = str_replace("{format}", "json", $resourcePath);
		$method = "POST";
		$queryParams = array();
		$headerParams = array();

		$headerParams['auth_token'] = $this->apiClient->toHeaderValue($auth_token);

		//make the API Call
		if (! isset($body)) {
			$body = null;
		}
		$response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $body, $headerParams);
		
		if(! $response){
				return null; // TODO: Throw error, instead.
			}

		$responseObject = $this->apiClient->deserialize($response, 'WordList');
		return $responseObject;

	}

}


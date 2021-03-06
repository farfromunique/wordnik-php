<?php
/**
 * APIClient.php
 */

/**
 *
 * NOTE: This has been updated from the version created by Swagger, to mesh with PSR-4 and be installable by composer.
 * 
 * The update was done by Aaron Coquet (aaron@acwpd.com) in 2017.
 */
namespace wordnik;

class APIClient {

	public static $POST = "POST";
	public static $GET = "GET";
	public static $PUT = "PUT";
	public static $DELETE = "DELETE";

	private $apiKey;
	private $apiServer;

	/**
	 * @param string $apiKey your API key
	 * @param string $apiServer the address of the API server
	 */
	function __construct(string $apiKey, string $apiServer) {
		$this->apiKey = $apiKey;
		$this->apiServer = $apiServer;
	}


	/**
	 * @param string $resourcePath path to method endpoint
	 * @param string $method method to call
	 * @param array $queryParams parameters to be place in query URL
	 * @param array $postData parameters to be placed in POST body
	 * @param array $headerParams parameters to be place in request header
	 * @return unknown
	 */
	public function callAPI(string $resourcePath, string $method, array $queryParams, $postData, array $headerParams) {

		$headers = array();
		$headers[] = "Content-type: application/json";

		# Allow API key from $headerParams to override default
		$added_api_key = False;
		if ($headerParams != null) {
			foreach ($headerParams as $key => $val) {
				$headers[] = "$key: $val";
				if ($key == 'api_key') {
					$added_api_key = True;
				}
			}
		}
		
		$headers[] = "api_key: " . $this->apiKey;

		if (is_object($postData) or is_array($postData)) {
			$postData = json_encode(self::sanitizeForSerialization($postData));
		}

		$url = $this->apiServer . $resourcePath;

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_TIMEOUT, 5);
		// return the result on success, rather than just TRUE
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

		switch ($method) {
			case self::$POST:
				curl_setopt($curl, CURLOPT_POST, true);
				curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
				break;
			
			case self::$PUT:
				$json_data = json_encode($postData);
				curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
				curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
				break;

			case self::$DELETE:
				curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
				curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
			
			case self::$GET:
				foreach ($headers as $header) {
					$h = explode(': ',$header);
					$k = $h[0];
					$v = $h[1];
					$queryParams[$k] = $v;
				}
				break;
			
			default:
				throw new \Exception('Method ' . $method . ' is not recognized.');
				break;
		}

		if (! empty($queryParams)) {
			$url = ($url . '?' . http_build_query($queryParams));
		}

		curl_setopt($curl, CURLOPT_URL, $url);

		// Make the request
		$response = curl_exec($curl);
		$response_info = curl_getinfo($curl);

		// Handle the response
		if ($response_info['http_code'] == 0) {
			throw new \Exception("TIMEOUT: api call to " . $url . " took more than 5s to return" );
		} else if ($response_info['http_code'] == 200) {
			$data = json_decode($response);
		} else if ($response_info['http_code'] == 401) {
			throw new \Exception("Unauthorized API request to " . $url . ": ".json_decode($response)->message );
		} else if ($response_info['http_code'] == 404) {
			$data = null; // TODO: Throw error, instead.
		} else {
			throw new \Exception("Can't connect to the api: " . $url . " response code: " . $response_info['http_code']);
		}

		return $data;
	}

	/**
	 * Build a JSON POST object
	 */
	public static function sanitizeForSerialization($postData) {
		foreach ($postData as $key => $value) {
			if (is_a($value, "DateTime")) {
				$postData->{$key} = $value->format(\DateTime::ISO8601);
			}
		}
		return $postData;
	}

	/**
	 * Take value and turn it into a string suitable for inclusion in
	 * the path, by url-encoding.
	 * @param string $value a string which will be part of the path
	 * @return string the serialized object
	 */
	public static function toPathValue(string $value): string {
		return rawurlencode($value);
	}

	/**
	 * Take value and turn it into a string suitable for inclusion in
	 * the query, by imploding comma-separated if it's an object.
	 * If it's a string, pass through unchanged. It will be url-encoded
	 * later.
	 * @param object $object an object to be serialized to a string
	 * @return string the serialized object
	 */
	public static function toQueryValue($object): string {
		if (is_array($object)) {
			return implode(',', $object);
		} else {
			return $object ?? '';
		}
	}

	/**
	 * Just pass through the header value for now. Placeholder in case we
	 * find out we need to do something with header values.
	 * @param string $value a string which will be part of the header
	 * @return string the header string
	 */
	public static function toHeaderValue(string $value): string {
  		return $value;
	}

	/**
	 * Deserialize a JSON string into an object
	 *
	 * @param object $object object or primitive to be deserialized
	 * @param string $class class name is passed as a string
	 * @return object an instance of $class
	 */
	public static function deserialize($object, string $class) {

	if (gettype($object) == "NULL") {
		return $object; // TODO: Throw error, instead.
	}

	if (substr($class, 0, 6) == 'array[') {
		$sub_class = substr($class, 6, -1);
		$sub_objects = array();
		foreach ($object as $sub_object) {
			$sub_objects[] = self::deserialize($sub_object,	$sub_class);
		}
		return $sub_objects;
	} elseif ($class == 'DateTime') {
		return new \DateTime($object);
	} elseif (in_array($class, array('string', 'int', 'float', 'bool'))) {
		settype($object, $class);
		return $object;
	} else {
		if (\class_exists($class)) {
			$instance = new $class(); // this instantiates class named $class
		} elseif (class_exists('\wordnik\\' . $class)) {
			$class = '\wordnik\\' . $class;
			$instance = new $class(); // this instantiates class named $class
		}
		
		$classVars = get_class_vars($class);
	}

	foreach ($object as $property => $value) {

		// Need to handle possible pluralization differences
		$true_property = $property;

		if (! property_exists($class, $true_property)) {
			if (substr($property, -1) == 's') {
				$true_property = substr($property, 0, -1);
			}
		}

		if (array_key_exists($true_property, $classVars['swaggerTypes'])) {
			$type = $classVars['swaggerTypes'][$true_property];
		} else {
			$type = 'string';
		}
		if (in_array($type, array('string', 'int', 'float', 'bool'))) {
			settype($value, $type);
			$instance->{$true_property} = $value;
		} elseif (preg_match("/array<(.*)>/", $type, $matches)) {
			$sub_class = $matches[1];
			$instance->{$true_property} = array();
			foreach ($value as $sub_property => $sub_value) {
				$instance->{$true_property}[] = self::deserialize($sub_value,$sub_class);
			}
		} else {
			$instance->{$true_property} = self::deserialize($value, $type);
		}
	}
	return $instance;
	}
}


?>



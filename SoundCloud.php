<?php
/**
* This is the soundcloud base class
*/

class SoundCloud
{
	//This is the id provided by SoundCloud for a unique application	
	private $_client_id;
	//This is the base url pointing to SoundCloud's API
	private $_base_url;
	
	function __construct($client_id, $base_url = "https://api.soundcloud.com")
	{
		$this->_client_id = $client_id;
		$this->_base_url = $base_url;
	}

	function __destruct() {}

	//Returns a json string with the client_id and the base url
	function __toString() {
		echo json_encode(array("client_id" => $this->_client_id, "base_url" => $this->_base_url));
	}

    /**
     * @return mixed
     */
    public function getClientId()
    {
        return $this->_client_id;
    }

    /**
     * @param mixed $_client_id
     * @return self
     */
    public function setClientId($client_id)
    {
        $this->_client_id = $client_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBaseUrl()
    {
        return $this->_base_url;
    }

    /**
     * @param mixed $_base_url
	 * @return self
     */
    public function setBaseUrl($base_url)
    {
        $this->_base_url = $base_url;

        return $this;
    }

    //This methods sends a request to the SoundCloud API to get a response based on the url given.
    public static function sendRequest($url) {
    	$ch = curl_init();
		curl_setopt_array($ch, array(
			CURLOPT_URL => $url,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_RETURNTRANSFER => true
			));
		$response = json_decode(curl_exec($ch), false);
		curl_close($ch);
		return $response;
    }
}
?>
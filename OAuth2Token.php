<?php
/**
* This class accepts POST requests and is used to provision access tokens once a user has *authorized your application. 
*/
include "SoundCloud.php";
class OAuth2Token
{
	private $_soundcloud;

	private $_url;

	private $_client_secret;

	private $_redirect_uri;

	private $_grant_type;

	private $_code;

	private $_response;

	function __construct($soundcloud, $client_secret, $redirect_uri, $grant_type)
	{
		$this->_soundcloud = $soundcloud;
		$this->_client_secret = $client_secret;
		$this->_redirect_uri = $redirect_uri;
		$this->_grant_type = $grant_type;
		$this->_url = $this->_soundcloud->getBaseURL()."/oauth2/token";
	}

	function __destruct() {}

	function __toString () {
		echo json_encode($this->getCode());
	}

	/**
     * @return mixed
     */
    public function getSoundcloud()
    {
        return $this->_soundcloud;
    }

    /**
     * @param mixed $_soundcloud
     *
     * @return self
     */
    public function setSoundcloud($_soundcloud)
    {
        $this->_soundcloud = $_soundcloud;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->_url;
    }

    /**
     * @param mixed $_url
     *
     * @return self
     */
    public function setUrl()
    {
        $this->_url = $this->_soundcloud->getBaseURL()."/oauth2/token";

        return $this;
    }

    /**
     * @return mixed
     */
    public function getClientSecret()
    {
        return $this->_client_secret;
    }

    /**
     * @param mixed $_client_secret
     *
     * @return self
     */
    public function setClientSecret($_client_secret)
    {
        $this->_client_secret = $_client_secret;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRedirectUri()
    {
        return $this->_redirect_uri;
    }

    /**
     * @param mixed $_redirect_uri
     *
     * @return self
     */
    public function setRedirectUri($_redirect_uri)
    {
        $this->_redirect_uri = $_redirect_uri;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGrantType()
    {
        return $this->_grant_type;
    }

    /**
     * @param mixed $_grant_type
     *
     * @return self
     */
    public function setGrantType($_grant_type)
    {
        $this->_grant_type = $_grant_type;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->_code;
    }

    /**
     * @param mixed $_code
     *
     * @return self
     */
    public function setCode($_code)
    {
        $this->_code = $_code;

        return $this;
    }

    public function getToken ($param = null, $filters = null) {
    	$this->_response = SoundCloud::sendRequest($this->_url."{$filters}");
    }

    public function toArray() {
    	return array($this->_response);
    }

    public function toJSON {
    	return json_encode($this->_response);
    }
}

?>
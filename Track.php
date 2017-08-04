<<?php 
/**
* This class deals with a basic SoundCloudTrack
*/
include "SoundCloud.php";
class Track
{
	//The SoundCloud object
	private $_soundcloud;
	//The id of the track that is being queried
	private $_track_id;
	//The base url of a track request
	private $_url;
	//The object returning the response
	private $_response;

	function __construct($soundcloud, $track_id)
	{
		$this->_soundcloud = $soundcloud;
		$this->_track_id = $track_id;
		$this->_url = "{$this->_soundcloud->getBaseUrl()}/tracks/{$this->getTrackId()}";
	}

	function __destruct() {}

	function __toString() {
		return $this->toPrettyJSON();
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
     * @return self
     */
    public function setSoundcloud($soundcloud)
    {
        $this->_soundcloud = $_soundcloud;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTrackId()
    {
        return $this->_track_id;
    }

    /**
     * @param mixed $_track_id
     * @return self
     */
    public function setTrackId($track_id) {
        $this->_track_id = $_track_id;

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
     * @return self
     */
    public function setUrl($url)
    {
        $this->_url = $url;

        return $this;
    }

    /*Gets a track based on the $_track_id
    * @return json
    */
    public function getTrack($filters = null) {
    	$this->_response = SoundCloud::sendRequest("{$this->getUrl()}?client_id={$this->_soundcloud->getClientId()}{$filters}");
    }

	/*Gets the comments on track based on the $_track_id
    * @return json
    */
	public function getTrackComments($param = null, $filters = null) {
		$this->_response = SoundCloud::sendRequest("{$this->getUrl()}/comments/?client_id={$this->_soundcloud->getClientId()}{$filters}");
	}

	/*Gets a comment on a track based on the $_track_id and $comment_id
    *@param $comment_id 
    *@return json
    */
	public function getTrackComment($param = null, $filters = null) {
		$this->_response = SoundCloud::sendRequest("{$this->getUrl()}/comments/{$param}?client_id={$this->_soundcloud->getClientId()}{$filters}");
	}

	/*Gets the users who favorited (i.e. liked) the track based on the $_track_id
    * @return json
    */
    public function getTrackFavoriters($param = null, $filters = null) {
    	$this->_response = SoundCloud::sendRequest("{$this->getUrl()}/favoriters/?client_id={$this->_soundcloud->getClientId()}{$filters}");
    }

    /*Gets the details of the user who favorited (i.e. liked) the track based on the $_track_id
    * @param $user_id
    * @return json
    */
    public function getTrackFavoriter($param = null, $filters = null) {
    	$this->_response = SoundCloud::sendRequest("{$this->getUrl()}/favoriters/{$param}?client_id={$this->_soundcloud->getClientId()}{$filters}");
    }

    /*Gets the secret token of the track based on the $_track_id
    * @return json
    */
    public function getTrackSecretToken($filters = null) {
    	$this->_response = SoundCloud::sendRequest("{$this->getUrl()}/secret_token/?client_id={$this->_soundcloud->getClientId()}{$filters}");
    }

    //Converts _response to an array
    public function toArray() {
    	return array("response"=>$this->_response);
    }

    //Returns a JSON encoded version of _response
    public function toJSON () {
    	return json_encode($this->_response);
    }

    //Returns a pretty printed JSON version of the _response
    public function toPrettyJSON() {
    	return json_encode($this->_response, JSON_PRETTY_PRINT);
    }
}
?>
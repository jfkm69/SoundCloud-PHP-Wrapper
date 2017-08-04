<?php
/**
* This class deals with Playlists
*/
include 'SoundCloud.php';
class Playlist
{
	//The soundcloud object
	private $_soundcloud;
	//The id of the playlist to be queried
	private $_playlist_id;
	//This holds the response from SoundCloud
	private $_response;

	function __construct($soundcloud, $playlist_id)
	{
		$this->_soundcloud = $soundcloud;
		$this->_playlist_id = $playlist_id;
	}

	function __destruct() {}

	function __toString() {
		echo $this->toPrettyJSON();
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
        $this->_soundcloud = $soundcloud;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPlaylistId()
    {
        return $this->_playlist_id;
    }

    /**
     * @param mixed $_playlist_id
     * @return self
     */
    public function setPlaylistId($playlist_id)
    {
        $this->_playlist_id = $playlist_id;

        return $this;
    }

    /*Get's a SoundCloud based on the $_playlist_id
    * @return json
    */
    public function getPlaylist ($param = null, $filters = null) {
    	$this->_response = SoundCloud::sendRequest("{$this->_soundcloud->getBaseUrl()}/playlists/{$this->getPlaylistId()}?client_id={$this->_soundcloud->getClientId()}{$filters}");
    }

    /*Get's a playlist's Secret Token based on the $_playlist_id
    * @return json
    */
    public function getPlaylistSecretToken ($param = null, $filters = null) {
    	$this->_response = SoundCloud::sendRequest("{$this->_soundcloud->getBaseUrl()}/playlists/{$this->getPlaylistId()}/secret_token?client_id={$this->_soundcloud->getClientId()}{$filters}");
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
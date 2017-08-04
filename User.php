</<?php 
/**
* This class deals with the a basic SoundCloud User
*/
include 'SoundCloud.php';

class User
{
	//An instance of the SoundCloud class
	private $_soundcloud;
	//The id of the user you wish to find i.e. artist or podcaster
	private $_user_id;
	//This stores the response from the SoundCloud API
	private $_response;
	
	function __construct($soundcloud, $user_id)
	{
		$this->_soundcloud = $soundcloud;
		$this->_user_id = $user_id;
		$this->_url = "{$this->_soundcloud->getBaseUrl()}/users/{$this->getUserId()}?client_id={$this->_soundcloud->getClientId()}";
	}

	function __destruct() {}

	function __toString() {
		echo $this->toPrettyJSON();
	}

	/**
     * @return SoundCloud object
     */
    public function getSoundcloud()
    {
        return $this->_soundcloud;
    }

    /**
     * @param SoundCloud $_soundcloud
     * @return self
     */
    public function setSoundcloud($soundcloud)
    {
        $this->_soundcloud = $soundcloud;

        return $this;
    }

    /**
     * @return long
     */
    public function getUserId()
    {
        return $this->_user_id;
    }

    /**
     * @param long $_user_id
     * @return self
     */
    public function setUserId($user_id)
    {
        $this->_user_id = $user_id;

        return $this;
    }

    /* Get the user details from the SoundCloud API
    * @return json 
    */
    public function getUser($filters = null) {
    	$this->_response = SoundCloud::sendRequest("{$this->_soundcloud->getBaseUrl()}/users/{$this->getUserId()}?client_id={$this->_soundcloud->getClientId()}{$filters}");
    }

    /*Get the user's tracks
    * @return json
    */
    public function getUserTracks($param = null, $filters = null) {
    	$this->_response = SoundCloud::sendRequest("{$this->_soundcloud->getBaseUrl()}/users/{$this->getUserId()}/tracks?client_id={$this->_soundcloud->getClientId()}{$filters}");

    }

    /*Get the user's playlist
    * @return json
    */
    public function getUserPlaylists($param = null, $filters = null) {
    	$this->_response = SoundCloud::sendRequest("{$this->_soundcloud->getBaseUrl()}/users/{$this->getUserId()}/playlists?client_id={$this->_soundcloud->getClientId()}{$filters}");

    }

    /*Get the user's followings i.e the people the user is following
    * @return json
    */
    public function getUserFollowings($param = null, $filters = null) {
    	$this->_response = SoundCloud::sendRequest("{$this->_soundcloud->getBaseUrl()}/users/{$this->getUserId()}/followings?client_id={$this->_soundcloud->getClientId()}{$filters}");
    }

    /*Get the user's followers
    * @return json
    */
    public function getUserFollowers($param = null, $filters = null) {
    	$this->_response = SoundCloud::sendRequest("{$this->_soundcloud->getBaseUrl()}/users/{$this->getUserId()}/followers?client_id={$this->_soundcloud->getClientId()}{$filters}");
    }

    /*Get's the user's comments
    * @return json
    */
    public function getUserComments($param = null, $filters = null) {
    	$this->_response = SoundCloud::sendRequest("{$this->_soundcloud->getBaseUrl()}/users/{$this->getUserId()}/comments?client_id={$this->_soundcloud->getClientId()}{$filters}");
    }

    /* Get's the user's favorites
    * @return json
    */
    public function getUserFavorites($param = null, $filters = null) {
    	$this->_response = SoundCloud::sendRequest("{$this->_soundcloud->getBaseUrl()}/users/{$this->getUserId()}/favorites?client_id={$this->_soundcloud->getClientId()}{$filters}");
    }

    /* Get's the user's web profiles i.e. Other social media platforms and official website
    * @return json
    */
    public function getUserWebProfiles($param = null, $filters = null) {
    	$this->_response = SoundCloud::sendRequest("{$this->_soundcloud->getBaseUrl()}/users/{$this->getUserId()}/web-profiles?client_id={$this->_soundcloud->getClientId()}{$filters}");
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
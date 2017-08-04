<?php
/**
* This class deals with Comments made on Tracks on SoundCloud
*/
include 'SoundCloud.php';
class Comment
{
	//The soundcloud object
	private $_soundcloud;
	//The id of the playlist to be queried
	private $_comment_id;
	//Hold the response from the SoundCloud API
	private $_response;
	
	function __construct($soundcloud, $comment_id)
	{
		$this->_soundcloud = $soundcloud;
		$this->_comment_id = $comment_id;
	}

	function __destruct() {}

	function __toString () {
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
    public function getCommentId()
    {
        return $this->_comment_id;
    }

    /**
     * @param mixed $_comment_id
     * @return self
     */
    public function setCommentId($comment_id)
    {
        $this->_comment_id = $comment_id;

        return $this;
    }

    /*Gets a comment from the SoundCloud API
    * @return json
    */
    public function getComment($param = null, $filters = null) {
    	$this->_response = SoundCloud::sendRequest("{$this->_soundcloud->getBaseUrl()}/comments/{$this->getCommentId()}{$param}?client_id={$this->_soundcloud->getClientId()}{$filters}");
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
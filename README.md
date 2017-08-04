# SoundCloud-PHP-Wrapper
This is a simple wrapper written in native PHP that levarages SoundCloud's API.


# Usage
Get User Details

`$user = new User(new SoundCloud(<CLIENT_ID)>), <USER_ID>);`

`$user->getUser();`

Output as a JSON

`$user->toJSON();`

Get a track

`$track = new Track(new SoundCloud(<CLIENT_ID>, <TRACK_ID>);`

Get a playlist

`$playlist = new Playlist(new SoundCloud(<CLIENT_ID>, <PLAYLIST_ID>);`

Get a comment

`$comment = new Playlist(new SoundCloud(<CLIENT_ID>, <COMMENT_ID>);`

One-line implementation.

`SoundCloud::sendRequest<(API_ENDPOINT>);` 


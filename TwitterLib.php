<?php
//DOC: https://dev.twitter.com/docs/api/1.1/post/friendships/destroy
function unfollow($usuario, $settings){
        ini_set('display_errors', 1);
        require_once('TwitterAPIExchange.php');
        $url = 'https://api.twitter.com/1.1/friendships/destroy.json';
		
        $requestMethod = 'POST';
        $postfields = array( 'screen_name' => $usuario, );
		
        $twitter = new TwitterAPIExchange($settings);
        return $twitter->buildOauth($url, $requestMethod)->setPostfields($postfields)->performRequest();
}


//DOC: https://dev.twitter.com/docs/api/1.1/post/friendships/create
function follow($usuario, $settings){
        ini_set('display_errors', 1);
        require_once('TwitterAPIExchange.php');
        $url = 'https://api.twitter.com/1.1/friendships/create.json';

        $requestMethod = 'POST';
        $postfields = array( 'screen_name' => $usuario,'follow' => "true" );

        $twitter = new TwitterAPIExchange($settings);
        return $twitter->buildOauth($url, $requestMethod)->setPostfields($postfields)->performRequest();
}


//DOC: https://dev.twitter.com/docs/api/1.1/get/friends/list
function listFriends($usuario, $settings){
        ini_set('display_errors', 1);
        require_once('TwitterAPIExchange.php');
        $url = 'https://api.twitter.com/1.1/friends/list.json';

        $getfield = '?cursor=-1&screen_name='.$usuario.'&skip_status=true&include_user_entities=false';        
        $requestMethod = 'GET';
        $twitter = new TwitterAPIExchange($settings);
        $json =  $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest();
        return $json;
}


//DOC: https://dev.twitter.com/docs/api/1.1/get/friends/ids
function listIdsFriends($usuario, $settings){
        ini_set('display_errors', 1);
        require_once('TwitterAPIExchange.php');
        $url = 'https://api.twitter.com/1.1/friends/ids.json';

        $getfield = '?cursor=-1&screen_name='.$usuario.'&count=5000';        
        $requestMethod = 'GET';
        $twitter = new TwitterAPIExchange($settings);
        $json =  $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest();
        return $json;
}



//DOC: https://dev.twitter.com/docs/api/1.1/get/followers/list
function listFollowers($usuario, $settings){
        ini_set('display_errors', 1);
        require_once('TwitterAPIExchange.php');
        $url = 'https://api.twitter.com/1.1/followers/list.json';

        $getfield = '?cursor=-1&screen_name='.$usuario.'&skip_status=true&include_user_entities=false';        
        $requestMethod = 'GET';
        $twitter = new TwitterAPIExchange($settings);
        $json =  $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest();
        return $json;
}



//DOC: https://dev.twitter.com/docs/api/1.1/get/followers/ids
function listIdsFollowers($usuario, $settings){
        ini_set('display_errors', 1);
        require_once('TwitterAPIExchange.php');
        $url = 'https://api.twitter.com/1.1/followers/ids.json';

        $getfield = '?cursor=-1&screen_name='.$usuario.'&count=5000';        
        $requestMethod = 'GET';
        $twitter = new TwitterAPIExchange($settings);
        $json =  $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest();
        return $json;
}



?>
<?
	require_once('TwitterLib.php');

	/** Set access tokens here - see: https://dev.twitter.com/apps/ **/ 
    $settings = array(
        'oauth_access_token' => "",
        'oauth_access_token_secret' => "",
        'consumer_key' => "",
        'consumer_secret' => ""
    );
		
		
	/**** FOLLOW to user ***
	$respuesta = follow("humoralastres", $settings);
	echo $respuesta;
	$json = json_decode($respuesta);
	echo '<meta charset="utf-8">';
	echo "Usuario: ".$json->name." (@".$json->screen_name.")";
	echo "<br>";
	echo "ID USER: ".$json->id_str;
	echo "<br>";
	echo "Fecha Envio: ".$json->created_at;
	*/
	

	/**** UNFOLLOW to user ***
	$respuesta = unfollow("humoralastres", $settings);
	echo $respuesta;
	*/
	
	
	/**** LIST FRIENDS of user ****/
	echo "<br><b>FRIENDS</b><br>";
	$friends = listFriends("robertopf81", $settings);
	$jsonFriends = json_decode($friends);
	$num_friends = count($jsonFriends->users);
	for($i=0; $i<$num_friends; $i++){
		$user = $jsonFriends->users[$i];
		echo "Friend ". ($i+1) . ": " . $user->id . " -> " . $user->name . "<br>";
	}
	
	
	
	
	/**** LIST FOLLOWERS of user ***/
	echo "<br><br><b>FOLLOWERS</b><br>";
	$followers = listFollowers("robertopf81", $settings);
	$jsonFollower = json_decode($followers);
	$num_followers = count($jsonFollower->users);
	for($i=0; $i<$num_followers; $i++){
		$user = $jsonFollower->users[$i];
		echo "Follower ". ($i+1) . ": " . $user->id . " -> " . $user->name . "<br>";
	}
	
	
	
	//Friend but no follower
	echo "<br><br><b>FRIEND AND NO FOLLOWER</b><br>";
	$k=1;
	for($i=0; $i<$num_friends; $i++){
		$user = $jsonFriends->users[$i];
		$found = 0;
		
		for($j=0; $j<$num_followers; $j++){
			$user2 = $jsonFollower->users[$j];
			
			if($user->id == $user2->id){
				$found =1;
				break;
			}
		}
		if($found == 0)
			echo "No Follower ". ($k++) . ": " . $user->id . " -> " . $user->name . "<br>";
	}

	
	
	//Follower but no Friend
	echo "<br><br><b>FOLLOWER AND NO FRIEND</b><br>";
	$k=1;
	for($i=0; $i<$num_followers; $i++){
		$user = $jsonFollower->users[$i];
		$found = 0;
		
		for($j=0; $j<$num_friends; $j++){
			$user2 = $jsonFriends->users[$j];
			
			if($user->id == $user2->id){
				$found =1;
				break;
			}
		}
		if($found == 0)
			echo "No Friend ". ($k++) . ": " . $user->id . " -> " . $user->name . "<br>";
	}

	
	
	
	
	echo "<br><br>IDS<br><br>";
	
	
	
	
	
	/**** LIST FRIENDS of user ****/
	echo "<br><b>FRIENDS</b><br>";
	$friends = listIdsFriends("robertopf81", $settings);
	$jsonFriends = json_decode($friends);
	$num_friends = count($jsonFriends->ids);
	for($i=0; $i<$num_friends; $i++){
		$user = $jsonFriends->ids[$i];
		echo "Friend ". ($i+1) . ": " . $user . "<br>";
	}
	
	
	/**** LIST FOLLOWERS of user ***/
	echo "<br><br><b>FOLLOWERS</b><br>";
	$followers = listIdsFollowers("robertopf81", $settings);
	$jsonFollower = json_decode($followers);
	$num_followers = count($jsonFollower->ids);
	for($i=0; $i<$num_followers; $i++){
		$user = $jsonFollower->ids[$i];
		echo "Follower ". ($i+1) . ": " . $user . "<br>";
	}
	
	
	
	//Friend but no follower
	echo "<br><br><b>FRIEND AND NO FOLLOWER</b><br>";
	$k=1;
	for($i=0; $i<$num_friends; $i++){
		$user = $jsonFriends->ids[$i];
		$found = 0;
		
		for($j=0; $j<$num_followers; $j++){
			$user2 = $jsonFollower->ids[$j];
			
			if($user == $user2){
				$found =1;
				break;
			}
		}
		if($found == 0)
			echo "No Follower ". ($k++) . ": " . $user . "<br>";
	}
	
	
	//Follower but no Friend
	echo "<br><br><b>FOLLOWER AND NO FRIEND</b><br>";
	$k=1;
	for($i=0; $i<$num_followers; $i++){
		$user = $jsonFollower->ids[$i];
		$found = 0;
		
		for($j=0; $j<$num_friends; $j++){
			$user2 = $jsonFriends->ids[$j];
			
			if($user == $user2){
				$found =1;
				break;
			}
		}
		if($found == 0)
			echo "No Friend ". ($k++) . ": " . $user . "<br>";
	}

?>
<?php
session_start();
if(isset($_SESSION['user']))
{
	$access_token = $_SESSION['user']['access_token'];
	
	$url = 'http://dumeel.kurukshetra.org.in/player/api/questions';
	$params =  json_encode(array(
		"access_token" => $access_token
		));
	$ch = curl_init( $url );
	curl_setopt( $ch, CURLOPT_POST, 1);
	curl_setopt( $ch, CURLOPT_POSTFIELDS, $params);
	curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
	curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt( $ch, CURLOPT_HEADER, 0);
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
	
	$response = curl_exec( $ch );
	if (curl_getinfo($ch, CURLINFO_HTTP_CODE) == 200)
	{
		$response = json_decode($response, true);
		$user_state = $response['currentUser'];
		$user_state['currentUserName']= $response['currentUser']['currentUserName'];
		$user_state['currentUserLevel']= $response['currentUser']['currentUserLevel'];
		$user_state['currentUserRole']=$response['currentUser']['currentUserRole'];
		$user_state['currentUserHint']=$response['currentUser']['currentUserHint'];
		$user_state['currentUserUrls']=$response['currentUser']['currentUserUrls'];

		$team_state = $response['otherUser'];
		$team_state['otherUserRole']= $response['otherUser']['otherUserRole'];
		$team_state['otherUserUrls']=$response['otherUser']['otherUserUrls'];
		//$_SESSION['team_state'] = $response['otherUser'];		
		//$user_state['currentUserName']=$response

	}	
}
else
{
	header("Location: index.php");
}

function sanitizeParams($param)
{
	$param = strip_tags(trim($param));
	if (isset($param) && empty($param) != 1)
	{
		return $param;	
	}
	else
	{
		//handle else case
	}
}

?>
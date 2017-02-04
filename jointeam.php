<?php
session_start();
if(!isset($_SESSION['user']))
{
	$userName = sanitizeParams($_POST['name']);
	$emailId = sanitizeParams($_POST['email']);
	$password = sanitizeParams($_POST['password']);
	$teamName = sanitizeParams($_POST['teamname']);
	$teamPassword = sanitizeParams($_POST['teampassword']);

	$url = 'http://dumeel.kurukshetra.org.in/web/api/joinTeam';
	$params =  json_encode(array(
		"emailId" => $emailId, 
		"password" => $password,
		"userName" => $userName,
		"teamName" => $teamName,
		"teamPassword" => $teamPassword
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
		//$_SESSION['user'] = $response;
		echo 1;

	}
	else if (curl_getinfo($ch, CURLINFO_HTTP_CODE) == 402)
	{
		echo 2;
	}
	else if (curl_getinfo($ch, CURLINFO_HTTP_CODE) == 403)
	{
		echo 3;
	}
	else if (curl_getinfo($ch, CURLINFO_HTTP_CODE) == 408)
	{
		echo 4;
	}
	//header("Location: index.php");
	
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
		//$_SESSION['login'] = "failure";
			header("Location: index.php");
	}
}

?>
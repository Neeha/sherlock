<?php
session_start();
if(!isset($_SESSION['user']))
{
	$userName = sanitizeParams($_POST['name']);
	$emailId = sanitizeParams($_POST['email']);
	$password = sanitizeParams($_POST['password']);
	$teamName = sanitizeParams($_POST['teamname']);
	$teamPassword = sanitizeParams($_POST['teampassword']);
	$role = $_POST['role'];

	$url = '192.168.0.148:8080/web/api/register/team';
	$params =  json_encode(array(
		"emailId" => $emailId, 
		"password" => $password,
		"userName" => $userName,
		"teamName" => $teamName,
		"teamPassword" => $teamPassword,
		"role" => $role
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
	//header("Location: index.php");
	
	
	
}
else
{
	echo 4;
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
			//header("Location: index.php");
	}
}

?>
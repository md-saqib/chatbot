<?php
header("Content-Type:application/json");
require "./services.php";

if(!empty($_GET['college']))
{
	$college=$_GET['college'];

    $services = new Services;
	$collegeDetails = $services->getCollegeDetails($college);

	if(empty($collegeDetails))
	{
		response(200,"College Not Found",NULL);
	}
	else
	{
		response(200,"College Found",$collegeDetails);
	}

}
else
{
	response(400,"Invalid Request",NULL);
}

function response($status,$status_message,$data)
{
    header("Content-Type:application/json");
    header('Access-Control-Allow-Origin: *');
	header("HTTP/1.1 ".$status);

	$response['status']=$status;
	$response['status_message']=$status_message;
	$response['data']=$data;

	$json_response = json_encode($response);
	echo $json_response;
}
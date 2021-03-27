<?php
header("Content-Type:application/json");
require "./functions.php";


if(!empty($_GET['college']))
{
	$college=$_GET['college'];

	$collegeDetails = get_college_details($college);

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
	header("HTTP/1.1 ".$status);

	$response['status']=$status;
	$response['status_message']=$status_message;
	$response['data']=$data;

	$json_response = json_encode($response);
	echo $json_response;
}
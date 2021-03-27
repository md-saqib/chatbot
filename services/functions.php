<?php
    function db_connect(){
    $connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
    $db = mysql_select_db("chatbot", $connection); // Selecting Database
    return $connection;
    }

    function db_close($connection) {
            mysql_close($connection);
        }

    function get_college_details($college) {
    	$db = db_connect();
    	$query = "SELECT * FROM college_details WHERE collegeName LIKE" . "$college";
    	$result = mysql_fetch_array($query);
    	db_close($db);
    	return $result;
    }


?>
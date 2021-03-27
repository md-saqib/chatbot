<?php
    $con = mysqli_connect("localhost","root","","chatbot");
    if(mysqli_connect_errno())
    {
    	echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    function db_close($connection) {
            mysql_close($connection);
        }

    function get_college_details($college) {
    	global $con;
    	$query = "SELECT * FROM college_details WHERE collegeName LIKE '$college'";
    	$result = mysqli_query($con, $query);
    	return $result;
    }

?>
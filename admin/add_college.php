<?php 

include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'college_management.php');

$candidateManager1 = new College_Management();
$candidateNumber1 = $candidateManager1 -> addCollege();
header('location:college-list.php?generated=1');

?>

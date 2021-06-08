<?php
include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'database.php');

class College_Management {
    private $_dbConn;
    function __construct()
    {
        $db = new Database();
        $this->_dbConn = $db->getConnection();
    }

   //  
    function addCollege(){
      $id=$_POST['id'];
      $collegeName=$_POST['collegeName'];
      $collegeCode=$_POST['collegeCode'];
      $collegeSuburb=$_POST['collegeSuburb'];
      $collegeEmail=$_POST['collegeEmail'];
      $collegeSTD=$_POST['collegeSTD'];
      $collegePhone=$_POST['collegePhone'];
      $collegeWebsite=$_POST['collegeWebsite'];
      $collegeAddress=$_POST['collegeAddress'];
      $collegeCity=$_POST['collegeCity'];
      $collegeDistrict=$_POST['collegeDistrict'];
      

      $insert="insert into college_details (collegeName, collegeCode, collegeSuburb, collegeEmail, collegeSTD, collegePhone, collegeWebsite, collegeAddress, collegeCity, collegeDistrict) values ('$collegeName', '$collegeCode','$collegeSuburb','$collegeEmail','$collegeSTD','$collegePhone','$collegeWebsite','$collegeAddress','$collegeCity','$collegeDistrict')";

      try {
          $smtp = $this->_dbConn->prepare($insert);
          $smtp->execute($data) or die(print_r($smtp->errorInfo(), true));
        } catch(PDOException $e) {
          echo $e->getMessage();
        }
    }

}

?>
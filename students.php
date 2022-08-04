<?php
session_start();
include_once "database.php";

class Students {

 public $studentTable;
 public $dbObj;
 public $con;

 public function __construct() {
     $this->studentTable = "students";
     $this->dbObj = new Database();
     $this->con = $this->dbObj->connection();
 }

 /* student registration method */
 public function registration() {

 $name = $_POST['name'];
 $email = $_POST['email'];
 $password = md5($_POST['password']);
 $phone = $_POST['phone'];
 $registr_date = date('Y-m-d');  

 $query ="INSERT INTO $this->studentTable (name, email, password, phone, registration_date)
  VALUES('$name', '$email', '$password', '$phone', '$registr_date')";
 if ($this->con->query($query)) {
     return true;
 } else {
     return false;
     }
 }

 /* student login method */
 public function login() {
     $email = $_POST['email'];
     $password = md5($_POST['password']);

     $query = "SELECT * FROM $this->studentTable WHERE email = '$email' && password = '$password'";
     $result = $this->con->query($query);
     while ($student_data = $result->fetch_assoc()) {
  $_SESSION['id'] = $student_data['id'];
  $_SESSION['name'] = $student_data['name'];
     }
 if ($result->num_rows > 0) {
     return true;
 } else {
     return false;
     }
 }

 /* check If email is exists */
 public function isUserExist($email) {
          $query = "SELECT * FROM $this->studentTable WHERE email ='$email'";
      $result = $this->con->query($query);
  if ($result->num_rows > 0) {
     return true;
  } else {
     return false;
     }
 }


 /*check if phone number is exists */

 public function isUserPhoneNumberExists($phone){
     $query = "SELECT * FROM $this->studentTable WHERE phone = '$phone'";
     $result = $this->con->query($query);
 if ($result->num_rows > 0) {
            return true;
 }else {
            return false;
   }
    
 }
   
}


$studentObj = new Students();
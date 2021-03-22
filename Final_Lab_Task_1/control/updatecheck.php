<?php
include('../model/db.php');


 $error="";

if (isset($_POST['update'])) {
if (empty($_POST['firstname']) || empty($_POST['email']) || empty($_POST['dob']) || empty($_POST['gender']) || empty($_POST['profession']) || empty($_POST['interests'])) {
$error = "input given is invalid";
}
else
{
$connection = new db();
$conobj=$connection->OpenCon();

$userQuery=$connection->UpdateUser($conobj,"student",$_POST['username'],$_POST['password'],$_POST['firstname'],$_POST['email'],$_POST['address'],$_POST['dob'],$_POST['gender'],$_POST['profession'],$_POST['interests']);
if($userQuery==TRUE)
{
    echo "update successful"; 
}
else
{
    echo "could not update";    
}
$connection->CloseCon($conobj);

}
}

?>

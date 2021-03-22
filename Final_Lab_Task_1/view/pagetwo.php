<?php
session_start(); 

include('../control/updatecheck.php');


if(empty($_SESSION["username"])) // Destroying All Sessions
{
header("Location: ../control/login.php"); // Redirecting To Home Page
}

?>

<!DOCTYPE html>
<html>
<body>
<h2>Profile Page</h2>

Hii, <h3><?php echo $_SESSION["username"];?></h3>
<br>Your Profile Page.
<br><br>
<?php
$radio1=$radio2=$radio3="";
$username=$password=$firstname=$email=$address=$dob=$gender=$profession=$interests="";
$connection = new db();
$conobj=$connection->OpenCon();

$userQuery=$connection->CheckUser($conobj,"student",$_SESSION["username"],$_SESSION["password"]);

if ($userQuery->num_rows > 0) {

    // output data of each row
    while($row = $userQuery->fetch_assoc()) {
      $firstname=$row["firstname"];
      $email=$row["email"];
     
      if(  $row["gender"]=="female" )
      { $radio1="checked"; }
      else if($row["gender"]=="male")
      { $radio2="checked"; }
      else{$radio3="checked";}
   
  } 
}
  else {
    echo "0 results";
  }

?>
<form action='' method='post'>
username : <input type='text' name='username' value="<?php echo $username; ?>" ><br><br>

password : <input type='text' name='password' value="<?php echo $password; ?>" ><br><br>

firstname : <input type='text' name='firstname' value="<?php echo $firstname; ?>" ><br><br>

email : <input type='text' name='email' value="<?php echo $email; ?>" ><br><br>

address : <input type='text' name='address' value="<?php echo $address; ?>" ><br><br>

dob : <input type='date' name='dob' value="<?php echo $dob; ?>" ><br><br>

Gender:
     <input type='radio' name='gender' value='female'<?php echo $radio1; ?>>Female
     <input type='radio' name='gender' value='male' <?php echo $radio2; ?> >Male
     <input type='radio' name='gender' value='other'<?php  $radio3; ?> > Other
     <br><br>

<html>
<body>

<label for="profession"> Profession : </label>

<select id="profession">
  <option value = "teacher"> Teacher </option>
  <option value = "doctor"> Doctor </option>
  <option value = "engineer"> Engineer </option>
  <option value = "academician"> Academician </option>
  <option value = "advocate"> Advocate </option>
</select>
<br>
<br>

<label for="interests"> Interests : </label><br>

<input type = "checkbox" name = "music" Value = "music">
<label for = "music"> Music </label><br>
<input type = "checkbox" name = "sports" Value = "sports">
<label for = "sports"> Sports </label><br>
<input type = "checkbox" name = "reading" Value = "reading">
<label for = "reading"> Reading </label><br>
<input type = "checkbox" name = "gardening" Value = "gardening">
<label for = "gardening"> Gardening </label><br>
<input type = "checkbox" name = "travelling" Value = "travelling">
<label for = "travelling"> Travelling </label><br>

<?php
$str = "Value"."+"."Value"."+"."Value"."+"."Value"."+"."Value";
$str;
$pattern = "/[\+]/";
$splitteddata = preg_split($pattern,$str);
$splitteddata[0];
$splitteddata[1];
$splitteddata[2];
?>

</body>
</html>

<br>
<br>

<input name='update' type='submit' value='Update'>  

<?php echo $error; ?>
<br>
<br>

<a href="../view/pageone.php">Back </a><br>

<a href="../control/logout.php"> logout</a>

</body>
</html>
<?php 
    $validateemail="";
    $validatepassword="";
    $v1=$v2="";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $email=$_REQUEST["email"];
        $password=$_PASSWORD["password"];

        if(empty($email) || !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) 
        {
            $validateemail="your must enter valid email";
        } 
        else 
        {
            $validateemail="your email is ".$email;
        }

        if(empty($password) || strlen($password) < 8)
        {
            $validatepassword="you must enter valid password";
        } 
        else 
        {
            $validatepassword="Welcome.".$password;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <h1> CURRENT PASSWORD </h1>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">

        Current Password : <input type="password" password="fpassword"><?php echo $validatepassword; ?>
        <br><br>
        New Password : <input type="password" password="fpassword"><?php echo $validatepassword; ?>
        <br><br>
        Retype New Password : <input type="password" password="fpassword"><?php echo $validatepassword; ?>
        <br><br>

        <?php echo $validateemail; ?>
        <?php echo $v1; ?>
        <?php echo $v2 ?>
        <?php echo $validatepassword ;?>
        <input type="submit" value="SUBMIT">
    </form>
</body>
</html>
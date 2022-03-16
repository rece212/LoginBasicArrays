<?php
    session_start();

    $Name= isset($_POST["name"])?$_POST["name"] :'';
    $Username = isset($_POST["username"])?$_POST["username"] :'';
    $Pass = isset($_POST["password"])?$_POST["password"] :'';
    $ErrorMessage="";// this is for error that accuse

    Register($Username,$Name,$Pass,$_SESSION['UserData']);


    ?>



<!DOCTYPE html>

<html>

<head>

    <!--Creating the login page-->

    <title>Register PAGE</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<form action="register.php" method="post">

    <h1>Register</h1>

    <label> Name </label>
    <input type="text" required name="name"
           placeholder="name" value="<?php  echo isset($Name) ? $Name:'';?>"><br>

    <label> Username </label>
    <input type="username" required name="username"
           placeholder="username" value="<?php  echo isset($Username) ? $Username:'';?>"><br>

    <label>Password</label>
    <input type="password" required name="password"  value="<?php  echo isset($Pass) ? $Pass:'';?>"
           placeholder="password"><br>
    <?php echo $ErrorMessage;?>

    <!--Register Button-->
    <button name="Register" type="Submit">Register</button>

</form>

</body>

</html>

<?php

function Register($Username,$Name,$Pass,$Date)
{
    $Logged =false;
    for ( $x=0;$x<sizeof($Date);$x++)
    {
        if(strcmp($Date[$x][0],md5($Username))==0)
        {
            $Logged=true;
        }
    }
    if ($Logged ==false)
    {

        array_push($_SESSION['UserData'],array(md5($Username),md5($Pass),$Name));
        header('Location: index.php');
    }
    else
    {
        $GLOBALS['ErrorMessage']="<br>Your email is in the system already <br>";
    }

}



?>
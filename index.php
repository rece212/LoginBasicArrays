<?php
    session_start();
    include_once 'UserData.php';

    //  home work - user must be able to also register an account
    // be able to login with the new user details
    // must create a reg screen ( with css)
   // make a nice and fun welcome screen

    $multLogin =array(
            Array("Granny","Cats"),
            Array("Grandpa","Ball"),
            Array("Grandson","Dog")
        );


    $Name = isset($_POST["username"])?$_POST["username"] :'';
    $Pass = isset($_POST["password"])?$_POST["password"] :'';
    $ErrorMessage="";// this is for error that accuse

    if (isset($_POST['login']))
    {
        Login($Name,$Pass, $_SESSION["UserData"]);
    }


?>

<!DOCTYPE html>

<html>

<head>

    <!--Creating the login page-->

    <title>LOGIN PAGE</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<form action="index.php" method="post">

    <h1>LOGIN</h1>



    <label> Username </label>
    <input type="username" required name="username"
           placeholder="username" value="<?php  echo isset($Name) ? $Name:'';?>"><br>

    <label>Password</label>
    <input type="password" required name="password"  value="<?php  echo isset($Pass) ? $Pass:'';?>"
           placeholder="password"><br>
    <?php echo $ErrorMessage;?>

    <!--Login Button-->
    <button name="login" type="Submit">Login</button>
    <a href="register.php">Register page</a>
</form>

</body>

</html>


<?php

    function Login($Name,$Pass,$Date)
    {
        $Logged =false;
        for ( $x=0;$x<sizeof($Date);$x++)
        {
            if((strcmp($Date[$x][0],md5($Name))==0)&& (strcmp($Date[$x][1],md5($Pass))==0))
            {
                echo '<script>alert("You got your details correct")</script>';
                $Logged=true;
                $_SESSION['name'] = $Date[$x][2];
                header('Location: Welcome.php');

            }
        }
        if ($Logged ==false)
        {
            //echo '<script>alert("You got your details wrong")</script>';
            $GLOBALS['ErrorMessage']="<br>You got your details wrong<br>";
        }

    }



?>

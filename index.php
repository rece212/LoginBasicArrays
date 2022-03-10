<?php
    session_start();
    //  home work - user must be able to also register an account
    // be able to login with the new user details
    // must create a reg screen ( with css)
   // make a nice and fun welcome screen
    $Username = Array("782dd5249e6dfe9a887c44e4370b7564","16ba038ec0ed9f6326e73bb398b3bf29","c2f970ce4f3884dd997e915bc9f11efc");
    $Password= Array("6839d672141795d0959700017e3cdec4","353df421c4fc976e2637061d7a83f601","c935d187f0b998ef720390f85014ed1e");

    $Data = Array(  Array("782dd5249e6dfe9a887c44e4370b7564","6839d672141795d0959700017e3cdec4"),
                    Array("16ba038ec0ed9f6326e73bb398b3bf29","353df421c4fc976e2637061d7a83f601"),
                    Array("c2f970ce4f3884dd997e915bc9f11efc","c935d187f0b998ef720390f85014ed1e"));


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
        Login($Name,$Pass,$Data);
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
    <input type="password" required name="password"  value="<?php  echo isset($Pass) ? $Pass:'';?>" placeholder="password"><br>
    <?php echo $ErrorMessage;?>

    <!--Login Button-->
    <button name="login" type="Submit">Login</button>

</form>

</body>

</html>


<?php

    function Login($Name,$Pass,$Date)
    {
        $Logged =false;
        for ( $x=0;$x<3;$x++)
        {
            if((strcmp($Date[$x][0],md5($Name))==0)&& (strcmp($Date[$x][1],md5($Pass))==0))
            {
                echo '<script>alert("You got your details correct")</script>';
                $Logged=true;
                $_SESSION['name'] = $Name;
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

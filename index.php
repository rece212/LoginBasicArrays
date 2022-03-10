<?php
    session_start();

    $Username = Array("Granny","Grandpa","Grandson");
    $Password= Array("Cats","Ball","Dog");
    $Name = isset($_POST["username"])?$_POST["username"] :'';
    $Pass = isset($_POST["password"])?$_POST["password"] :'';

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
           placeholder="username"><br>

    <label>Password</label>
    <input type="password" required name="password"  placeholder="password"><br>

    <!--Login Button-->
    <button name="login" type="Submit">Login</button>

</form>

</body>

</html>


<?php
if (isset($_POST['login']))
{
    Login($Name,$Pass,$Username,$Password);
}


function Login($Name,$Pass,$Username,$Password)
{
    $Logged =false;
    for ( $x=0;$x<3;$x++)
    {
        if((strcmp($Username[$x],$Name)==0)&& (strcmp($Password[$x],$Pass)==0))
        {
            echo '<script>alert("You got your details correct")</script>';
            $Logged=true;
            $_SESSION['name'] = $Name;
            header('Location: Welcome.php');

        }
    }
    if ($Logged ==false)
    {
        echo '<script>alert("You got your details wrong")</script>';

    }

}

?>

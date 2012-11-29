<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Derek Sewell
 * Date: 25/11/12
 * Time: 11:42
 * To change this template use File | Settings | File Templates.
 */

include("factory.php");
echo "<h2>Register</h2> ";
print
    ("
            <hr/>
            <form action = 'reg.php' method='post''>
            User name: <br> <input type='text' name='username' value='{$_POST["username"]}'><br>
            Password: <br> <input type='password' name='password' ><br>
            Confirm Password: <br>  <input type='password' name='password2'><br>
            Email: <br>  <input type='text' name='email' value='{$_POST["email"]}'><br>
            <input type='submit' name='submit' value='Submit'>
            </form>
    ");

if (isset($_POST['submit']))
{

    print("<font color='red'>");

    $ready = true;
    if ($_POST['username'] == '') {
        $ready = false;
        print("User name missing. <br>");
    }

    if ($POST['password'] == '') {
        $ready = false;
        print("Password missing. <br>");
    }

    if ($POST['password'] != $_POST['password2']) {
        $ready = false;
        print("Passwords do not match. <br>");
    }

    if ($POST['email'] == '') {
        $ready = false;
        print("Email missing. <br>");
    }

    if($ready)
    {
        //Submit information to database here
    }
}
    $pdo = Factory::getPdo();
    $query = Factory::query($pdo, "SELECT * FROM `testtable1`");
    echo '<pre>';
    print_r($query);
    echo '<pre>';
    //print(Factory::query(Factory::getPdo(), "SELECT * FROM `testtable1` WHERE `FirstName` = `John`"));
?>





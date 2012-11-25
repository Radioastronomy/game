<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Derek Sewell
 * Date: 25/11/12
 * Time: 11:42
 * To change this template use File | Settings | File Templates.
 */
echo "<h2>Register</h2> ";


print
    ("
            <hr/>
            <form action = 'reg.php' method='post''>
            User name: <br> <input type='text' name='username' value='{$_POST["username"]}'><br>
            Password: <br> <input type='password' name='password' ><br>
            Confirm Password: <br>  <input type='password' name='password2'><br>
            Email: <br>  <input type='text' name='email' value='{$_POST["email"]}'><br>
            <input type='submit' value='Submit'>
            </form>
    ");

if($_POST['username']  == '')
    print("User name missing. <br>");

if($POST['password'] == '')
    print("Password missing. <br>");

if($POST['password'] != $_POST['password2'])
    print("Passwords do not match. <br>");

if($POST['email'] == '')
    print("Email missing. <br>");







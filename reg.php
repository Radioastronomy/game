<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Derek Sewell
 * Date: 25/11/12
 * Time: 11:42
 * To change this template use File | Settings | File Templates.
 */
use Orbyte\Database\PDO\PDOQueryBuilder;

include("factory.php");
include("lib/orbyte/database/pdo/PDOQueryBuilder.php");

echo "<h2>Register</h2> ";

if (!isset($_COOKIE['status'])) {

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

    if (isset($_POST['submit'])) {

        print("<font color='red'>");

        $ready = true;
        if ($_POST['username'] == '') {
            $ready = false;
            print("User name missing. <br>");
        }

        if (strlen($_POST['username']) > 15) {
            $ready = false;
            print("User name is to long. <br>");
        }

        if ($_POST['password'] == '') {
            $ready = false;
            print("Password missing. <br>");
        }

        if ($_POST['password'] != $_POST['password2']) {
            $ready = false;
            $_POST['password'] == null;
            $_POST['password2'] == null;
            print("Passwords do not match. <br>");
        }

        if ($_POST['email'] == '') {
            $ready = false;
            print("Email missing. <br>");
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $ready = false;
            print("Email invalid. <br>");
        }


        if ($ready) {
            $pdo = Factory::getPdo();
            $statement = PDOQueryBuilder::insert("userdb", array("username" => $_POST['username'], "email" => $_POST['email'], "password" => $_POST['password']));
            print($statement);
            Factory::queryNoResult($pdo, $statement);


            print('
                    <script type="text/javascript">
                        window.location = "reg_complete.php"
                    </script>
                ');
            die();
        }
    }
    $pdo = Factory::getPdo();
    $query = Factory::query($pdo, "SELECT * FROM `userdb`");
    echo '<pre>';
    print_r($query);
    echo '<pre>';

} else {
    $_COOKIE['status'] == null;
    print("Registration success </br>");
    echo '<pre>';
    print("Username: " . $_POST['username']);
    print("Email: " . $_POST['email']);
    echo '</pre>';
    $_POST['username'] == null;
    $_POST['email'] == null;
    $_POST['password'] == null;
    $_POST['password2'] == null;
}

?>





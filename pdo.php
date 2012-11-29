<?php
/**
 * User: TIS
 * Date: 25-11-12
 */


//Make PDO Object
try {

    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    );

    $pdo = new PDO('mysql:host=db416507421.db.1and1.com;dbname=db416507421;charset=UTF-8','dbo416507421', 'tabletopapples',$options);
} catch (PDOException $e) {
    die('cant pdo: '. $e->getMessage());
}

//Run Query
$statement = "SELECT * FROM `testtable1` WHERE `FirstName` = 'John'";
$query = $pdo->prepare($statement);
$query->execute(//array(
    //':first' => 'John'
//)
);
$result = $query->fetchAll();

//Show results
echo '<pre>';
print_r($result);
echo '</pre>';
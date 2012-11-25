<?php
/**
 * User: TIS
 * Date: 24-11-12
 */

$db = new PDO(
    'mysql:host=db416507421.db.1and1.com;
    dbname=db416507421;
    charset=UTF-8',
    'dbo416507421', 'tabletopapples');

$result = mysql_query('SELECT * from testtable1 WHERE 1') or die(mysql_error());

?>


<h2>Welcome mortals</h2>
    <hr/>




<pre>
    <?=print_r($_SERVER)?>
</pre>
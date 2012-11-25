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


foreach($db->query('SELECT * FROM testtable1') as $row) {
    echo $row['field1'].' '.$row['field2']; //etc...
}

?>


<h2>Welcome mortals</h2>
    <hr/>




<pre>

</pre>
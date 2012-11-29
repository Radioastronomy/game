<?php
/**
 * User: TIS
 * Date: 29-11-12
 */
namespace Orbyte\Database\PDO;

use Orbyte\Database\PDO\PDOQueryBuilder;

class PDOQueryExecutor
{
    public static function insert(\PDO $pdo, $table, array $values) {
        $query = PDOQueryBuilder::insert($table,array_keys($values));
        return self::quickParams($pdo,$query,$values);
    }


    public static function update(\PDO $pdo, $table, array $values, array $conditions) {
        //todo:: implement
    }

    public static function insertUpdate(\PDO $pdo, $table, array $values) {
        $query = PDOQueryBuilder::insertUpdate($table,array_keys($values));

        return self::quickParams($pdo,$query,$values);
    }

    public static function delete(\PDO $pdo, $table, array $conditions) {
        $query = PDOQueryBuilder::delete($table,array_keys($conditions));
        return self::quickParams($pdo,$query,$conditions);
    }

    private static function quickParams(\PDO $pdo, $query, array $values = array()) {
        $params = array();
        foreach($values as $key => $value) {
            $params[':'.$key] = $value;
        }

        $statement = $pdo->prepare($query);
        $statement->execute($params);
        return $statement->rowCount();
    }


}

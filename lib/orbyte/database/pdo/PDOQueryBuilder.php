<?php
/**
 * User: TIS
 * Date: 29-11-12
 */
namespace Orbyte\Database\PDO;


class PDOQueryBuilder
{

    const ENGINE_MYISAM = 'MyISAM';
    const ENGINE_INNODB = 'InnoDB';
    const ENGINE_MEMORY = 'MEMORY';

    const CHARSET_UTF8 = 'utf8';
    const CHARSET_LATIN1 ='latin1';

    /**
     * @param $table
     * @param array $values
     * @param array $conditions
     * @return string
     */
    public static function update($table,array $values,array $conditions) {
        return 'UPDATE `'.$table.'` SET '.implode(',',self::buildValues($values)).' WHERE '.implode(' AND ',self::buildValues($conditions,true));
    }

    /**
     * @param $table
     * @param array $values
     * @return string
     */
    public static function insert($table,array $values) {
        return 'INSERT INTO `'.$table.'` (`'.implode('`,`',$values).'`) VALUES (:'.implode(',:',$values).');';
    }

    /**
     * @param $table
     * @param array $values
     * @return string
     */
    public static function insertUpdate($table,array $values) {
        return 'INSERT INTO `'.$table.'` (`'.implode('`,`',$values).'`) VALUES (:'.implode(',:',$values).') ON DUPLICATE KEY UPDATE '.implode(',',self::buildValues($values)).';';
    }

    /**
     * @param $table
     * @param array $conditions
     * @return string
     */
    public static function delete($table, array $conditions) {
        //TODO:: Implement
    }

    /**
     * @param $table
     * @param $fields
     * @param array $extra
     * @param string $engine
     * @param string $charset
     */
    public static function createTable($table,$fields,$extra=array(),$engine=self::ENGINE_INNODB,$charset=self::CHARSET_UTF8) {
        //TODO:: Implement
    }

    /**
     * @param $table
     * @return string
     */
    public static function truncateTable($table) {
        return 'TRUNCATE TABLE `'.$table.'`;';
    }

    /**
     * @param $table
     * @return string
     */
    public static function dropTable($table) {
        return 'DROP TABLE IF EXISTS `'.$table.'`;';
    }


    /**
     * Creates PDO usable values
     * @param $values
     * @param bool $useKey
     * @return array
     */
    protected static function buildValues($values,$useKey=false) {
        $r = array();
        foreach($values as $key => $value) {
            $r[] = '`'.($useKey?$key:$value).'`=:'.$value;
        }
        return $r;
    }

}

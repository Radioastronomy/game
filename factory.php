<?php
    class Factory
    {


        public static function getPdo()
        {


            try {

                $options = array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                );

                $pdo = new PDO('mysql:host=db416507421.db.1and1.com;dbname=db416507421;charset=UTF-8','dbo416507421', 'tabletopapples',$options);
            } catch (PDOException $e) {
                die('cant pdo: '. $e->getMessage());
            }

            return $pdo;
        }

        public static function query($pdo, $queryString)
        {
            $statement = $queryString;
            $query = $pdo->prepare($statement);
            $query->execute();
            $result = $query->fetchAll();

            return $result;
        }

        public static function queryNoResult($pdo, $queryString)
        {
            $statement = $queryString;
            $query = $pdo->prepare($statement);
            $query->execute();

        }

        public static function closeDatabaseConnection()
        {
            global $pdo;
            $pdo = null;
        }
    }

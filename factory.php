<?php
    class Factory
    {


        public static function connectToDatabase()
        {
            //Database connect stuff here
        }

        public static function queryAndOutput($string)
        {
            global $pdo;
            $statement = "SELECT * FROM `testtable1` WHERE `FirstName` = :first";
            $query = $pdo->prepare($statement);
            $result = $query->fetchAll();

            echo '<pre>';
            print_r($query);
            echo '</pre>';
        }

        public static function closeDatabaseConnection()
        {
            global $pdo;
            $pdo = null;
        }
    }

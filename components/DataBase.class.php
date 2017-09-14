<?php
    class DataBase {
        public static function getConnection() {
            $params_path = ROOT.'/configuration/dataBaseConnection.php';
            $params = include($params_path);

            $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
            try {
                $pdo = new PDO($dsn, $params['user'], $params['password']);
            } catch (PDOException $e) {
                echo "Connection error :". $e->getMessage();
                exit();
            }

            return ($pdo);
        }

        public static function createDataBase() {
            $params_path = ROOT.'/configuration/dataBaseConnection.php';
            $params = include($params_path);

            $dsn = "mysql:host={$params['host']};dbname=";
            try {
                $pdo = new PDO($dsn, $params['user'], $params['password']);
            } catch (PDOException $e) {
                echo "Connection error :" . $e->getMessage();
                exit();
            }

            $query = 'CREATE DATABASE IF NOT EXISTS `test`';

            try {
                $pdo->query($query);
            } catch (PDOException $e) {
                echo "Error: Can't CREATE DataBase - " . $e->getMessage();
                exit();
            }
        }

        public static function createTables() {
            $pdo = self::getConnection();
            $query_path = ROOT.'/configuration/queries.php';
            $queries = include($query_path);

            try {
                $query = $pdo->prepare($queries['tasks']);
                $query->execute();
            } catch (PDOException $e) {
                echo "Error: CAN'T CREATE TABLE - tasks" . $e->getMessage();
                exit();
            }
            try {
                $query = $pdo->prepare($queries['users']);
                $query->execute();
            } catch (PDOException $e) {
                echo "Error: CAN'T CREATE TABLE - users" . $e->getMessage();
                exit();
            }

            $passwd = hash('whirlpool', '123');
            $login = 'admin';

            $query_login = $pdo->prepare("SELECT * FROM `users` WHERE login = '$login'");
            $query_login->execute();
            $result_login = $query_login->fetchAll();

            if ($result_login == NULL) {
                $query = $pdo->prepare("INSERT INTO `users` (login, password) VALUES (?, ?)");
                $query->execute([$login, $passwd]);
            }
        }
    }

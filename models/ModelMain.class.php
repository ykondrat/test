<?php

    class ModelMain {
        public static function start() {
            require_once ROOT . '/views/viewMain.php';
        }
        public static function list($data) {
            $pdo = DataBase::getConnection();
            $limit = $data['limit'];

            if ($limit == 1) {
                $query = $pdo->prepare("SELECT * FROM `tasks` LIMIT 3");
                $query->execute();
                $result = $query->fetchAll();

                $query_next = $pdo->prepare("SELECT * FROM `tasks` LIMIT 3, 1");
                $query_next->execute();
                $result_next = $query_next->fetchAll();

                $result[] = count($result_next);
                echo json_encode($result);
            } else if ($limit == 2){
                $query = $pdo->prepare("SELECT * FROM `tasks` LIMIT 3, 3");
                $query->execute();
                $result = $query->fetchAll();

                $query_next = $pdo->prepare("SELECT * FROM `tasks` LIMIT 6, 1");
                $query_next->execute();
                $result_next = $query_next->fetchAll();

                $result[] = count($result_next);
                echo json_encode($result);
            } else {
                $limit += 3;
                $query = $pdo->prepare("SELECT * FROM `tasks` LIMIT $limit, 3");
                $query->execute();
                $result = $query->fetchAll();

                $limit_next = $limit + 3;
                $query_next = $pdo->prepare("SELECT * FROM `tasks` LIMIT $limit_next, 1");
                $query_next->execute();
                $result_next = $query_next->fetchAll();

                $result[] = count($result_next);
                echo json_encode($result);
            }
        }
    }

<?php
    class ModelAuth {
        public static function signup($data) {
            $pdo = DataBase::getConnection();

            $name = $data['name'];
            $email = $data['email'];
            $password = $data['password'];

            $query_login = $pdo->prepare("SELECT * FROM `users` WHERE login = '$name'");
            $query_email = $pdo->prepare("SELECT * FROM `users` WHERE email = '$email'");

            $query_login->execute();
            $result_login = $query_login->fetchAll();

            $query_email->execute();
            $result_email = $query_email->fetchAll();

            if ($result_login == NULL && $result_email == NULL) {
                $query = $pdo->prepare("INSERT INTO `users` (login, email, password) VALUES (?, ?, ?)");
                $query->execute([$name, $email, hash('whirlpool', $password)]);

                $session = Session::getInstance();
                $session->logged_user = $name;

                echo "OK";
            } else {
                echo "Name or email already exists";
            }
        }

        public static function signin($data) {
            $pdo = DataBase::getConnection();

            $name = $data['name'];
            $password = $data['password'];

            $query_login = $pdo->prepare("SELECT * FROM `users` WHERE login = '$name'");
            $query_login->execute();
            $result_login = $query_login->fetchAll();

            if ($result_login) {
                if (hash('whirlpool', $password) == $result_login[0]["password"]) {
                    $session = Session::getInstance();
                    $session->logged_user = $name;

                    echo "OK";
                } else {
                    echo "Incorrect password";
                }
            } else {
                echo "No such user";
            }
        }

        public static function logout() {
            $session = Session::getInstance();
            $session->destroy();
            header("Location: http://ykondrat-001-site1.1tempurl.com/test/");
        }
    }

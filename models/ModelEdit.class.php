<?php
    include(ROOT.'/components/SimpleImage.class.php');

    class ModelEdit{

        public static function start() {
            require_once ROOT . '/views/viewEditor.php';
        }

        public static function add($data, $file) {
            $pdo = DataBase::getConnection();

            $user_name = $data['name'];
            $user_email = $data['email'];
            $task = $data['task'];
            $color = $data['color'];

            if ($file) {
                $target_dir = "./public/images/";
                $target_file = $target_dir . basename($file["img"]["name"]);
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

                $check = getimagesize($file["img"]["tmp_name"]);
                if ($check) {
                    if ($imageFileType != "jpg" && $imageFileType != "jpeg"&& $imageFileType != "png" && $imageFileType != "gif" ) {
                        echo "Sorry, only JPG, PNG & GIF files are allowed.";
                    } else {
                        if (move_uploaded_file($file["img"]["tmp_name"], $target_file)) {
                            $image = new SimpleImage();
                            $image->load($target_file);
                            $image->resize(320, 240);
                            $image->save($target_file);

                            $query = $pdo->prepare("INSERT INTO `tasks` (user_name, email, task_body, task_img, task_color, task_done) VALUES (?, ?, ?, ?, ?, ?)");
                            $query->execute([$user_name, $user_email, $task, $target_file, $color, 'false']);

                            echo "OK";
                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }
                    }
                } else {
                    echo "File is not an image.";
                }
            } else {
                $query = $pdo->prepare("INSERT INTO `tasks` (user_name, email, task_body, task_color, task_done) VALUES (?, ?, ?, ?, ?)");
                $query->execute([$user_name, $user_email, $task, $color, 'false']);
                echo "OK";
            }
        }

        public static function edit($data) {
            $pdo = DataBase::getConnection();
            $id = $data['id'];
            $name = $data['name'];
            $email = $data['email'];
            $task = $data['task'];
            $done = $data['done'];


            $query = $pdo->prepare("UPDATE `tasks` SET user_name='$name', email='$email', task_body='$task', task_done='$done' WHERE id_task = '$id'");
            $query->execute();

            echo "OK";
        }
    }

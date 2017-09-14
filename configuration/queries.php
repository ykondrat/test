<?php
    $queries = array(
        'tasks' => 'CREATE TABLE IF NOT EXISTS tasks (id_task serial NOT NULL,
                                              user_name varchar(255) NOT NULL,
                                              email varchar(255) NOT NULL,
                                              task_body varchar(10000) NOT NULL,
                                              task_img varchar(255) DEFAULT NULL,
                                              task_color varchar(255) NOT NULL,
                                              task_done varchar(50) DEFAULT NULL,
                                              PRIMARY KEY (id_task))',

        'users' => 'CREATE TABLE IF NOT EXISTS users (id_login serial NOT NULL,
                                          login varchar(50) NOT NULL,
                                          email varchar(100) DEFAULT NULL,
                                          password varchar(255) NOT NULL,
                                          PRIMARY KEY (id_login))'
    );

    return ($queries);

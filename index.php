<?php
    error_reporting(E_ALL);
    ini_set('display_errors','on');

    define('ROOT', getcwd());
    require_once (ROOT.'/components/Router.class.php');
    require_once (ROOT.'/components/Session.class.php');
    require_once (ROOT.'/components/DataBase.class.php');

    DataBase::createDataBase();
    DataBase::createTables();

    $router = new Router();
    $router->runRouter();

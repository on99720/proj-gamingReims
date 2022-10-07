<?php
require_once 'MyPDO.template.php';

MyPDO::setConfiguration('mysql:host=localhost;dbname=projet1', 'root', '',   array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
));
//MyPDO::setConfiguration('mysql:host=mysql;dbname=infs3_prj01', 'infs3_prj01', 'infs3_prj01');
<?php
/**
 * Created by PhpStorm.
 * User: sid
 * Date: 30.06.2017
 * Time: 20:03
 */

define('SMARTY_DIR', str_replace("\\", "/", getcwd()).'/libs/');
require_once(SMARTY_DIR . 'Smarty.class.php');
require_once ('./models/Database.php');
require_once ('./models/Tree.php');

$param = [
    'host'=> 'localhost',
    'user'=> 'root',
    'password' => '',
    'database' => 'holbi',
    'language' => 1,
    'type' => 'pdo'
];
echo Tree::getInstance($param)->getTree(0);
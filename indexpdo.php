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
require_once ('./conf/param.php');

$param = array_merge($param,array('type'=>'pdo'));

echo Tree::getInstance($param)->getTree(0);
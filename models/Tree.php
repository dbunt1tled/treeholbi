<?php

/**
 * Created by PhpStorm.
 * User: sid
 * Date: 30.06.2017
 * Time: 20:39
 */
class Tree {
    protected $db = null;
    private static $_instance;
    protected $connect = null;
    protected $smarty = null;
    protected $sqlmysqli = 'SELECT i.item_id,i.parent_id,d.item_name
                                FROM items as i 
                                LEFT JOIN items_description as d ON d.item_id=i.item_id
                                WHERE d.language_id = ? ORDER BY i.parent_id,d.item_name';
    protected $sqlpdo = 'SELECT i.item_id,i.parent_id,d.item_name
                                FROM items as i 
                                LEFT JOIN items_description as d ON d.item_id=i.item_id
                                WHERE d.language_id = :language ORDER BY i.parent_id,d.item_name';
    protected $language = 1;
    protected $itemsArray = [];
    protected $type = '';
    protected function __construct($param){

        $this->type = $param['type'];
        $this->language = $param['language'];

        $this->db = Database::getInstance($param);
        $this->connect = $this->db->getConnection();

        $this->smarty = new Smarty();

        $this->smarty->template_dir = str_replace("\\", "/", getcwd()).'/views/templates/';
        $this->smarty->compile_dir = str_replace("\\", "/", getcwd()).'/views/templates_c/';
        $this->smarty->config_dir = str_replace("\\", "/", getcwd()).'/views/configs/';
        $this->smarty->cache_dir = str_replace("\\", "/", getcwd()).'/views/cache/';

        $this->smarty->assign('name', 'Катруська');

    }

    protected function getItemsArraymysqli(){
        $item_id = 0;
        $parent_id = 0;
        $item_name = 0;
        $items = [];
        $stm = $this->connect->prepare($this->sqlmysqli);
        $stm->bind_param("i", $this->language);
        $stm->execute();
        $stm->store_result();
        $stm->bind_result($item_id, $parent_id, $item_name);
        while ($stm->fetch()) {
            $items[$parent_id][$item_id] =  array('id'=>$item_id,'parent_id'=>$parent_id,'name'=>$item_name);
        }
        return $items;
    }
    protected function getItemsArraypdo(){
        $item_id = 0;
        $parent_id = 0;
        $item_name = 0;
        $items = [];

        $stm = $this->connect->prepare($this->sqlpdo);
        $stm->execute(array('language' => $this->language));

        while ($row = $stm->fetch(PDO::FETCH_LAZY)){
            $items[$row->parent_id][$row->item_id] =  array('id'=>$row->item_id,'parent_id'=>$row->$parent_id,'name'=>$row->item_name);
        }

        return $items;
    }
    public function getTree($params,$parent_id=0){
        $method = 'getItemsArray'.$this->type;
        $this->itemsArray = $this->$method();

        $this->smarty->assign('itemsArray', $this->itemsArray);
        return $this->smarty->display('index.tpl');

    }
    static function getInstance($param){
        if(!self::$_instance) {
            self::$_instance = new self($param);
        }
        return self::$_instance;
    }
}
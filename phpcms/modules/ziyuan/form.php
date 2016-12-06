<?php
defined('IN_PHPCMS') or exit('No permission resources.');
class form {
    private $db;
    function __construct() {
        $this->db = pc_base::load_model('ziyuan_model');
    }

    public function init() {
        //$where = array('id'=>'1');
        //$res=$this->db->select();
        //var_dump($res);
        include template('ziyuan','index');
    }
    public function tijiao(){
        $formname=$_GET['formname'];
        $ziyuan=$_POST;
        if($formname=='mnzh')
        {
            $id=$res=$this->db->insert($ziyuan,true);
            if($id)
            {
                include template('ziyuan','mnzhok');
            }
        }
        else if($formname=='spzh'){
            $id=$res=$this->db->insert($ziyuan,true);
            if($id)
            {
                include template('ziyuan','spzhok');
            }
            //实盘账户
        }
        else
        {
            //加盟代理
            $id=$res=$this->db->insert($ziyuan,true);
            if($id)
            {
                include template('ziyuan','jmdlok');
            }

        }

    }

}

<?php
defined('IN_PHPCMS') or exit('No permission resources.');
class upload {
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

    public function upload(){
        $ok=@move_uploaded_file($_FILES['file1']['tmp_name'],$UPLOAD_PATH);
        if($ok == FALSE){
            echo json_encode(array('file_infor' => '上传失败'));
        }else{
            echo json_encode(array('file_infor'=>'上传成功'));
        }

    }

}

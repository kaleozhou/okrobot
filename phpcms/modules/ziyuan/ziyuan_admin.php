<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_app_class('admin','admin',0);
class ziyuan_admin extends admin {
    private $db;
	function __construct() {
    parent::__construct();
	}

    public function init() {
        include $this->admin_tpl('test');
			include template('ziyuan', 'index');
	}
    public function show() {
        $address=$_GET['add'];
			include template('ziyuan', $address);
	}





}

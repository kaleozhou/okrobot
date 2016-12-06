<?php
defined('IN_PHPCMS') or exit('No permission resources.');
class index {
    private $db;
	function __construct() {
  
	}

    public function init() {
        include template('ziyuan', 'index');
	}
    public function show() {
        $address=$_GET['add'];
			include template('ziyuan', $address);
	}





}

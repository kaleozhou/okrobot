<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_sys_class('model', '', 0);
class okrobot_kline_model extends model {
	public function __construct() {
		$this->db_config = pc_base::load_config('database');
		$this->db_setting = 'default';
		//$this->db_tablepre = $this->db_config[$this->db_setting]['tablepre'];
		$this->table_name = 'okrobot_kline';
		parent::__construct();
	}
	
}
?>

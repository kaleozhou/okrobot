<?php
/** =============================================================================
 * @name extention.inc.php
 * @date date 2016年11月28日 星期一 14时31分59秒
 * @author kaleo <kaleo1990@hotmail.com>
 * @package 
 * =============================================================================
 */
defined('IN_PHPCMS') or exit('Access Denied');
defined('INSTALL') or exit('Access Denied');
$parentid = $menu_db->insert(array('name'=>'okrobot',
    'parentid'=>'29',
    'm'=>'okrobot',
    'c'=>'okrobot', 
    'a'=>'init',
    'data'=>'', 
    'listorder'=>0,
    'display'=>'1'), true);

$language = array(
				'okrobot'=>'添加机器人',
				);



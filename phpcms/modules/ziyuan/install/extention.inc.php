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
$parentid = $menu_db->insert(array('name'=>'ziyuan',
    'parentid'=>'29',
    'm'=>'ziyuan',
    'c'=>'ziyuan', 
    'a'=>'init',
    'data'=>'', 
    'listorder'=>0,
    'display'=>'1'), true);
$menu_db->insert(array('name'=>'添加资源', 'parentid'=>$parentid, 'm'=>'ziyuan', 'c'=>'ziyuan', 'a'=>'add_ziyuan', 'data'=>'', 'listorder'=>0, 'display'=>'1'));
$language = array(
				'ziyuan'=>'手机号资源',
				);

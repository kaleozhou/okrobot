<?php
/**
 *  index.php PHPCMS 入口
 *
 * @copyright			(C) 2005-2010 PHPCMS
 * @license				http://www.phpcms.cn/license/
 * @lastmodify			2010-6-1
 */
 //PHPCMS根目录

define('PHPCMS_PATH', dirname(__FILE__).DIRECTORY_SEPARATOR);
define('TP', '/phpcms/templates/default/');
define('UPLOAD_PATH', '/phpcms/templates/default/upload/');
define('MYLINK','/index.php?&m=ziyuan&c=index&a=show&add=');
define('MYFORM','/index.php?&m=ziyuan&c=form&a=tijiao&formname=');
define('MYUPLOAD','/index.php?&m=ziyuan&c=upload&a=upload');
include PHPCMS_PATH.'/phpcms/base.php';

pc_base::creat_app();

?>

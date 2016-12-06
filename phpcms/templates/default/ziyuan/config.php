<?php
/** =============================================================================
 * @name dbconfig.php
 * @date date 2016年11月07日 星期一 15时56分23秒
 * @author kaleo <kaleo1990@hotmail.com>
 * @package 
 * =============================================================================
 */
$mysql_server_name='localhost'; 
$mysql_username='root';
$mysql_password='kaleozhou';
$mysql_dbname='ziyuan';
//连接数据库
$pdo = new PDO("mysql:host=$mysql_server_name; dbname=$mysql_dbname", $mysql_username,$mysql_password);

<?php
/** =============================================================================
 * @name threed.class.php
 * @date date 2016年12月06日 星期二 08时46分15秒
 * @author kaleo <kaleo1990@hotmail.com>
 * @package 
 * =============================================================================
 */

/** 
 * @title: PHP多线程类(Thread) 
 * @version: 1.0 
 * 
 * PHP多线程应用示例： 
 * require_once 'thread.class.php'; 
 * $thread = new thread(); 
 * $thread->addthread('action_log','a'); 
 * $thread->addthread('action_log','b'); 
 * $thread->addthread('action_log','c'); 
 * $thread->runthread(); 
 * 
 * function action_log($info) { 
 * $log = 'log/' . microtime() . '.log'; 
 * $txt = $info . "rnrn" . 'Set in ' . Date('h:i:s', time()) . (double)microtime() . "rn"; 
 * $fp = fopen($log, 'w'); 
 * fwrite($fp, $txt); 
 * fclose($fp); 
 * } 
 */ 
class thread { 
    var $hooks = array(); 
    var $args = array(); 
    function thread() { 
    } 
    function addthread($func) 
    { 
        $args = array_slice(func_get_args(), 1); 
        $this->hooks[] = $func; 
        $this->args[] = $args; 
        return true; 
    } 
    function runthread() 
    { 
        if(isset($_GET['flag'])) 
        { 
            $flag = intval($_GET['flag']); 
        } 
        if($flag || $flag === 0) 
        { 
            call_user_func_array($this->hooks[$flag], $this->args[$flag]); 
        } 
        else 
        { 
            for($i = 0, $size = count($this->hooks); $i < $size; $i++) 
            { 
                $fp=fsockopen($_SERVER['HTTP_HOST'],$_SERVER['SERVER_PORT']); 
                if($fp) 
                { 
                    $out = "GET {$_SERVER['PHP_SELF']}?flag=$i HTTP/1.1rn"; 
                    $out .= "Host: {$_SERVER['HTTP_HOST']}rn"; 
                    $out .= "Connection: Closernrn"; 
                    fputs($fp,$out); 
                    fclose($fp); 
                } 
            } 
        } 
    } 
}

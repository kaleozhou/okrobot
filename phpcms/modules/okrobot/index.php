<?php
defined('IN_PHPCMS') or exit('No permission resources.');
require_once (dirname(__FILE__) . '/OKCoin/OKCoin.php');
const API_KEY = "7573fd61-7b8a-4132-814b-9536325c8460";
const SECRET_KEY = "461D47D0FE52B28288E1285D8D899812";
class index {
    private $userinfo_db;
    function __construct() {
        $this->userinfo_db = pc_base::load_model('okrobot_userinfo_model');
        pc_base::load_app_func('global','okrobot');
    }

    public function init() 
    {

        // 必须加载扩展  
        if (!function_exists("pcntl_fork")) {  
            die("pcntl extention is must !");  
        }  
        $pid = pcntl_fork();    //创建子进程  
        //父进程和子进程都会执行下面代码  
        if ($pid == -1) {  
            //错误处理：创建子进程失败时返回-1.  
            die('could not fork');  
        } else if ($pid) {  
            //父进程会得到子进程号，所以这里是父进程执行的逻辑  
            //如果不需要阻塞进程，而又想得到子进程的退出状态，则可以注释掉pcntl_wait($status)语句，或写成：  
          //:  pcntl_wait($status,WNOHANG); //等待子进程中断，防止子进程成为僵尸进程。  
                include template('okrobot', 'index');
        } else {  
            //子进程得到的$pid为0, 所以这里是子进程执行的逻辑。  
            $res=0;

            $res=refresh_userinfo();
            include template('okrobot', 'index');
            exit(0) ;  
        }  
    }





}

<?php 

function object_userinfo($result){
    $userinfo=array();
    $userinfo['asset_net']=$result->info->funds->asset->net;
    $userinfo['asset_total']=$result->info->funds->asset->total;
    $userinfo['borrow_btc']=$result->info->funds->borrow->btc;
    $userinfo['borrow_cny']=$result->info->funds->borrow->cny;
    $userinfo['borrow_ltc']=$result->info->funds->borrow->ltc;
    $userinfo['free_btc']=$result->info->funds->free->btc;
    $userinfo['free_cny']=$result->info->funds->free->cny;
    $userinfo['free_ltc']=$result->info->funds->free->ltc;
    $userinfo['freezed_btc']=$result->info->funds->freezed->btc;
    $userinfo['freezed_cny']=$result->info->funds->freezed->cny;
    $userinfo['freezed_ltc']=$result->info->funds->freezed->ltc;
    $userinfo['union_fund']=date("Y/m/d h:i:s");


    return $userinfo;
} 
function refresh_userinfo(){
    try{


        $userinfo_db=pc_base::load_model('okrobot_userinfo_model');
        $client = new OKCoin(new OKCoin_ApiKeyAuthentication(API_KEY, SECRET_KEY));
        //获取用户信息
        $params = array('api_key' => API_KEY);
        $result = $client -> userinfoApi($params);
        $userinfo=object_userinfo($result);
        $res=$userinfo_db->insert($userinfo,true);
        //   $newid=$userinfo_db->insert_id();
        //净资产，总资产，可用资金，冻结资金
        //   $newuserinfo=$userinfo_db->get_one($newid);
        if($res){

            return 0;
        }
        else {
            // code... 
            return 1;
        }
    }
    catch (Exception $e)
    {
        printf("更新用户信息超时！");

        return 1;
    }
}
?>

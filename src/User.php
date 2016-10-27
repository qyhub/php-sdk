<?php

namespace Qyhub;

use Qyhub\Config;
use Qyhub\Http\Client;



class User
{
    /**
     *
     */
    public function __construct($appid)
    {
      $this->appid=$appid;
    }

    /**
     *
     *
     * @param get the sync app user
     *
     * @return Array Returns users
     */
    public function getSyncData($eid,$token)
    {
        $url =  Config::HOME_HOST."/api/get_sync_app_user?access_token=".$token;
        $client=new Client();
        $postData=json_encode(array(
          "eid"=>$eid,
          "appid"=>$this->appid
        ));
        $header=array('Content-Type'=> 'application/json');
        $response=$client->post($url,$postData,$header);

        $data=$response->json();
        if ($data["errcode"]===0){
            return $data;
        }
        return null;
    }
}

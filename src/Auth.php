<?php

namespace Qyhub;

use Qyhub\Config;
use Qyhub\Http\Client;

use \Firebase\JWT\JWT;


class Auth
{
    /**
     *
     */
    public function __construct($appId,$appSecret)
    {
        $this->appId=$appId;
        $this->appSecret=$appSecret;
    }

    /**
     *
     *
     * @param get the access_token from server
     *
     * @return string Returns access_token
     */
    public function getToken()
    {
        $url =  Config::HOME_HOST."/api/getToken?appid=".$this->appId."&appsecret=".$this->appSecret;
        $client=new Client();
        $response=$client->get($url);
        $data=$response->json();
        if ($data["errcode"]===0){
            return $data["access_token"];
        }
        return null;
    }

}

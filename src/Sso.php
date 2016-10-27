<?php

namespace Qyhub;

use Qyhub\Config;
use Qyhub\Http\Client;

use \Firebase\JWT\JWT;


class Sso
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
     * @param the token
     *
     * @return object Returns user { eid:"",uid:"",email:"",name:""}
     */
     public function getUser($token)
     {
       return JWT::decode($token, $this->appSecret,array('HS256'));
     }

     /**
     *获取sso auth 地址
     */
     public function getAuthUrl($callbackUrl,$redirectUrl)
     {
         $url = Config::SSO_AUTH_URL."?client_id=". $this->appId . '&redirect_uri='. $redirectUrl . '&callback=' . $callbackUrl;
         return $url;
     }

}

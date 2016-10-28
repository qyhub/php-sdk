<?php
namespace Home\Controller;

use Think\Controller;

use Qyhub\Sso;
use Qyhub\Auth;
use Qyhub\User;

class SsoController extends Controller
{
    var $id = "sh572998c872424";
    var $secret = "713f9ad481ce670249cf727aa41f638f";

    public function auth()
    {

        $sso = new Sso($this->id,$this->secret);
        $url =  $sso->getAuthUrl("http://localhost:8000/home/sso/callback", "http://localhost:8000/home/index/dashboard");
        redirect($url, 2,'页面跳转中,请稍后...');
        return ;
    }

    public function callback()
    {
      $authUserToken=  $_GET['token'];
      $sso = new Sso($this->id,$this->secret);
      $user = $sso->getUser($authUserToken);



      //获取token
      $auth= Auth($this->id,$this->secret);
      $token=$auth->getToken();

      //获取同步的用户数据
      $user=User($this->id);
      $userData=$user->getSyncData($eid,$token);
      /*
        {errcode:0;data:{need_sync_users:[user1,user2,...],userids:['u01','u02',...]}}
        errcode 为0时，表示请求成功
        data.need_sync_users 为要同步更新或者新增的用户
        data.userids 为订阅当前应用的用户
      */
      //var_dump($userData);

      //TODO

      //1. 将用户导入系统，并删除已经删除的用户
      //2. 将当前用户(使用userid)授权登录到系统中
      //3. 重定向到用户能访问的页面
      $this->redirect('/Home/Index/Dashboard',null,3,"欢迎".$user->name."登录,跳转到保护页面...");
      return ;
    }
}

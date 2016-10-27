<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
       redirect('https://qyhub.cn/', 2,'页面跳转中,请稍后...');
       return ;
    }
}

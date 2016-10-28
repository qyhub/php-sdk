<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{

    public function index()
    {
      return $this->display("index");
    }

    public function dashboard()
    {
      return $this->show("保护的内容");
    }

}

<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function index(){
        $user = $this->isLogin();
        $this->assign("user",$user);
        $this->display();
    }
}
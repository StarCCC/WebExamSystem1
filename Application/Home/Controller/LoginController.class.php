<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends BaseController {
    public function index(){
        $this->display();
    }
    public function error(){
        $this->display();
    }
    public function login(){
        $name = I("post.name");
        $pwd = I("post.pwd");
        $User = D("User");
        $user_pwd = $User->getPwdByName($name);
        if ($user_pwd == null ){
            $data["message"] = "此账户不存在！";
            $data["status"] = 1;
        } else if ($user_pwd != $pwd) {
            $data["message"] = "密码错误！";
            $data["status"] = 2;
        } else {
            $user_id = $User->getIdByName($name);
            session("QuserId",$user_id);
            $data["message"] = "登陆成功！";
            $data["status"] = 0;
        }
        $this->ajaxReturn($data,"JSON");
    }

    public function logout(){
        session("QuserId",null);
        $this->redirect("Login/index");
    }
}
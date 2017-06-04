<?php
namespace Admin\Controller;
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
        $User = new \Common\Model\UserModel();
        $user_pwd = $User->getPwdByName($name);
        $user_auth = $User->getAuthByName($name);
        if ($user_pwd == null || $user_auth != 1){
            $data["message"] = "此管理员账户不存在！";
            $data["status"] = 1;
        } else if ($user_pwd != $pwd) {
            $data["message"] = "密码错误！";
            $data["status"] = 2;
        } else {
            $user_id = $User->getIdByName($name);
            session("userId",$user_id);
            $data["message"] = "成功";
            $data["status"] = 0;
        }
        $this->ajaxReturn($data,"JSON");
    }
}
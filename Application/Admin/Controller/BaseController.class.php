<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller {
    public function index(){
        $User = new \Common\Model\UserModel();
        $name = $User->getNameById(12);
        echo $name;
        $this->display();
    }

    public function isLogin(){
        $User = new \Common\Model\UserModel();
        $user = session("userId");
        $name = $User->getNameById($user);
        if ($user == null)
            $this->redirect("Admin/Login/error");
        $data["userId"] = $user;
        $data["welcome"] = $name . "，欢迎您！";
        return $data;
    }

    public function getType(){
        $this->ajaxReturn(D("Problem")->getAllTypes());
    }

    public function getChapter(){
        $subid = I("post.subid");
        $this->ajaxReturn(D("Problem")->getAllChaptersBySubid($subid));
    }
}
<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {
    public function index(){
        $User = D("User");
        $name = $User->getNameById(12);
        echo $name;
        $this->display();
    }

    public function isLogin(){
        $User = new \Common\Model\UserModel();
        $user = session("QuserId");
        $name = $User->getNameById($user);
        if ($user == null)
            $this->redirect("Home/Login/index");
        $data["userId"] = $user;
        $data["welcome"] = $name . "，欢迎您！";
        return $data;
    }
    public function getSub(){
        $this->ajaxReturn(D("Problem")->getAllSubjects());
    }
    public function getType(){
        $this->ajaxReturn(D("Problem")->getAllTypes());
    }

    public function getChapter(){
        $subid = I("post.subid");
        $this->ajaxReturn(D("Problem")->getAllChaptersBySubid($subid));
    }
}
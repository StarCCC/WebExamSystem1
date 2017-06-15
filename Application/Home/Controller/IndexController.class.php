<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function index(){
        $user = $this->isLogin();
        $this->assign("user",$user);
        $this->display();
    }
    public function examlist(){
        $user = $this->isLogin();
        $list = D("Paper")->getUserPaperList($user['userId'], 1);
        $this->assign("list",$list);
        $this->assign("user",$user);
        $this->display();
    }
    public function success(){
        $user = $this->isLogin();
        $this->assign("user",$user);
        $this->display();
    }
    public function historylist(){
        $user = $this->isLogin();
        $uid = session("QuserId");
        $list = D("Paper")->getHistoryList($uid);
        $this->assign("list",$list);
        $this->assign("user",$user);
        $this->display();
    }

    public function historypaper($id){
        $user = $this->isLogin();
        $uid = session("QuserId");
        $paper = D("Paper")->getPaperById($id);
        $this->assign("paper",$paper);
        $this->assign("user",$user);
        $this->display();
    }

    public function enterExam($id){
        $status = D("Paper")->getStateById($id);
        if ($status == 0){
            D("Paper")->generalAnswer($id);

        }
        $this->redirect("Exam/index",array("id"=>$id));
    }

    

    //
    
    
}
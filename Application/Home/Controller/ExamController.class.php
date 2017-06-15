<?php
namespace Home\Controller;
use Think\Controller;
class ExamController extends BaseController {
    public function index($id){
        $user = $this->isLogin();
        $this->assign("paperid",$id);
        $this->assign("count",D("Paper")->getPrbNumById($id)+1);
        $this->assign("user",$user);
        $this->display();
    }

    public function getList(){
        $id = I("post.id");
        $this->ajaxReturn(D("Paper")->getPaperPrb($id));
    }

    public function getPaper(){
        $id = I("post.id");
        $this->ajaxReturn(D("Paper")->getPaperById($id));
    }

    public function getPrb(){
        $type = I("post.type");
        $id = I("post.id");
        $this->ajaxReturn(D("Problem")->getPrbByTypeAndId($type,$id));

    }

    //接受提交上来的答案并判卷
    public function submitPaper(){
        $answerlist = I("post.answerlist");
        $paperid = I("post.paperid");
        D("Paper")->checkPaper($answerlist,$paperid);
        $this->ajaxReturn(array("statu"=>1));
    }
    
}
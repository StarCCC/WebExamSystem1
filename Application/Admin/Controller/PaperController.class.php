<?php
namespace Admin\Controller;
use Think\Controller;
class PaperController extends BaseController {
    public function index($pageNum=1){
        $admin = $this->isLogin();

        $list = D("Paper")->getPaperPage();
        $this->assign("list",$list[$pageNum]);
        $this->assign("nowpage",$pageNum);
        $this->assign("total",count($list));
        $this->assign("admin",$admin);
        $this->assign("leftnum","a3");
        $this->display();
    }

    public function edit(){
        $admin = $this->isLogin();
        $this->assign("admin",$admin);
        $this->assign("leftnum","a3");
        $this->display();
    }

    //添加考卷的四种方式
    //直接添加试卷
    public function addPaper(){
        $data['cPapName'] = I("post.name");
        $data['iSubid'] = I("post.subid");
        $data['iTime'] = I("post.time");
        $data['iPapState'] = 0;
        $data['iSurTime'] = $data['iTime'];
        $data['iTestType'] = 1;
        D("Paper")->add($data);
        $this->redirect("Paper/index");
    }

    //从模版添加试卷
    public function addPaperFromTem(){
        
    }

    //直接添加模拟试卷
    public function addTestPaper(){
        
    }

    //从模版添加模拟试卷
    public function addTestPaperFromTem(){
        
    }

    //添加题目进试卷
    public function addPrb(){
        $papid = I("post.id");
        $num = D('Paper')->where(array("id"=>$papid))->select()[0]["iprbnum"];
        $num++;
        $totals = D('Paper')->where(array("id"=>$papid))->select()[0]["itotscore"];
        $data["iPapid"] = $papid;
        $data['iTypeid'] = I("post.typeid");
        $data['iPrbid'] = I("post.prbid");
        $data['iScore'] = I("post.score");
        $data['iPrbNo'] = $num;
        $totals = $totals + $data['iScore'];
        D('Paper')->where(array("id"=>$papid))->save(array("iPrbNum"=>$num,"iTotScore"=>$totals));
        M("Papproblem")->add($data);
        $this->redirect("Paper/index");
    }

    //分发试卷
    public function distribute(){
        $papid = I("post.id");
        $user = I("post.user");
        $userid = D("User")->getIdByName($user);
        if ($userid == null)
            $this->error("无此学生！");
        D('Paper')->where(array("id"=>$papid))->save(array("iUserid"=>$userid));
        $this->redirect("Paper/index");
    }
}
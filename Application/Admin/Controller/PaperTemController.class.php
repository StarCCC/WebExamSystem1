<?php
namespace Admin\Controller;
use Think\Controller;
class PaperTemController extends BaseController {

    public function index($pageNum = 1){
        $admin = $this->isLogin();

        $TP = new \Common\Model\PaptemplateModel();
        $list = $TP->getPapTemList($pageNum);
        $total = count($list);
        $sub = D("Problem")->getAllSubjects();
        $this->assign("subjects",$sub);
        $this->assign("list",$list);
        $this->assign("total",$total);
        $this->assign("nowpage",$pageNum);

        $this->assign("admin",$admin);
        $this->assign("leftnum","a2");
        $this->display();
    }

    public function edit($id){
        $admin = $this->isLogin();

        $TP = new \Common\Model\PaptemplateModel();
        $tem = $TP->getPapTemById($id);
        $list = $TP->getPapTemPrbById($id);
        $this->assign("template",$tem);
        $this->assign("list",$list);
        
        $this->assign("admin",$admin);
        $this->assign("leftnum","a2");
        $this->display();
    }

    public function delete($id){
        $TP = new \Common\Model\PaptemplateModel();
        $TP->deleteTem($id);
        $this->redirect("PaperTem/index");
    }

    public function addTem(){
        $TP = D("Paptemplate");
        $data["iSubid"] = I("post.subid");
        $data["cTemName"] = I("post.temname");
        $data["cRemarks"] = I("post.remark");
        $TP->add($data);
        $this->redirect("PaperTem/index");
    }

    public function addPrb($temid){
        $no = D("Paptemplate")->where(array("id"=>$temid))->select()[0][iPrbNum] + 1;
        $subscore = D("Paptemplate")->where(array("id"=>$temid))->select()[0][iTotScore];
        $data["iTemid"] = $temid;
        $data["iTypeid"] = I("post.typeid");
        $data["iChaid"] = I("post.chaid");
        $data["iScore"] = I("post.score");
        $num = I("post.num");
        
        for ($i = 0;$i < $num; $i++){
            $data["iPrbNo"] = $no;
            $no++;
            $subscore += $data["iScore"];
            M("Temproblem")->add($data);

        }
        D("Paptemplate")->where(array("id"=>$temid))->save(array("iPrbNum"=>$no - 1,"iTotScore"=>$subscore));
        $this->redirect("PaperTem/edit",array("id"=>$temid));
    }

    public function cleanPrb($temid){
        D("Paptemplate")->cleanTem($temid);
        $this->redirect("PaperTem/edit",array("id"=>$temid));
    }
}
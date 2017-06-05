<?php
namespace Admin\Controller;
use Think\Controller;
class PaperTemController extends BaseController {

    public function index($pageNum = 1){
        $admin = $this->isLogin();

        $TP = new \Common\Model\PaptemplateModel();
        $list = $TP->getPapTemList($pageNum);
        $this->assign("list",$list);

        $this->assign("admin",$admin);
        $this->assign("leftnum","a2");
        $this->display();
    }

    public function edit(){
        $admin = $this->isLogin();
        $this->assign("admin",$admin);
        $this->assign("leftnum","a2");
        $this->display();
    }
}
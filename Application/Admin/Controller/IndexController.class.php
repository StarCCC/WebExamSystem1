<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends BaseController {
    //总览页面，需要各题型题目数量和各个科目的模版数目
    public function index(){
        $admin = $this->isLogin();
        $count = $this->getProblemNum();

        $this->assign("subjects",$subjects);
        $this->assign("count",$count);
        $this->assign("admin",$admin);
        $this->assign("leftnum","a0");
        $this->display();
    }

    //从数据库中查询各个题型的题目数量
    public function getProblemNum(){
        $P = new \Common\Model\ProblemModel();
        $r[0] = 0;
        for ($i = 1; $i < 6; $i++){
            $r[$i] = $P->getCountByType($i);
            $r[0] += $r[$i];
        }
        return $r;
    }

    //从数据库中查询各科目的模版数目
    public function getTemNum(){
        //先不写
    }
}
<?php
namespace Admin\Controller;
use Think\Controller;
class TestController extends Controller {
    public function index(){
        $P = new \Common\Model\ProblemModel();
        $res = $P->getSelPrbById(5);
        $this->assign("title",$res['ttitle']);
        $this->display();
    }
}
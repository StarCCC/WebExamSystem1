<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends BaseController {
    public function index($pageNum = 1){
        $admin = $this->isLogin();
        $page = D("User")->getStudentsPage();
        $total = count($page);
        $this->assign("list",$page[$pageNum]);
        $this->assign("total",$total);
        $this->assign("nowpage",$pageNum);
        $this->assign("admin",$admin);
        $this->assign("leftnum","a4");
        $this->display();
    }

    //删除学生
    public function delete($id){
        D("User")->where(array("id"=>$id))->delete();
        $this->redirect("User/index");
    }

    //新增学生
    public function addUser(){
        $data['cUser'] = I("post.number");
        $data['cCode'] = "123";
        D("User")->add($data);
        $this->redirect("User/index");
    }
}
<?php
namespace Admin\Controller;
use Think\Controller;
class ProblemController extends BaseController {
    //页面
    public function select($pageNum = 1){
        $admin = $this->isLogin();
        $list = $this->getSelectPage($pageNum);
        $total = $this->getSelectPageTotalNum();
        $this->assign("list",$list);
        $this->assign("total",$total);
        $this->assign("nowpage",$pageNum);
        $this->assign("admin",$admin);
        $this->assign("leftnum","a1");
        $this->display();
    }
    public function selectedit($id,$op){
        $admin = $this->isLogin();
        $prb = $this->getSelectPrb($id,0);
        $this->assign("prb",$prb);
        $this->assign("op",$op);
        $this->assign("admin",$admin);
        $this->assign("leftnum","a1");
        $this->display();
    }
    public function selectadd(){
        $admin = $this->isLogin();
        $P = new \Common\Model\ProblemModel();
        $allsub = $P->getAllSubjects();
        $this->assign("subjects",$allsub);
        $this->assign("admin",$admin);
        $this->assign("leftnum","a1");
        $this->display();
    }
    public function blank($pageNum = 1){
        $admin = $this->isLogin();
        $list = $this->getBlankPage($pageNum);
        $total = $this->getBlankPageTotalNum();
        $this->assign("list",$list);
        $this->assign("total",$total);
        $this->assign("nowpage",$pageNum);
        $this->assign("admin",$admin);
        $this->assign("leftnum","a1");
        $this->display();
    }
    public function blankedit($id,$op){
        $admin = $this->isLogin();
        $prb = $this->getBlankPrb($id);
        $this->assign("prb",$prb);
        $this->assign("op",$op);
        $this->assign("admin",$admin);
        $this->assign("leftnum","a1");
        $this->display();
    }
    public function blankadd(){
        $admin = $this->isLogin();
        $P = new \Common\Model\ProblemModel();
        $allsub = $P->getAllSubjects();
        $this->assign("subjects",$allsub);
        $this->assign("admin",$admin);
        $this->assign("leftnum","a1");
        $this->display();
    }
    public function judge($pageNum = 1){
        $admin = $this->isLogin();
        $list = $this->getJudgePage($pageNum);
        $total = $this->getJudgePageTotalNum();
        $this->assign("list",$list);
        $this->assign("total",$total);
        $this->assign("nowpage",$pageNum);
        $this->assign("admin",$admin);
        $this->assign("leftnum","a1");
        $this->display();
    }
    public function judgeedit($id,$op){
        $admin = $this->isLogin();
        $prb = $this->getJudgePrb($id);
        $this->assign("prb",$prb);
        $this->assign("op",$op);
        $this->assign("admin",$admin);
        $this->assign("leftnum","a1");
        $this->display();
    }
    public function judgeadd(){
        $admin = $this->isLogin();
        $P = new \Common\Model\ProblemModel();
        $allsub = $P->getAllSubjects();
        $this->assign("subjects",$allsub);
        $this->assign("admin",$admin);
        $this->assign("leftnum","a1");
        $this->display();
    }
    public function readCode($pageNum = 1){
        $admin = $this->isLogin();
        $list = $this->getReadCPage($pageNum);
        $total = $this->getReadCPageTotalNum();
        $this->assign("list",$list);
        $this->assign("total",$total);
        $this->assign("nowpage",$pageNum);
        $this->assign("admin",$admin);
        $this->assign("leftnum","a1");
        $this->display();
    }
    public function readCodeadd(){
        $admin = $this->isLogin();
        $P = new \Common\Model\ProblemModel();
        $allsub = $P->getAllSubjects();
        $this->assign("subjects",$allsub);
        $this->assign("admin",$admin);
        $this->assign("leftnum","a1");
        $this->display();
    }
    public function readCodeedit($id,$op){
        $admin = $this->isLogin();
        $prb = $this->getReadCPrb($id);
        $this->assign("prb",$prb);
        $this->assign("op",$op);
        $this->assign("admin",$admin);
        $this->assign("leftnum","a1");
        $this->display();
    }
    public function code($pageNum = 1){
        $admin = $this->isLogin();
        $list = $this->getCodePage($pageNum);
        $total = $this->getCodePageTotalNum();
        $this->assign("list",$list);
        $this->assign("total",$total);
        $this->assign("nowpage",$pageNum);
        $this->assign("admin",$admin);
        $this->assign("leftnum","a1");
        $this->display();
    }
    public function codeadd(){
        $admin = $this->isLogin();
        $P = new \Common\Model\ProblemModel();
        $allsub = $P->getAllSubjects();
        $this->assign("subjects",$allsub);
        $this->assign("admin",$admin);
        $this->assign("leftnum","a1");
        $this->display();
    }
    public function codeedit($id,$op){
        $admin = $this->isLogin();
        $prb = $this->getCodePrb($id);
        $this->assign("prb",$prb);
        $this->assign("op",$op);
        $this->assign("admin",$admin);
        $this->assign("leftnum","a1");
        $this->display();
    }
    public function wCode($pageNum = 1){
        $admin = $this->isLogin();
        $list = $this->getWCodePage($pageNum);
        $total = $this->getWCodePageTotalNum();
        $this->assign("list",$list);
        $this->assign("total",$total);
        $this->assign("nowpage",$pageNum);
        $this->assign("admin",$admin);
        $this->assign("leftnum","a1");
        $this->display();
    }
    public function wCodeadd(){
        $admin = $this->isLogin();
        $P = new \Common\Model\ProblemModel();
        $allsub = $P->getAllSubjects();
        $this->assign("subjects",$allsub);
        $this->assign("admin",$admin);
        $this->assign("leftnum","a1");
        $this->display();
    }
    public function wCodeedit($id,$op){
        $admin = $this->isLogin();
        $prb = $this->getWCodePrb($id);
        $this->assign("prb",$prb);
        $this->assign("op",$op);
        $this->assign("admin",$admin);
        $this->assign("leftnum","a1");
        $this->display();
    }

    //选择题
    public function toRaw($i,$offset){
        return ($i-1) + $offset * 20;
    }
    public function getSelectPage($pageNum){
        $offset = $pageNum - 1;
        $P = new \Common\Model\ProblemModel();
        $list = $P->getSelectList();
        for ($i = 1;$i <= 20;$i++){
            if($list[$this->toRaw($i,$offset)] != null){
                $res[$i]['id'] = $list[$this->toRaw($i,$offset)]['id'];
                $res[$i]['subname'] = $list[$this->toRaw($i,$offset)]['subname'];
                $res[$i]['capname'] = $list[$this->toRaw($i,$offset)]['capname'];
                $res[$i]['ttitle'] = $list[$this->toRaw($i,$offset)]['ttitle'];
            }else{
                break;
            }
            
        }
        return $res;
    }
    public function getSelectPageTotalNum(){
        $P = new \Common\Model\ProblemModel();
        $t = $P->getCountByType(1);
        return intval($t / 20 + 1);
    }
    public function getSelectPrb($data,$col){
        $P = new \Common\Model\ProblemModel();
        switch($col) {
        case 0:
            $res = $P->getSelPrbById($data);
            break;
        case 1:
            $res = $P->getSelPrbById($data);
            break;
        }
        $res['subName'] = $P->getSubnameById($res['isubid']);
        $res['chaName'] = $P->getChanameById($res['ichaid']);
        return $res;
    }
    public function getAllChapter(){
        $P = new \Common\Model\ProblemModel();
        $res = $P->getAllChapters();
        $this->ajaxReturn($res,"JSON");
    }
    public function setSelect($id = 0){
        $P = new \Common\Model\ProblemModel();
        $data['iSubid'] = I('post.subid');
        $data['iChaid'] = I('post.chaid');
        $data['tTitle'] = formatStr(I('post.title'));
        //$data['tTitle'] = I('post.title');
        //$data['tTitle'] = nl2br(I('post.title'));
        $data['cItemA'] = I('post.itema');
        $data['cItemB'] = I('post.itemb');
        $data['cItemC'] = I('post.itemc');
        $data['cItemD'] = I('post.itemd');
        $data['iCorrect'] = I('post.correct');
        $data['cKey'] = I('post.key');
        if ($id == 0){
            $P->addPSelect($data);
        }else{
            $data['id'] = $id;
            $P->editPSelect($data);
        }
            
        //dump($data);
        //$this->display('test');
        $this->redirect('Problem/select');

    }
    public function delSelect($id){
        M('Pselect')->where(array('id'=>$id))->delete();
        $this->redirect('Problem/select');
    }

    //填空题
    public function getBlankPage($pageNum){
        $offset = $pageNum - 1;
        $P = new \Common\Model\ProblemModel();
        $list = $P->getBlankList();
        for ($i = 1;$i <= 20;$i++){
            if($list[$this->toRaw($i,$offset)] != null){
                $res[$i]['id'] = $list[$this->toRaw($i,$offset)]['id'];
                $res[$i]['subname'] = $list[$this->toRaw($i,$offset)]['subname'];
                $res[$i]['capname'] = $list[$this->toRaw($i,$offset)]['capname'];
                $res[$i]['ttitle'] = $list[$this->toRaw($i,$offset)]['ttitle'];
            }else{
                break;
            }
            
        }
        return $res;
    }
    public function getBlankPageTotalNum(){
        $P = new \Common\Model\ProblemModel();
        $t = $P->getCountByType(2);
        return intval($t / 20 + 1);
    }
    public function getBlankPrb($data){
        $P = new \Common\Model\ProblemModel();
        $res = $P->getBlaPrbById($data);
        $res['subName'] = $P->getSubnameById($res['isubid']);
        $res['chaName'] = $P->getChanameById($res['ichaid']);
        return $res;
    }
    public function setBlank($id = 0){
        $P = new \Common\Model\ProblemModel();
        $data['iSubid'] = I('post.subid');
        $data['iChaid'] = I('post.chaid');
        $data['tTitle'] = formatStr(I('post.title'));
        //$data['tTitle'] = I('post.title');
        //$data['tTitle'] = nl2br(I('post.title'));
        $data['cCorrect'] = I('post.correct');
        $data['cKey'] = I('post.key');
        if ($id == 0){
            $P->addPFillblank($data);
        }else{
            $data['id'] = $id;
            $P->editPFillblank($data);
        }
            
        //dump($data);
        //$this->display('test');
        $this->redirect('Problem/blank');

    }
    public function delBlank($id){
        M('Pfillblank')->where(array('id'=>$id))->delete();
        $this->redirect('Problem/blank');
    }

    //判断题
    public function getJudgePage($pageNum){
        $offset = $pageNum - 1;
        $P = new \Common\Model\ProblemModel();
        $list = $P->getJudgeList();
        for ($i = 1;$i <= 20;$i++){
            if($list[$this->toRaw($i,$offset)] != null){
                $res[$i]['id'] = $list[$this->toRaw($i,$offset)]['id'];
                $res[$i]['subname'] = $list[$this->toRaw($i,$offset)]['subname'];
                $res[$i]['capname'] = $list[$this->toRaw($i,$offset)]['capname'];
                $res[$i]['ttitle'] = $list[$this->toRaw($i,$offset)]['ttitle'];
            }else{
                break;
            }
            
        }
        return $res;
    }
    public function getJudgePageTotalNum(){
        $P = new \Common\Model\ProblemModel();
        $t = $P->getCountByType(3);
        return intval($t / 20 + 1);
    }
    public function getJudgePrb($data){
        $P = new \Common\Model\ProblemModel();
        $res = $P->getJudPrbById($data);
        $res['subName'] = $P->getSubnameById($res['isubid']);
        $res['chaName'] = $P->getChanameById($res['ichaid']);
        return $res;
    }
    public function setJudge($id = 0){
        $P = new \Common\Model\ProblemModel();
        $data['iSubid'] = I('post.subid');
        $data['iChaid'] = I('post.chaid');
        $data['tTitle'] = formatStr(I('post.title'));
        //$data['tTitle'] = I('post.title');
        //$data['tTitle'] = nl2br(I('post.title'));
        $data['bCorrect'] = I('post.correct');
        $data['cKey'] = I('post.key');
        if ($id == 0){
            $P->addPJudge($data);
        }else{
            $data['id'] = $id;
            $P->editPJudge($data);
        }
            
        //dump($data);
        //$this->display('test');
        $this->redirect('Problem/judge');

    }
    public function delJudge($id){
        M('Pjudge')->where(array('id'=>$id))->delete();
        $this->redirect('Problem/judge');
    }

    //程序阅读题
    public function getReadCPage($pageNum){
        $offset = $pageNum - 1;
        $P = new \Common\Model\ProblemModel();
        $list = $P->getReadCList();
        for ($i = 1;$i <= 20;$i++){
            if($list[$this->toRaw($i,$offset)] != null){
                $res[$i]['id'] = $list[$this->toRaw($i,$offset)]['id'];
                $res[$i]['subname'] = $list[$this->toRaw($i,$offset)]['subname'];
                $res[$i]['capname'] = $list[$this->toRaw($i,$offset)]['capname'];
                $res[$i]['ttitle'] = $list[$this->toRaw($i,$offset)]['ttitle'];
            }else{
                break;
            }
            
        }
        return $res;
    }
    public function getReadCPageTotalNum(){
        $P = new \Common\Model\ProblemModel();
        $t = $P->getCountByType(4);
        return intval($t / 20 + 1);
    }
    public function getReadCPrb($data){
        $P = new \Common\Model\ProblemModel();
        $res = $P->getReaPrbById($data);
        $res['subName'] = $P->getSubnameById($res['isubid']);
        $res['chaName'] = $P->getChanameById($res['ichaid']);
        return $res;
    }
    public function setReadC($id = 0){
        $P = new \Common\Model\ProblemModel();
        $data['iSubid'] = I('post.subid');
        $data['iChaid'] = I('post.chaid');
        $data['tTitle'] = formatStr(I('post.title'));
        //$data['tTitle'] = I('post.title');
        //$data['tTitle'] = nl2br(I('post.title'));
        $data['cCorrect'] = I('post.correct');
        $data['cKey'] = I('post.key');
        if ($id == 0){
            $P->addPReadCode($data);
        }else{
            $data['id'] = $id;
            $P->editPReadCode($data);
        }
            
        //dump($data);
        //$this->display('test');
        $this->redirect('Problem/readCode');

    }
    public function delReadC($id){
        M('Preadcode')->where(array('id'=>$id))->delete();
        $this->redirect('Problem/readCode');
    }

    //补全程序题
    public function getCodePage($pageNum){
        $offset = $pageNum - 1;
        $P = new \Common\Model\ProblemModel();
        $list = $P->getCodeList();
        for ($i = 1;$i <= 20;$i++){
            if($list[$this->toRaw($i,$offset)] != null){
                $res[$i]['id'] = $list[$this->toRaw($i,$offset)]['id'];
                $res[$i]['subname'] = $list[$this->toRaw($i,$offset)]['subname'];
                $res[$i]['capname'] = $list[$this->toRaw($i,$offset)]['capname'];
                $res[$i]['ttitle'] = $list[$this->toRaw($i,$offset)]['ttitle'];
            }else{
                break;
            }
            
        }
        return $res;
    }
    public function getCodePageTotalNum(){
        $P = new \Common\Model\ProblemModel();
        $t = $P->getCountByType(5);
        return intval($t / 20 + 1);
    }
    public function getCodePrb($data){
        $P = new \Common\Model\ProblemModel();
        $res = $P->getCodPrbById($data);
        $res['subName'] = $P->getSubnameById($res['isubid']);
        $res['chaName'] = $P->getChanameById($res['ichaid']);
        return $res;
    }
    public function setCode($id = 0){
        $P = new \Common\Model\ProblemModel();
        $data['iSubid'] = I('post.subid');
        $data['iChaid'] = I('post.chaid');
        $data['tTitle'] = formatStr(I('post.title'));
        //$data['tTitle'] = I('post.title');
        //$data['tTitle'] = nl2br(I('post.title'));
        $data['cCorrect1'] = I('post.correct1');
        $data['cCorrect2'] = I('post.correct2');
        $data['cKey'] = I('post.key');
        if ($id == 0){
            $P->addPCode($data);
        }else{
            $data['id'] = $id;
            $P->editPCode($data);
        }
        
        //dump($data);
        //$this->display('test');
        $this->redirect('Problem/code');

    }
    public function delCode($id){
        M('Pcode')->where(array('id'=>$id))->delete();
        $this->redirect('Problem/code');
    }

    //编写程序题
    public function getWCodePage($pageNum){
        $offset = $pageNum - 1;
        $P = new \Common\Model\ProblemModel();
        $list = $P->getWCodeList();
        for ($i = 1;$i <= 20;$i++){
            if($list[$this->toRaw($i,$offset)] != null){
                $res[$i]['id'] = $list[$this->toRaw($i,$offset)]['id'];
                $res[$i]['subname'] = $list[$this->toRaw($i,$offset)]['subname'];
                $res[$i]['capname'] = $list[$this->toRaw($i,$offset)]['capname'];
                $res[$i]['ttitle'] = $list[$this->toRaw($i,$offset)]['ttitle'];
            }else{
                break;
            }
            
        }
        return $res;
    }
    public function getWCodePageTotalNum(){
        $P = new \Common\Model\ProblemModel();
        $t = $P->getCountByType(6);
        return intval($t / 20 + 1);
    }
    public function getWCodePrb($data){
        $P = new \Common\Model\ProblemModel();
        $res = $P->getWCodPrbById($data);
        $res['subName'] = $P->getSubnameById($res['isubid']);
        $res['chaName'] = $P->getChanameById($res['ichaid']);
        return $res;
    }
    public function setWCode($id = 0){
        $P = new \Common\Model\ProblemModel();
        $data['iSubid'] = I('post.subid');
        $data['iChaid'] = I('post.chaid');
        $data['tTitle'] = formatStr(I('post.title'));
        //$data['tTitle'] = I('post.title');
        //$data['tTitle'] = nl2br(I('post.title'));
        $data['cCorrect'] = I('post.correct');
        $data['cKey'] = I('post.key');
        if ($id == 0){
            $P->addPWCode($data);
        }else{
            $data['id'] = $id;
            $P->editPWCode($data);
        }
            
        //dump($data);
        //$this->display('test');
        $this->redirect('Problem/wCode');

    }
    public function delWCode($id){
        M('Pcode')->where(array('id'=>$id))->delete();
        $this->redirect('Problem/wCode');
    }
}
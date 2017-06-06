<?php
namespace Common\Model;
use Think\Model;
class ProblemModel {
    //下面是简单的新增和更新记录
    public function addPSelect($data) {
        $PSelect = M('Pselect');
        $PSelect->add($data);
    }
    public function editPSelect($data) {
        $PSelect = M('Pselect');
        $PSelect->save($data);
    }

    public function addPFillblank($data) {
        $PFill = M('Pfillblank');
        $PFill->add($data);
    }
    public function editPFillblank($data) {
        $PFill = M('Pfillblank');
        $PFill->save($data);
    }

    public function addPJudge($data) {
        $PJudge = M('Pjudge');
        $PJudge->add($data);
    }
    public function editPJudge($data) {
        $PJudge = M('Pjudge');
        $PJudge->save($data);
    }

    public function addPReadCode($data) {
        $PReadCode = M('Preadcode');
        $PReadCode->add($data);
    }
    public function editPReadCode($data) {
        $PReadCode = M('Preadcode');
        $PReadCode->save($data);
    }

    public function addPCode($data) {
        $PCode = M('Pcode');
        $PCode->add($data);
    }
    public function editPCode($data) {
        $PCode = M('Pcode');
        $PCode->save($data);
    }
    public function addPWCode($data) {
        $PCode = M('Pwcode');
        $PCode->add($data);
    }
    public function editPWCode($data) {
        $PCode = M('Pwcode');
        $PCode->save($data);
    }

    //下面是业务逻辑
    
    //查找某题型题目数量
    public function getCountByType($type){
        $PSelect = M('Pselect');
        $PFill = M('Pfillblank');
        $PJudge = M('Pjudge');
        $PReadCode = M('Preadcode');
        $PCode = M('Pcode');
        $PWCode = M('Pwcode');
        switch($type) {
        case 1:
            $res = $PSelect->select();
            break;
        case 2:
            $res = $PFill->select();
            break;
        case 3:
            $res = $PJudge->select();
            break;
        case 4:
            $res = $PReadCode->select();
            break;
        case 5:
            $res = $PCode->select();
            break;
        case 6:
            $res = $PWCode->select();
            break;
        default:
            $res = null;
            break;
        }
        return count($res);
    }

    //联表查询选择题列表信息
    public function getSelectList(){
        $Model = new \Think\Model();
        $res = $Model->query("select a.id,b.cName as subName,c.cName as capName,a.tTitle from ex_pselect as a,ex_subject as b, ex_chapter as c where a.iSubid = b.id and a.iChaid = c.id;");
        return $res;
    }

    //联表查询填空题列表信息
    public function getBlankList(){
        $Model = new \Think\Model();
        $res = $Model->query("select a.id,b.cName as subName,c.cName as capName,a.tTitle from ex_pfillblank as a,ex_subject as b, ex_chapter as c where a.iSubid = b.id and a.iChaid = c.id;");
        return $res;
    }

    //联表查询判断题列表信息
    public function getJudgeList(){
        $Model = new \Think\Model();
        $res = $Model->query("select a.id,b.cName as subName,c.cName as capName,a.tTitle from ex_pjudge as a,ex_subject as b, ex_chapter as c where a.iSubid = b.id and a.iChaid = c.id;");
        return $res;
    }

    //联表查询阅读程序题列表信息
    public function getReadCList(){
        $Model = new \Think\Model();
        $res = $Model->query("select a.id,b.cName as subName,c.cName as capName,a.tTitle from ex_preadcode as a,ex_subject as b, ex_chapter as c where a.iSubid = b.id and a.iChaid = c.id;");
        return $res;
    }

    //联表查询代码补全题列表信息
    public function getCodeList(){
        $Model = new \Think\Model();
        $res = $Model->query("select a.id,b.cName as subName,c.cName as capName,a.tTitle from ex_pcode as a,ex_subject as b, ex_chapter as c where a.iSubid = b.id and a.iChaid = c.id;");
        return $res;
    }

    //联表查询判断题列表信息
    public function getWCodeList(){
        $Model = new \Think\Model();
        $res = $Model->query("select a.id,b.cName as subName,c.cName as capName,a.tTitle from ex_pwcode as a,ex_subject as b, ex_chapter as c where a.iSubid = b.id and a.iChaid = c.id;");
        return $res;
    }

    //根据id查询选择题
    public function getSelPrbById($id){
        $res = M('Pselect')->where(array('id'=>$id))->select();
        if (!empty($res)) {
            return $res[0];
        }
    }
    //根据id查询填空题
    public function getBlaPrbById($id){
        $res = M('Pfillblank')->where(array('id'=>$id))->select();
        if (!empty($res)) {
            return $res[0];
        }
    }
    //根据id查询判断题
    public function getJudPrbById($id){
        $res = M('Pjudge')->where(array('id'=>$id))->select();
        if (!empty($res)) {
            return $res[0];
        }
    }
    //根据id查询判阅读程序题
    public function getReaPrbById($id){
        $res = M('Preadcode')->where(array('id'=>$id))->select();
        if (!empty($res)) {
            return $res[0];
        }
    }
    //根据id查询补全代码题
    public function getCodPrbById($id){
        $res = M('Pcode')->where(array('id'=>$id))->select();
        if (!empty($res)) {
            return $res[0];
        }
    }
    //根据id查询编写程序题
    public function getWCodPrbById($id){
        $res = M('Pwcode')->where(array('id'=>$id))->select();
        if (!empty($res)) {
            return $res[0];
        }
    }
    //根据id查询科目
    public function getSubnameById($id){
        $res = M('Subject')->where(array('id'=>$id))->select();
        if (!empty($res)) {
            return $res[0][cname];
        }
    }
    //根据id查询章节
    public function getChanameById($id){
        $res = M('Chapter')->where(array('id'=>$id))->select();
        if (!empty($res)) {
            return $res[0][cname];
        }
    }
    //根据id查询题型
    public function getTypnameById($id){
        $res = M('Prbtype')->where(array('id'=>$id))->select();
        if (!empty($res)) {
            return $res[0][cname];
        }
    }
    //返回所有科目
    public function getAllSubjects(){
        $res = M('Subject')->select();
        if (!empty($res)) {
            return $res;
        }
    }
    //返回所有章节
    public function getAllChapters(){
        $res = M('Chapter')->select();
        if (!empty($res)) {
            return $res;
        }
    }
    //返回所有类型
    public function getAllTypes(){
        $res = M('Prbtype')->select();
        if (!empty($res)) {
            return $res;
        }
    }
    //根据科目id查找章节
    public function getAllChaptersBySubid($subid){
        $res = M('Chapter')->where(array("iSubid"=>$subid))->select();
        if (!empty($res)) {
            return $res;
        }
    }
}
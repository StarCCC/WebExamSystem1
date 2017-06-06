<?php
    namespace Common\Model;
    use Think\Model;
    class PaptemplateModel extends BaseModel {

        //获取试卷模版列表
        public function getPapTemList($pagenum){
            $res = $this->select();
            foreach($res as $key=>$vo){
                $res[$key]['subname'] = M("Subject")->where(array('id'=>$vo['isubid']))->select()[0]['cname'];
            }
            $page = $this->paging($res,20);
            return $page[$pagenum];
        }

        //删除模版
        public function deleteTem($id){
            $this->where(array("id"=>$id))->delete();
            M("Temproblem")->where(array("iTemid"=>$id))->delete();
        }

        //清空模版
        public function cleanTem($id){
            $this->where(array("id"=>$id))->save(array("iPrbNum"=>0,"iTotScore"=>0));
            M("Temproblem")->where(array("iTemid"=>$id))->delete();
        }

        //根据id查找模版
        public function getPapTemById($id){
            $res = $this->where(array("id"=>$id))->select();
            if (!empty($res)){
                return $res[0];
            }
        }

        //根据模版id查找模版题目
        public function getPapTemPrbById($temid){
            $res = M("Temproblem")->where(array("iTemid"=>$temid))->select();
            foreach($res as $key=>$vo){
                $res[$key]['chaname'] = D("Problem")->getChanameById($vo["ichaid"]);
                $res[$key]['typename'] = D("Problem")->getTypnameById($vo["itypeid"]);
            }
            if (!empty($res)){
                return $res;
            }
        }
    }
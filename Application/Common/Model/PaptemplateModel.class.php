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

        //根据id查找模版
        public function getPapTemById($id){
            $res = $this->where(array("id"=>$id))->select();
            if (!empty($res)){
                return $res[0];
            }
        }
    }
<?php
    namespace Common\Model;
    use Think\Model;
    class PaperModel extends BaseModel {
        //获取试卷列表（带分页）
        public function getPaperPage(){
            $res = $this->select();
            foreach($res as $key=>$vo){
                if ($vo['iuserid'] == 0)
                    $res[$key]['username'] = "全部";
                else
                    $res[$key]['username'] = M("User")->where(array("id"=>$vo['iuserid']))->select()[0]['cname'];
                $res[$key]['subname'] = D("Problem")->getSubnameById($vo['isubid']);
            }
            $page = $this->paging($res, 15);
            return $page;
        }
    }
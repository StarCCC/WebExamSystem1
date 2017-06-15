<?php
    namespace Common\Model;
    use Think\Model;
    class UserModel extends BaseModel {

        //根据id获取用户名,无用户返回null
        public function getNameById($id){
            $map['id'] = $id;
            $res = $this->where($map)->select();
            //dump($res);
            if (!empty($res)) {
                return $res[0]['cuser'];
            }
                
        }

        //根据用户名获取id，无用户返回null
        public function getIdByName($name){
            $map['cUser'] = $name;
            $res = $this->where($map)->select();
            if (!empty($res)) {
                return $res[0]['id'];
            }
        }

        //根据用户名获取密码，无用户返回null
        public function getPwdByName($name){
            $map['cUser'] = $name;
            $res = $this->where($map)->select();
            if (!empty($res)) {
                return $res[0]['ccode'];
            }
        }

        //根据用户名获取用户权限，无用户返回null
        public function getAuthByName($name){
            $map['cUser'] = $name;
            $res = $this->where($map)->select();
            //dump($res);
            if (!empty($res)) {
                return $res[0]['bmanager'];
            }
        }

        //获取学生分页（除去管理员）
        public function getStudentsPage(){
            $res = $this->where(array("bManager"=>0))->select();
            return $this->paging($res,15);
        }
    }
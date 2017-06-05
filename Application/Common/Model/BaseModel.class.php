<?php
    namespace Common\Model;
    use Think\Model;
    class BaseModel extends Model {
        /**
         * 通用的编辑方法
         * $map为查询条件
         * $data为要修改字段的值
         */
        public function editData($map,$data){
            if ($map == null || $data == null) {
                return false;
            } 
            $this->where($map)->save($data);
            return true;
        }

        /**
         * 通用的删除方法
         * $map为查询条件,为all时删除全部记录
         */
        public function deleteData($map) {
            if ($map == null) {
                return false;
            }
            if ($map == "all") {
                $this->where('1')->delete();
            } else {
                $this->where($map)->delete();
            }
            return true;
        }

        /**
         * 通用的分页方法
         * $list为待分页数据，$num为每页记录数目
         */
        public function paging($list, $num){
            $i = 1;
            foreach($list as $k1 => $row){
                foreach($row as $key => $col){
                    $page[ceil($i / $num)][$k1][$key] = $list[$k1][$key];
                }
                $i++;
            }   
            return $page; 
        }
    }
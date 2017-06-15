<?php
    namespace Common\Model;
    use Think\Model;
    class PaperModel extends BaseModel {
        //获取试卷列表（带分页）
        public function getPaperPage(){
            $res = $this->select();
            foreach($res as $key=>$vo){
                if ($vo['iuserid'] == 0)
                    $res[$key]['username'] = "无";
                else
                    $res[$key]['username'] = M("User")->where(array("id"=>$vo['iuserid']))->select()[0]['cuser'];
                $res[$key]['subname'] = D("Problem")->getSubnameById($vo['isubid']);
            }
            $page = $this->paging($res, 15);
            return $page;
        }

        //获取用户试卷列表（不分页）
        //userid 用户id  mod考试模式 模拟0  考试1
        public function getUserPaperList($userid, $mod){
            $res = $this->where(array("iUserid"=>$userid, "iTestType"=>$mod, "iPapState"=>array("NEQ",2)))->select();
            if (!empty($res)) {
                return $res;
            }
        }

        //根据id获取试卷状态
        public function getStateById($id){
            $s = $this->where(array("id"=>$id))->select()[0]['ipapstate'];
            return $s;
        }

        //根据id获取试卷题目数量
        public function getPrbNumById($id){
            $s = $this->where(array("id"=>$id))->select()[0]['iprbnum'];
            return $s;
        }

        //根据id获取试卷
        public function getPaperById($id){
            $res = $this->where(array("id"=>$id))->select()[0];
            if (!empty($res)) {
                return $res;
            }
        }

        //根据试卷id生成答案记录
        public function generalAnswer($id){
            $Prblist = M("Papproblem")->where(array("iPapid"=>$id))->select();
            foreach ($prblist as $prb){
                unset($data);
                switch($vo['itypeid']){
                    case 1:
                    $A = M("Selanswer");
                    break;
                    case 2:
                    $A = M("Filanswer");
                    break;
                    case 3:
                    $A = M("Judanswer");
                    break;
                    case 4:
                    $A = M("Codanswer");
                    break;
                    case 5:
                    $A = M("Reaanswer");
                    break;
                    case 6:
                    $A = M("Wcoanswer");
                    break;

                }
                $data['iProblemid'] = $vo['id'];
                $A->add($data);
            }
        }

        //根据答案列表判卷(临时)
        public function checkPaper($answerlist,$id){
            //首先设置好试卷更新信息
            $paper['iScore'] = 0;
            $paper['iWroNum'] = 0;
            $paper['iPapState'] = 2;
            $paper['dTesDate'] = date("Y-m-d");
            //遍历答案列表
            foreach ($answerlist as $ans){
                //按照类型分开判卷
                if($ans['type'] == 1){
                    $selp = D("Problem")->getSelPrbById($ans['prbid']);//获取题目
                    $s = M("Papproblem")->where(array("id"=>$ans['pid']))->select()[0]["iscore"];
                    if ($selp["icorrect"] == $ans['answer'])
                        $paper['iScore'] += $s;
                    else
                        $paper['iWroNum']++;
                }else if ($ans['type'] == 2){
                    $filp = D("Problem")->getBlaPrbById($ans['prbid']);//获取题目
                    $s = M("Papproblem")->where(array("id"=>$ans['pid']))->select()[0]["iscore"];
                    if ($filp["ccorrect"] == $ans['answer'])
                        $paper['iScore'] += $s;
                    else
                        $paper['iWroNum']++;
                }else if ($ans['type'] == 3){
                    $judp = D("Problem")->getJudPrbById($ans['prbid']);//获取题目
                    $s = M("Papproblem")->where(array("id"=>$ans['pid']))->select()[0]["iscore"];
                    if ($judp["bcorrect"] == $ans['answer'])
                        $paper['iScore'] += $s;
                    else
                        $paper['iWroNum']++;
                }else if ($ans['type'] == 4){
                    $reap = D("Problem")->getReaPrbById($ans['prbid']);//获取题目
                    $s = M("Papproblem")->where(array("id"=>$ans['pid']))->select()[0]["iscore"];
                    if ($reap["ccorrect"] == $ans['answer'])
                        $paper['iScore'] += $s;
                    else
                        $paper['iWroNum']++;
                }else if ($ans['type'] == 5){
                    $codp = D("Problem")->getCodPrbById($ans['prbid']);//获取题目
                    $s = M("Papproblem")->where(array("id"=>$ans['pid']))->select()[0]["iscore"];
                    if ($codp["ccorrect1"] == $ans['answer'] && $codp["ccorrect2"] == $ans['answer2'] )
                        $paper['iScore'] += $s;
                    else
                        $paper['iWroNum']++;
                }else{
                    $wcop = D("Problem")->getWCodPrbById($ans['prbid']);//获取题目
                    $s = M("Papproblem")->where(array("id"=>$ans['pid']))->select()[0]["iscore"];
                    if ($wcop["ccorrect"] == $ans['answer'])
                        $paper['iScore'] += $s;
                    else
                        $paper['iWroNum']++;
                }
            }
            //更新试卷信息
            $this->where(array("id"=>$id))->save($paper);
        }

        //获取历史试卷列表
        public function getHistoryList($uid){
            $res = $this->where(array("iUserid"=>$uid,"iPapState"=>2))->select();
            if (!empty($res)) {
                return $res;
            }
        }

        //生成试卷题目数据
        public function getPaperPrb($id){
            $num = $this->getPrbNumById($id);
            $res = M("Papproblem")->where(array("iPapid"=>$id))->select();
            for ($i = 1; $i <= $num; $i++) {
                foreach($res as $vo) {
                    if($vo['iprbno'] == $i) {
                        $list[$i]['type'] = $vo['itypeid'];
                        $list[$i]['prbid'] = $vo['iprbid'];
                        $list[$i]['pid'] = $vo['id'];
                        $list[$i]['iswrite'] = 0;
                        $list[$i]['answer'] = null;
                        if ($vo['itypeid'] == 5){
                            $list[$i]['answer2'] = null;
                        }
                        break;
                    }
                }
            }
            return $list;
        }
    }
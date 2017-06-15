<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>模拟考试系统</title>

    <!-- Bootstrap -->
    <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
    <link rel="stylesheet" type="text/css" href="/WebExamSystem1/Public/bootstrap-3.3.7-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/WebExamSystem1/Public/css/Admin/public.css" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <link rel="stylesheet" href="/WebExamSystem1/Public/css/Home/exampage.css">
    <div class="container-fluid" style="padding-right: 0px;padding-left: 0px;">
        <div class="raw navbar-fixed-top">
            <div class="col-md-12 header">
                <div class="container">
                    <div class="raw">
                        <div class="col-md-12">
                            <table>
                                <tr>
                                    <td><img height="85" src="/WebExamSystem1/Public/img/Home/logo1.png" alt="logo" /></td>
                                    <td>
                                        <div class="bb">
                                            <table>
                                                <tr>
                                                    <td style="width:60px;padding-right:10px;"><img src="/WebExamSystem1/Public/img/Home/timer.png" alt="logo" /></td>
                                                    <td style="width:100px;border-right:1px solid white;">
                                                        <p class="f16" style="color:#00a084;">剩余时间</p>
                                                        <p class="f16" id="stime" style="font-family:'黑体';">00:00</p>
                                                    </td>
                                                    <td style="width:100px;padding-left:20px;padding-right:20px;">
                                                        <div class="pp">
                                                            <p class="f16">第<span class="prbno" id="prbno" style="color:red;"></span>题</p>
                                                            <p class="f16">共<span class="prbs" style="color:red;"></span>题</p>
                                                            <p class="f16">剩<span id="prbr" style="color:red;"></span>题</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                            
                                        </div>
                                    </td>
                                    <td style="padding-left:200px;"><p class="f16"><?php echo ($user['welcome']); ?></p></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="raw">
            <div class="col-md-12 body">
                <div class="container">
                    <div class="raw">
                        <div class="col-md-12">
                            <table style="width:1140px;height:200px;margin-top:170px;border:1px solid #d6d6d6;">
                                <tr style="">
                                    <td class="title">
                                        <p id="papert">试卷标题</p><p id="paperid" style="display:none"><?php echo ($paperid); ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        
                                        <div class="panel panel-default" style="margin:20px 200px;">
                                            <p style="position:absolute;top:253px;left:240px;color:#666666">试卷信息</p>
                                            <div class="panel-body" >
                                                <div style="display:block;margin:20px 0px;">
                                                <span class="f16" id="ptime" style="margin-right:150px;">考试时间:</span>
                                                <span class="f16" id="pscore" style="margin-right:150px;">总分:</span>
                                                <span class="f16" id="prbs">总题数:</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="margin:0px 20px">
                                            <div class="pt" id="prbtype" ></div>
                                            <div class="pn">第<span class="prbno" style="color:red"></span>题</div>
                                            <div style="display:block;padding:10px 0px;">
                                                <div class="ptt"></div>
                                            </div>
                                            <div id="sel" style="display:none;padding:10px 10px;margin:0px 20px;">
                                                <div class="sel-item radio"><input type="radio" name="selr" value="0"/><span id="itema"></span></div>
                                                <div class="sel-item radio"><input type="radio" name="selr" value="1"/><span id="itemb"></span></div>
                                                <div class="sel-item radio"><input type="radio" name="selr" value="2"/><span id="itemc"></span></div>
                                                <div class="sel-item radio"><input type="radio" name="selr" value="3"/><span id="itemd"></span></div>
                                            </div>
                                            <div id="jud" style="display:none;padding:10px 10px;margin:0px 20px;">
                                                <div class="sel-item radio"><input type="radio" name="judr" value="1"/><span id="dui">✔</span></div>
                                                <div class="sel-item radio"><input type="radio" name="judr" value="0"/><span id="cuo">✖</span></div>
                                            </div>
                                            <div id="cod" style="display:none;padding:10px 10px;">
                                                <div class="bl">答案1:<input type="text" class="form-control ans1"  /></div>
                                                <div class="bl">答案2:<input type="text" class="form-control ans2" /></div>
                                            </div>
                                            <div id="fil" style="display:none;padding:10px 10px;">
                                                <div class="bl">答案:<input type="text" class="form-control ans" /></div>
                                            </div>
                                            <div style="display:block;padding:10px 10px;">
                                                <button class="btn btn-primary pull-right" onclick="getAnswer($('#prbno').text());">确认作答</button>
                                            </div>
                                            <ul class="pagination">
                                                <li><a href="javascrip:void(0);"  onclick="lastPrb();">上一题</a></li>
                                                <?php $__FOR_START_24785__=1;$__FOR_END_24785__=$count;for($i=$__FOR_START_24785__;$i < $__FOR_END_24785__;$i+=1){ ?><li id="pp<?php echo ($i); ?>"><a href="javascrip:void(0);"  onclick="showPrbInfo(<?php echo ($i); ?>);"><?php echo ($i); ?></a></li><?php } ?>
                                                <li><a href="javascrip:void(0);" onclick="nextPrb();">下一题</a></li>
                                            </ul>
                                            <div style="display:block;padding:10px 10px;height:8px;background:url(/WebExamSystem1/Public/img/Home/line.png) repeat-x;"></div>
                                            <div style="display:block;padding:40px 10px;text-align:center;">
                                                <button class="btn btn-warning btn-lg" onclick="submitPaper();" ><span class="glyphicon glyphicon-ok"></span>&nbsp我要交卷</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container-fluid" style="padding-right: 0px;padding-left: 0px;">
    <div class="raw">
        <div class="container">
            <div class="raw">
                <div class="col-md-12" style="text-align:center;color:#7c7c7c;">
                    <p id="sdate" style="font-size:18px;line-height:18px;margin:10px 0px;"></p>
                    <p style="font-size:18px;line-height:18px;margin:10px 0px;">刘禹鹏 版权所有</p>
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>-->
    <script type="text/javascript" src="/WebExamSystem1/Public/jquery-3.1.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!--<script src="js/bootstrap.min.js"></script>-->
    <script type="text/javascript" src="/WebExamSystem1/Public/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <!--在这里引入angularjs框架-->
    <script type="text/javascript" src="/WebExamSystem1/Public/angular-1.6.2/angular.min.js"></script>
    <!--在这里引入公共js文件-->
    <script type="text/javascript" src="/WebExamSystem1/Public/js/Admin/public.js"></script>

    
    <script src="/WebExamSystem1/Public/js/Home/exam.js"></script>


    </body>
</html>
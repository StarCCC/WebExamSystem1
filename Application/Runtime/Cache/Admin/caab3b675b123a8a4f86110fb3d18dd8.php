<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>模拟考试系统后台</title>

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
    
    <span class="nowpage" style="display:none;">1</span>
    <nav class="navbar navbar-inverse navbar-fixed-top" >
    <div class="container-fluid" >
        <div class="navbar-header" style="width:100%;">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">模拟考试系统后台</a>
            <a class="navbar-brand pull-right" href="#"><?php echo ((isset($admin['welcome'] ) && ($admin['welcome'] !== ""))?($admin['welcome'] ):"对不起，请先登陆！"); ?></a>
        </div>  
    </div>
</nav>
    <div class="container-fluid" style="padding-top:71px;">
        <div class="row">
            <div class="col-md-2 sidebar   ">
                <span id="leftnum" style="display:none;"><?php echo ($leftnum); ?></span>
<ul class="nav nav-sidebar">
    <li id="a0"><a href="<?php echo U('Index/index');?>">题库总览</a></li>
    <li id="a1"><a href="<?php echo U('Problem/select');?>" >题目管理</a></li>
    <li id="a2"><a href="<?php echo U('PaperTem/index');?>" >试卷模版</a></li>
    <li id="a3"><a href="<?php echo U('Paper/index');?>"  >试卷管理</a></li>
    <li id="a4"><a href="<?php echo U('User/index');?>"  >用户管理</a></li>
    <!--<li id="a5"><a href="<?php echo U('Test/index');?>"  >测试页面</a></li>-->
</ul>
            </div>
            <div class="col-md-10 col-md-offset-2 main">
                <div class="container">
                    <div class="raw">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="<?php echo U("Problem/select");?>">选择题</a></li>
                            <li><a href="<?php echo U("Problem/blank");?>">填空题</a></li>
                            <li><a href="<?php echo U("Problem/judge");?>">判断题</a></li>
                            <li><a href="<?php echo U("Problem/readCode");?>">程序阅读题</a></li>
                            <li><a href="<?php echo U("Problem/code");?>">代码补全题</a></li>
                            <li><a href="<?php echo U("Problem/wCode");?>">编写程序题</a></li>
                        </ul>
                    </div>
                    <div class="blank" style="height:30px;" ></div>
                    <div class="raw">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        新增
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form" id="thisform" action="<?php echo U('Problem/setSelect');?>" method="POST">
                                        <div class="form-group">
                                            <label for="subid" class="col-md-2 control-label">科目</label>
                                            <div class="col-md-10">
                                            <select class="form-control sel-subject" name="subid" id="subid" onchange="setChapter($('select.sel-subject'));">
                                                <?php if(is_array($subjects)): foreach($subjects as $key=>$subject): ?><option value="<?php echo ($subject['id']); ?>" ><?php echo ($subject['cname']); ?></option><?php endforeach; endif; ?>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="chaid" class="col-md-2 control-label">章节</label>
                                            <div class="col-md-10">
                                            <select class="form-control sel-chapter" name="chaid" id="chaid">
                                                <option>请输入科目</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">题目</label>
                                            <div class="col-md-10">
                                            <textarea  name="title" cols="75" rows="4" placeholder="请输入题目..." wrap="hard"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">选项A</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="itema" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">选项B</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="itemb" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">选项C</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="itemc" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">选项D</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="itemd" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                                <label class="col-md-2 control-label">正确答案</label>
                                                <div class="col-md-10">
                                                    <select class="form-control" name="correct">
                                                        <option value="0">选项A</option>
                                                        <option value="1">选项B</option>
                                                        <option value="2">选项C</option>
                                                        <option value="3">选项D</option>
                                                    </select>
                                                </div>
                                            </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">解析</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="key" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="raw">
                            <div class="col-md-8 col-md-offset-2">
                                <button type="submit" class="btn btn-warning" form="thisform">确定</button>
                                <button type="button" class="btn btn-warning" onclick="location.href='<?php echo U("Problem/select");?>'">返回</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div> <!-- /container -->




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

    
    <script type="text/javascript" src="/WebExamSystem1/Public/js/Admin/Problem/add-edit.js"></script>

    </body>
</html>
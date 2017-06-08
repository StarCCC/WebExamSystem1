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
                            <li><a href="<?php echo U("Problem/select");?>">选择题</a></li>
                            <li><a href="<?php echo U("Problem/blank");?>">填空题</a></li>
                            <li class="active"><a href="<?php echo U("Problem/judge");?>">判断题</a></li>
                            <li><a href="<?php echo U("Problem/readCode");?>">程序阅读题</a></li>
                            <li><a href="<?php echo U("Problem/code");?>">代码补全题</a></li>
                            <li><a href="<?php echo U("Problem/wCode");?>">编写程序题</a></li>
                        </ul>
                    </div>
                    <div class="blank" style="height:30px;" ></div>
                    <div class="raw">
                        <div class="col-md-4 no-padding">
                            <form class="bs-example bs-example-form" role="form">
                                <div class="form-group">
                                    <div class="input-group ">
                                        <span class="input-group-addon">搜索:</span>
                                        <input type="text" class="form-control" placeholder="请输入关键字..." id="search">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-8 no-padding">
                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-warning" onclick="location.href='<?php echo U("Problem/judgeadd");?>'">
                                    <span class="glyphicon glyphicon-plus" style="color: rgb(255, 255, 255);"></span>新增
                                </button>
                                <button type="button" class="btn btn-default">批量删除</button>
                            </div>
                        </div>
                    </div>
                    <div class="raw">
                        <table class="table table-hover table-striped">
                            <caption></caption>
                            <thead>
                                <tr>
                                <th><input type="checkbox" name="total" /> </th>
                                <th>编号</th>
                                <th>科目</th>
                                <th>章节</th>
                                <th>题目内容</th>
                                <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
                                <td><input type="checkbox" name="<?php echo ($vo['id']); ?>" /> </td>
                                <td><?php echo ($vo['id']); ?></td>
                                <td><?php echo ($vo['subname']); ?></td>
                                <td><?php echo ($vo['capname']); ?></td>
                                <td><?php echo (abbrStr($vo['ttitle'])); ?></td>
                                <td>
                                    <ul class="list-inline">
                                    <li><a href="<?php echo U('Problem/judgeedit',array('id'=>$vo['id'],'op'=>0));?>">详情</a></li>
                                    <li><a href="<?php echo U('Problem/judgeedit',array('id'=>$vo['id'],'op'=>1));?>">修改</a></li>
                                    <li><a href="<?php echo U('Problem/delJudge',array('id'=>$vo['id']));?>">删除</a></li>
                                    </ul>
                                </td>
                                </tr><?php endforeach; endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="blank" style="height:20px;" ></div>
                    <div class="raw">
                        <button type="button" class="btn btn-warning" onclick="location.href='<?php echo U('Problem/judge',array('pageNum'=>1));?>'">首&nbsp&nbsp页</button>
                        <?php if($nowpage > 1): ?><button type="button" class="btn btn-warning" onclick="location.href='<?php echo U('Problem/judge',array('pageNum'=>$nowpage-1));?>'">上一页</button>
                        <?php else: ?>
                        <button type="button" class="btn btn-warning" disabled="disabled">上一页</button><?php endif; ?>
                        <?php if($nowpage < $total): ?><button type="button" class="btn btn-warning" onclick="location.href='<?php echo U('Problem/judge',array('pageNum'=>$nowpage+1));?>'">下一页</button>
                        <?php else: ?>
                        <button type="button" class="btn btn-warning" disabled="disabled">下一页</button><?php endif; ?>
                        <button type="button" class="btn btn-warning" onclick="location.href='<?php echo U('Problem/judge',array('pageNum'=>$total));?>'">末&nbsp&nbsp页</button>
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

    
    </body>
</html>
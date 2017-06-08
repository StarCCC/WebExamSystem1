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
    
    <link rel="stylesheet" type="text/css" href="/WebExamSystem1/Public/css/header.css" />
<div class="container-fluid" style="padding-right: 0px;padding-left: 0px;background-color:rgb(248,248,248);">
    <div class="raw" style="background-color:#f5f5f5;border:1px solid rgb(227,227,229);">
        <div class="container">
            <div class="raw">
                <div class="col-md-12">
                    <ol class="breadcrumb pull-right" style="margin-bottom:0px;">
                        <li><?php echo ($user['welcome']); ?></li>
                        <li><a href="<?php echo U('Home/Login/logout');?>">退出</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="raw">
        <div class="container">
            <div class="raw">
                <div class="col-md-8 col-md-offset-2">
                    <div class="input-group" style="margin:60px 0px;font-size:20px;">
                        <form action="<?php echo U('Index/search');?>" method="POST" id="sform">
                        </form>
                        <input type="text" class="form-control" style="border-color:black;"  name="key" form="sform" >
                        <span class="input-group-btn" >
                            <button class="btn btn-default" type="submit" form="sform" style="border-color:black; background-color:black;color:white"><span class="glyphicon glyphicon-search"></span>&nbsp搜&nbsp索</button>
                        </span>
                        
                    </div><!-- /input-group -->
                </div>
            </div>
        </div>
    </div>
    <div class="raw" style="border-bottom:2px solid black;">
        <div class="container">
            <div class="raw">
                <div class="col-md-12" style="padding-right: 0px;padding-left: 0px;">
                    <nav class="navbar navbar-default" role="navigation" style="margin-bottom: 0px;background-color:rgb(248,248,248);border:0px;">
                        <div class="navbar-header" style="background-color: black;">
                            <a class="navbar-brand" href="<?php echo U('Index/slist');?>" style="color:white;">全部服务分类</a>
                        </div>
                        <div>
                            <ul class="nav navbar-nav" style="font-weight:900;color:black;">
                                <li><a href="<?php echo U('Index/index');?>#1">外语</a></li>
                                <li><a href="<?php echo U('Index/index');?>#2">运动</a></li>
                                <li><a href="<?php echo U('Index/index');?>#3">美食</a></li>
                                <li><a href="<?php echo U('Index/index');?>#4">穿搭</a></li>
                                <li><a href="<?php echo U('Index/index');?>#5">计算机</a></li>
                                <li><a href="<?php echo U('Index/index');?>#6">职场</a></li>
                            </ul>
                        </div>
                    </div>
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

    
    


    </body>
</html>
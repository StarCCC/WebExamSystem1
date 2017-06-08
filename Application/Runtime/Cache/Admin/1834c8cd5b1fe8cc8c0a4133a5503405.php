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
    <li id="a3"><a href="<?php echo U('Paper/general');?>"  >组卷与分发</a></li>
    <li id="a4"><a href="<?php echo U('User/index');?>"  >用户管理</a></li>
    <!--<li id="a5"><a href="<?php echo U('Test/index');?>"  >测试页面</a></li>-->
</ul>
            </div>
            <div class="col-md-10 col-md-offset-2 main">
                <div class="container">
                    <div class="raw">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#">自动组卷</a></li>
                            <li><a href="#">手动组卷</a></li>
                        </ul>
                    </div>
                    <div class="raw">
                        <div class="col-md-3" >
                            
                        </div>
                        <div class="col-md-9" >
                            
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

    
    


    </body>
</html>
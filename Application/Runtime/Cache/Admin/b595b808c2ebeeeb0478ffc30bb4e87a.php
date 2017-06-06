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
    
    <nav class="navbar navbar-inverse ">
    <div class="container-fluid">
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
    <span class="nowpage" style="display:none;">0</span>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar   ">
                <span id="leftnum" style="display:none;"><?php echo ($leftnum); ?></span>
<ul class="nav nav-sidebar">
    <li id="a0"><a href="<?php echo U('Index/index');?>">题库总览</a></li>
    <li id="a1"><a href="<?php echo U('Problem/select');?>" >题目管理</a></li>
    <li id="a2"><a href="<?php echo U('PaperTem/index');?>" >试卷模版</a></li>
    <li id="a3"><a href="<?php echo U('Paper/auto');?>"  >组卷与分发</a></li>
    <li id="a4"><a href="<?php echo U('User/index');?>"  >用户管理</a></li>
    <!--<li id="a5"><a href="<?php echo U('Test/index');?>"  >测试页面</a></li>-->
</ul>
            </div>
            <div class="col-md-10 col-md-offset-2 main">
                <div class="container">
                    
                    <div class="raw">
                        <div class="col-md-6" >
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">题型总览</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="center-block" style="text-align:center;">
                                        <p>题库中共<span style="text-emphasis"><?php echo ((isset($count[0] ) && ($count[0] !== ""))?($count[0] ): 0); ?></span>道题</p>
                                        <p>选择题<span style="text-emphasis"><?php echo ((isset($count[1] ) && ($count[1] !== ""))?($count[1] ): 0); ?></span>道</p>
                                        <p>填空题<span style="text-emphasis"><?php echo ((isset($count[2] ) && ($count[2] !== ""))?($count[2] ): 0); ?></span>道</p>
                                        <p>判断题<span style="text-emphasis"><?php echo ((isset($count[3] ) && ($count[3] !== ""))?($count[3] ): 0); ?></span>道</p>
                                        <p>程序阅读题<span style="text-emphasis"><?php echo ((isset($count[4] ) && ($count[4] !== ""))?($count[4] ): 0); ?></span>道</p>
                                        <p>代码补全题<span style="text-emphasis"><?php echo ((isset($count[5] ) && ($count[5] !== ""))?($count[5] ): 0); ?></span>道</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" >
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">科目总览</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="center-block" style="text-align:center;">
                                        <?php if(is_array($subjects)): foreach($subjects as $key=>$sub): ?><p><?php echo ($key); ?>、 <span><?php echo ((isset($sub['name'] ) && ($sub['name'] !== ""))?($sub['name'] ): 无名称); ?></span>
                                            ，本科目共有<span><?php echo ((isset($sub['temNum'] ) && ($sub['temNum'] !== ""))?($sub['temNum'] ): 0); ?></span>
                                            个模版
                                            </p><?php endforeach; endif; ?>
                                    </div>
                                </div>
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

    
    


    </body>
</html>
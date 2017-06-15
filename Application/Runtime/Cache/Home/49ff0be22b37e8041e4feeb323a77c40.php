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
                    <ol class="breadcrumb pull-left" style="margin-bottom:0px;">
                    <li>欢迎来到经济与管理学院模拟考试系统！</li>
                    </ol>
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
                <div class="col-md-12" style="margin:20px 0px;">
                    <img src="/WebExamSystem1/Public/img/Home/logo1.png"/>
                </div>
            </div>
        </div>
    </div>
    <div class="raw" style="border-top:2px solid #016a49;">
        <div class="container">
            <div class="raw">
                <div class="col-md-12" style="padding-right: 0px;padding-left: 0px;">
                    <nav class="navbar navbar-default" role="navigation" style="margin-bottom: 0px;background-color:rgb(248,248,248);border:0px;">
                        <div class="navbar-header" style="background-color: #016a49;">
                            <a class="navbar-brand" href="<?php echo U('Index/index');?>" style="color:white;">首页</a>
                        </div>
                        <div>
                            <ul class="nav navbar-nav" style="font-weight:900;color:black;">
                                <li><a href="#">一题一练</a></li>
                                <li><a href="#">模拟测试</a></li>
                                <li><a href="<?php echo U('Index/examlist');?>">正式考试</a></li>
                                <li><a href="<?php echo U('Index/historylist');?>">历史考试记录</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
    <div class="container" style="min-height:425px;">
        <table>
            <tr>
                <td style="height:100px;"></td>
            </tr>
            <tr>
                <td style="width:300px;"></td>
                <td style="width:100px;height:100px;">
                    <img src="/WebExamSystem1/Public/img/Home/1.png"  alt="提交完成" />
                </td>
                <td style="height:100px;"><h2 style="font-size:24px;line-height:100px;padding-left:50px;">提交成功！</h2></td>
            </tr>
        </table>
        
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

    
    


    </body>
</html>
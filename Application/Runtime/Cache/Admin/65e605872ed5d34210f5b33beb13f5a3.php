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
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#addModal">
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
                                <th>学号</th>
                                <th>是否启用</th>
                                <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
                                <td><input type="checkbox" name="<?php echo ($vo['id']); ?>" /> </td>
                                <td><?php echo ($vo['id']); ?></td>
                                <td><?php echo ($vo['cuser']); ?></td>
                                <td><?php echo (enable($vo['benable'])); ?></td>
                                <td>
                                    <ul class="list-inline">
                                    <li><a href="<?php echo U('User/editPassword',array('id'=>$vo['id'],'op'=>1));?>">修改密码</a></li>
                                    <li><a href="<?php echo U('User/delete',array('id'=>$vo['id']));?>">删除</a></li>
                                    </ul>
                                </td>
                                </tr><?php endforeach; endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="blank" style="height:20px;" ></div>
                    <div class="raw">
                        <button type="button" class="btn btn-warning" onclick="location.href='<?php echo U('User/index',array('pageNum'=>1));?>'">首&nbsp&nbsp页</button>
                        <?php if($nowpage > 1): ?><button type="button" class="btn btn-warning" onclick="location.href='<?php echo U('User/index',array('pageNum'=>$nowpage-1));?>'">上一页</button>
                        <?php else: ?>
                        <button type="button" class="btn btn-warning" disabled="disabled">上一页</button><?php endif; ?>
                        <?php if($nowpage < $total): ?><button type="button" class="btn btn-warning" onclick="location.href='<?php echo U('User/index',array('pageNum'=>$nowpage+1));?>'">下一页</button>
                        <?php else: ?>
                        <button type="button" class="btn btn-warning" disabled="disabled">下一页</button><?php endif; ?>
                        <button type="button" class="btn btn-warning" onclick="location.href='<?php echo U('User/index',array('pageNum'=>$total));?>'">末&nbsp&nbsp页</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- 模态框（Modal） -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">添加学生</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form" id="addform" action="<?php echo U('User/addUser');?>" method="post">
                            <div class="form-group">
                                <label for="number" class="col-sm-2 control-label">学号</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="number" name="number" placeholder="请输入学号">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                        <button type="submit" class="btn btn-primary" form="addform">确认添加</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal -->
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

    
    <script>
    </script>

    </body>
</html>
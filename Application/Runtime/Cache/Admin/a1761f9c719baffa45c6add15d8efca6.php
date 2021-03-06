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
    
    <span class="nowpage" style="display:none;">2</span>
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
                                <button type="button" class="btn btn-primary btn-warning" data-toggle="modal" data-target="#addModel">
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
                                <th>模版名称</th>
                                <th>题量</th>
                                <th>总分</th>
                                <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
                                <td><input type="checkbox" name="<?php echo ($vo['id']); ?>" /> </td>
                                <td><?php echo ($vo['id']); ?></td>
                                <td><?php echo ($vo['subname']); ?></td>
                                <td><?php echo ($vo['ctemname']); ?></td>
                                <td><?php echo ($vo['iprbnum']); ?></td>
                                <td><?php echo ($vo['itotscore']); ?></td>
                                <td>
                                    <ul class="list-inline">
                                    <li><a href="<?php echo U('PaperTem/edit',array('id'=>$vo['id']));?>">修改模版</a></li>
                                    <li><a href="<?php echo U('PaperTem/delete',array('id'=>$vo['id']));?>">删除</a></li>
                                    </ul>
                                </td>
                                </tr><?php endforeach; endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="blank" style="height:20px;" ></div>
                    <div class="raw">
                        <button type="button" class="btn btn-warning" onclick="location.href='<?php echo U('PaperTem/index',array('pageNum'=>1));?>'">首&nbsp&nbsp页</button>
                        <?php if($nowpage > 1): ?><button type="button" class="btn btn-warning" onclick="location.href='<?php echo U('PaperTem/index',array('pageNum'=>$nowpage-1));?>'">上一页</button>
                        <?php else: ?>
                        <button type="button" class="btn btn-warning" disabled="disabled">上一页</button><?php endif; ?>
                        <?php if($nowpage < $total): ?><button type="button" class="btn btn-warning" onclick="location.href='<?php echo U('PaperTem/index',array('pageNum'=>$nowpage+1));?>'">下一页</button>
                        <?php else: ?>
                        <button type="button" class="btn btn-warning" disabled="disabled">下一页</button><?php endif; ?>
                        <button type="button" class="btn btn-warning" onclick="location.href='<?php echo U('PaperTem/index',array('pageNum'=>$total));?>'">末&nbsp&nbsp页</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">添加试卷模版</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form" action="<?php echo U('PaperTem/addTem');?>" method="POST" id="addform">
                            
                            <div class="form-group">
                                <label for="sub" class="col-sm-2 control-label">科目</label>
                                <div class="col-sm-10">
                                <select id="sub" name="subid" class="form-control" >
                                    <?php if(is_array($subjects)): foreach($subjects as $key=>$sub): ?><option value="<?php echo ($sub['id']); ?>"><?php echo ($sub['cname']); ?></option><?php endforeach; endif; ?>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="temname" class="col-sm-2 control-label">模版名称</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="temname" name="temname" placeholder="请输入模版名称">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="remark" class="col-sm-2 control-label">备注</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="remark" name="remark" placeholder="备注可以没有">
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

    
    


    </body>
</html>
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
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="color: #2c84fb;">
                                        <span class="glyphicon glyphicon-plus" style="color: #2c84fb;"></span>新增模拟试卷
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">新增模拟试卷</a></li>
                                        <li><a href="#">从模版中新增模拟试卷</a></li>
                                    </ul>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="color: #2c84fb;">
                                        <span class="glyphicon glyphicon-plus" ></span>新增考试试卷
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0);" onclick="showAddPaperModal();" >新增考试试卷</a></li>
                                        <li><a href="#">从模版中新增考试试卷</a></li>
                                    </ul>
                                </div>
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
                                <th>考生</th>
                                <th>试卷名</th>
                                <th>总分</th>
                                <th>题数</th>
                                <!--<th>测试类型</th>-->
                                <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
                                <td><input type="checkbox" name="<?php echo ($vo['id']); ?>" /> </td>
                                <td><?php echo ($vo['id']); ?></td>
                                <td><?php echo ($vo['subname']); ?></td>
                                <td><?php echo ($vo['username']); ?></td>
                                <td><?php echo ($vo['cpapname']); ?></td>
                                <td><?php echo ($vo['itotscore']); ?></td>
                                <td><?php echo ($vo['iprbnum']); ?></td>
                                <!--<td><?php echo ($vo['itesttype']); ?></td>-->
                                <td>
                                    <ul class="list-inline">
                                    <li><a href="<?php echo U('Paper/edit',array('id'=>$vo['id']));?>">修改试卷</a></li>
                                    <li><a href="javascript:void(0);" onclick="showAddPrbModal(<?php echo ($vo['id']); ?>);">添加题目</a></li>
                                    <?php if($vo['itesttype'] == 1): ?><li><a href="javascript:void(0);" onclick="showDistributeModal(<?php echo ($vo['id']); ?>);" >分发试卷</a></li><?php endif; ?>
                                    <li><a href="<?php echo U('Paper/delete',array('id'=>$vo['id']));?>">删除</a></li>
                                    </ul>
                                </td>
                                </tr><?php endforeach; endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="blank" style="height:20px;" ></div>
                    <div class="raw">
                        <button type="button" class="btn btn-warning" onclick="location.href='<?php echo U('Paper/index',array('pageNum'=>1));?>'">首&nbsp&nbsp页</button>
                        <?php if($nowpage > 1): ?><button type="button" class="btn btn-warning" onclick="location.href='<?php echo U('Paper/index',array('pageNum'=>$nowpage-1));?>'">上一页</button>
                        <?php else: ?>
                        <button type="button" class="btn btn-warning" disabled="disabled">上一页</button><?php endif; ?>
                        <?php if($nowpage < $total): ?><button type="button" class="btn btn-warning" onclick="location.href='<?php echo U('Paper/index',array('pageNum'=>$nowpage+1));?>'">下一页</button>
                        <?php else: ?>
                        <button type="button" class="btn btn-warning" disabled="disabled">下一页</button><?php endif; ?>
                        <button type="button" class="btn btn-warning" onclick="location.href='<?php echo U('Paper/index',array('pageNum'=>$total));?>'">末&nbsp&nbsp页</button>
                    </div>

                </div>
            </div>
        </div>
        
    </div> <!-- /container -->

    <!--新增试卷-->
    <div class="modal fade" id="addPaperModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">新增试卷</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="addpaperform" action="<?php echo U('Paper/addPaper');?>" method="POST">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">试卷名称</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="请输入试卷名称">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sub" class="col-sm-2 control-label">科目</label>
                            <div class="col-sm-10">
                            <select id="sub" name="subid" class="form-control" >
                                <?php if(is_array($subjects)): foreach($subjects as $key=>$sub): ?><option value="<?php echo ($sub['id']); ?>"><?php echo ($sub['cname']); ?></option><?php endforeach; endif; ?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="time" class="col-sm-2 control-label">考试时间</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="time" name="time" placeholder="请输入考试时间，单位分">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="submit" class="btn btn-primary" form="addpaperform">确认新增</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->

    <!--添加题目-->
    <div class="modal fade" id="addPrbModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">添加试题</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="addprbform" action="<?php echo U('Paper/addPrb');?>" method="POST">
                        <input type="text" name="id" id="paperid" style="display:none;" />
                        <div class="form-group">
                            <label for="sub" class="col-sm-2 control-label">题目类型</label>
                            <div class="col-sm-10">
                            <select id="type" name="typeid" class="form-control" >
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="time" class="col-sm-2 control-label">题目编号</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="prbid" name="prbid" placeholder="请输入题目编号">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">分值</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="score" name="score" placeholder="请输入题目分值">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="submit" class="btn btn-primary" form="addprbform">确认添加</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->

    <!--分发试卷-->
    <div class="modal fade" id="distributeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">分发试卷</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="distributeform" action="<?php echo U('Paper/distribute');?>" method="POST">
                        <input type="text" name="id" id="fpaperid" style="display:none;" />
                        <div class="form-group">
                            <label for="user" class="col-sm-2 control-label">考生学号</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="user" name="user" placeholder="请输入考生学号">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="submit" class="btn btn-primary" form="distributeform">确认</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->


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
        function showAddPaperModal(){
            $("#addPaperModal #name").val("");
            $("#addPaperModal #time").val("");
            $.ajax({
                type:"post",
                url : "<?php echo U('Paper/getSub');?>",
                success:function(data){
                    for (i in data){
                        var option = $("<option></option>");
                        option.attr("value",data[i].id);
                        option.text(data[i].cname);
                        $("#addPaperModal #sub").append(option);
                    }
                     
                }

            });
            $("#addPaperModal").modal({});
        }
        function showAddPrbModal(id){
            $("#paperid").val(id);
            $("#prbid").val("");
            $("#score").val("");
            $.ajax({
                type:"post",
                url : "<?php echo U('Paper/getType');?>",
                success:function(data){
                    $("#type").empty();
                    for (i in data){
                        var option = $("<option></option>");
                        option.attr("value",data[i].id);
                        option.text(data[i].cname);
                        $("#type").append(option);
                    }
                     
                }

            });
            $("#addPrbModal").modal({});
        }
        function showDistributeModal(id){
            $("#fpaperid").val(id);
            
            $("#distributeModal").modal({});
        }
    </script>


    </body>
</html>
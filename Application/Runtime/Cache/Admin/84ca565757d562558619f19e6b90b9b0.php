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
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="raw" style="height:50px;padding-bottom:15px;border-bottom:2px solid rgb(209,211,212);">
                                <div class="col-md-9" style="border-right: 2px solid rgb(209,211,212);font-size:22px;">
                                    <span class="col-md-6" style="text-align:center;">模版名称:<?php echo ($template['ctemname']); ?></span>
                                    <span class="col-md-3" style="text-align:center;">题数:<?php echo ($template['iprbnum']); ?></span>
                                    <span class="col-md-3" style="text-align:center;">总分:<?php echo ($template['itotscore']); ?></span>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-warning" type="button" onclick="addprb(<?php echo ($template['isubid']); ?>);" >添加题目</button>
                                    <button class="btn btn-warning" type="button" onclick="location.href = '<?php echo U('PaperTem/cleanPrb',array('temid'=>$template['id']));?>'" >清空题目</button>
                                </div>
                            </div>
                            <div class="raw">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th>编号</th>
                                        <th>类型</th>
                                        <th>章节</th>
                                        <!--<th>操作</th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
                                        <td><?php echo ($vo['iprbno']); ?></td>
                                        <td><?php echo ($vo['typename']); ?></td>
                                        <td><?php echo ($vo['chaname']); ?></td>
                                        <!--<td>
                                            <button class="btn btn-link" onclick="location.href = '<?php echo U('PaperTem/deletePrb');;?>';">删除</button>
                                        </td>-->
                                        </tr><?php endforeach; endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- /panel-body -->
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- /container -->
    <div class="modal fade" id="addPrb" tabindex="-1" role="dialog" aria-labelledby="addPrblLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="addPrbLabel">向模版添加题目</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" action="<?php echo U('PaperTem/addPrb',array('temid'=>$template['id']));?>" method="POST" id="addform">
                    
                    <div class="form-group">
                        <label for="cha" class="col-sm-2 control-label">章节</label>
                        <div class="col-sm-10">
                        <select id="cha" name="chaid" class="form-control" >
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="type" class="col-sm-2 control-label">题型</label>
                        <div class="col-sm-10"> 
                        <select id="type" name="typeid" class="form-control" >
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="score" class="col-sm-2 control-label">分值</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="score" name="score" placeholder="请输入题目分值">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="num" class="col-sm-2 control-label">数目</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="num" name="num" placeholder="请输入添加数目">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="submit" class="btn btn-primary" form="addform" >确认添加</button>
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
        function addprb(id){
            $.ajax({
                url:"<?php echo U('PaperTem/getType');?>",
                success:function(data){
                    $.each(data,function(i,item){
                        var t = $("<option></option>");
                        t.attr("value",item.id);
                        t.text(item.cname);
                        $("#type").append(t);
                    });
                }
            });
            $.ajax({
                type: "POST",
                url:"<?php echo U('PaperTem/getChapter');?>",
                data:{subid:id},
                success:function(data){
                    $.each(data,function(i,item){
                        var t = $("<option></option>");
                        t.attr("value",item.id);
                        t.text(item.cname);
                        $("#cha").append(t);
                    });
                }
            });
            $("#num").val("");
            $("#addPrb").modal({});
        }
    </script>

    </body>
</html>
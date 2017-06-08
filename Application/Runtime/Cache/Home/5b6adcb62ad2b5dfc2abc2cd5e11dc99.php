<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en" class="no-js">

    <head>

        <meta charset="utf-8">
        <title>模拟考试系统</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="/WebExamSystem1/Public/assets/css/reset.css">
        <link rel="stylesheet" href="/WebExamSystem1/Public/assets/css/supersized.css">
        <link rel="stylesheet" href="/WebExamSystem1/Public/assets/css/style.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>

    <body>

        <div class="page-container">
            <h1>学生登陆</h1>
            <form action="" method="post">
                <input type="text" name="username" class="username" placeholder="请输入用户名...">
                <input type="password" name="password" class="password" placeholder="请输入密码...">
                <button type="button" onclick="login();">登陆点我</button>
                <div class="error"><span>+</span></div>
            </form>
            <!--<div class="connect">
                <p>Or connect with:</p>
                <p>
                    <a class="facebook" href=""></a>
                    <a class="twitter" href=""></a>
                </p>
            </div>-->
        </div>

        <!-- Javascript -->
        <script src="/WebExamSystem1/Public/assets/js/jquery-1.8.2.min.js"></script>
        <script src="/WebExamSystem1/Public/assets/js/supersized.3.2.7.min.js"></script>
        <script src="/WebExamSystem1/Public/assets/js/supersized-init.js"></script>
        <script >
            function login(){
                var user_name = $("input[name=username]").val();
                var pwd = $("input[name=password]").val();
                if (user_name == ""){
                    alert("用户名不能为空！");
                    return false;
                }
                if (pwd == ""){
                    alert("密码不能为空！");
                    return false;
                }
                $.ajax({
                    type: "POST",
                    url: "<?php echo U('Login/login');?>",
                    //data: {'prb_type':""+prbtype,'prb_no':""+prbno},
                    data: {name:user_name, pwd:pwd},
                    //dataType: 'json',  
                    success: function(data) {
                        if (data.status == 0) {
                            alert(data.message);
                            location.href = "<?php echo U('Index/index');?>";
                        } else {
                            alert(data.message);
                        }
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown){
                        alert("网络连接错误，请稍后再试！");
                        alert(XMLHttpRequest.status);
                        alert(XMLHttpRequest.readyState);
                        alert(XMLHttpRequest.responseText);
                        alert(textStatus);
                    }
                });
                return false;
            }
        </script>

    </body>

</html>
$(function() {
    $(".btn_login").click(function(){
        var user_name = $("input[name=user_name]").val();
        var pwd = $("input[name=pwd]").val();
        alert(user_name + "  " + pwd);
        // $.post("/exam/index.php/Admin/Login/login",{name:user_name, pwd:pwd},
        // function(data){
        //     alert(data.message);
        // },JSON);
        $.ajax({
			type: "POST",
			url: "/exam/index.php/Admin/Login/login",
			//data: {'prb_type':""+prbtype,'prb_no':""+prbno},
			data: {name:user_name, pwd:pwd},
			//dataType: 'json',  
			success: function(data) {
                if (data.status == 0) {
                    location.href = "/exam/index.php/Admin/Index/index";
                } else {
                    var mes = $(".message");
                    mes.text(data.message);
                    mes.css("display","block");
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
    });
    
});

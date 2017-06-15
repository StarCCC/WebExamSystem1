EXAM = {};
EXAM.url = "/WebExamSystem1/index.php/Home/";



//刷新页面试卷信息
function showPaperInfo(){
    $(".prbs").text(EXAM.paper.iprbnum);
    $("#papert").text(EXAM.paper.cpapname);
    $("#ptime").text("考试时间:" + (EXAM.paper.itime / 60) + "分");
    $("#pscore").text("总分:" + EXAM.paper.itotscore);
    $(".prbs").text(EXAM.paper.iprbnum);
    $("#prbs").text("总题数:" + EXAM.paper.iprbnum);
    showRestPrbNum();
}

//更新剩余试题信息
function showRestPrbNum(){
    $("#prbr").text(EXAM.restnum);
}

//刷新计时器
function setTime(){
    $m = Math.floor(EXAM.nowtime / 60);
    $s = EXAM.nowtime % 60;
    $("#stime").text($m + ":" + $s);
    EXAM.nowtime--;
    $("#stime").text($m + ":" + $s);
    if (EXAM.nowtime <= 0)
        timeOut();
}

//刷新试题信息
function showPrbInfo(pno){
    EXAM.nowPrb = pno;
    $("ul.pagination li").attr("class","");
    $("#pp"+pno).attr("class","active");
    //设置题型信息
    switch(EXAM.prblist[pno+""].type) {
        case "1":
            $("#prbtype").text("选择题");
            break;
        case "2":
            $("#prbtype").text("填空题");
            break;
        case "3":
            $("#prbtype").text("判断题");
            break;
        case "4":
            $("#prbtype").text("阅读程序题");
            break;
        case "5":
            $("#prbtype").text("补全程序题");
            break;
        case "6":
            $("#prbtype").text("编写代码题");
            break;
        }
    if(EXAM.prblist[pno+""].type == 1){
        //首先设置好答题块
        $("#sel").css("display","block");
        $("#jud").css("display","none");
        $("#cod").css("display","none");
        $("#fil").css("display","none");
        //设置显示的信息
        $(".prbno").text(pno);
        $.ajax({
            type:"post",
            url: EXAM.url + "Exam/getPrb",
            data: {id:EXAM.prblist[pno+""].prbid,type:EXAM.prblist[pno+""].type},
            success: function(data) {
                //$(".ptt").text(data.ttitle);
                document.getElementsByClassName("ptt").item(0).innerHTML = data.ttitle;
                $("#sel span").removeClass("ok");
                $("#sel input").attr("disabled",false);
                $("#sel input").prop("checked",false);
                $("#itema").text(data.citema);
                $("#itemb").text(data.citemb);
                $("#itemc").text(data.citemc);
                $("#itemd").text(data.citemd);
                if (EXAM.prblist[pno+""].iswrite == 1){
                    $("#sel input").attr("disabled","disabled");//禁用
                    //设置答案选项
                    switch(EXAM.prblist[pno+""].answer) {
                    case "1":
                        $("#itemb").addClass("ok");
                        $("#itemb").attr("checked",true);
                        break;
                    case "2":
                        $("#itemc").addClass("ok");
                        $("#itemc").attr("checked",true);
                        break;
                    case "3":
                        $("#itemd").addClass("ok");
                        $("#itemd").attr("checked",true);
                        break;
                    case "0":
                        $("#itema").addClass("ok");
                        $("#itema").attr("checked",true);
                        break;
                    }
                }
            }
        });
        
    }else if (EXAM.prblist[pno+""].type == 5){
        $("#sel").css("display","none");
        $("#jud").css("display","none");
        $("#cod").css("display","block");
        $("#fil").css("display","none");
        //设置显示的信息
        $(".prbno").text(pno);
        $.ajax({
            type:"post",
            url: EXAM.url + "Exam/getPrb",
            data: {id:EXAM.prblist[pno+""].prbid,type:EXAM.prblist[pno+""].type},
            success: function(data) {
                //$(".ptt").text(data.ttitle);
                $("#cod input").attr("disabled",false);
                $("#cod input").val("");
                document.getElementsByClassName("ptt").item(0).innerHTML = data.ttitle;
                if (EXAM.prblist[pno+""].iswrite == 1){
                    $("#cod input").attr("disabled","disabled");
                    $("#cdo input.ans1").val(EXAM.prblist[pno+""].answer);
                    $("#cdo input.ans2").val(EXAM.prblist[pno+""].answer2);
                }
            }
        });
    }else if (EXAM.prblist[pno+""].type == 3){
        $("#sel").css("display","none");
        $("#jud").css("display","block");
        $("#cod").css("display","none");
        $("#fil").css("display","none");
        //设置显示的信息
        $(".prbno").text(pno);
        $.ajax({
            type:"post",
            url: EXAM.url + "Exam/getPrb",
            data: {id:EXAM.prblist[pno+""].prbid,type:EXAM.prblist[pno+""].type},
            success: function(data) {
                $("#jud span").removeClass("ok");
                $("#jud input").attr("disabled",false);
                $("#jud input").prop("checked",false);
                //$(".ptt").text(data.ttitle);
                document.getElementsByClassName("ptt").item(0).innerHTML = data.ttitle;
                if (EXAM.prblist[pno+""].iswrite == 1){
                    $("#jud input").attr("disabled","disabled");//禁用
                    //设置答案选项
                    switch(EXAM.prblist[pno+""].answer) {
                    case "0":
                        $("#cuo").addClass("ok");
                        $("#cuo").attr("checked",true);
                        break;
                    case "1":
                        $("#dui").addClass("ok");
                        $("#dui").attr("checked",true);
                        break;
                    }
                }
            }
        });
    }else {
        $("#sel").css("display","none");
        $("#jud").css("display","none");
        $("#cod").css("display","none");
        $("#fil").css("display","block");
        //设置显示的信息
        $(".prbno").text(pno);
        $.ajax({
            type:"post",
            url: EXAM.url + "Exam/getPrb",
            data: {id:EXAM.prblist[pno+""].prbid,type:EXAM.prblist[pno+""].type},
            success: function(data) {
                //$(".ptt").text(data.ttitle);
                $("#fil input").attr("disabled",false);
                $("#fil input").val("");
                document.getElementsByClassName("ptt").item(0).innerHTML = data.ttitle;
                if (EXAM.prblist[pno+""].iswrite == 1){
                    $("#fil input").attr("disabled","disabled");
                    $("#fil input.ans").val(EXAM.prblist[pno+""].answer);
                }
            }
        });
    }
}

//上一题
function lastPrb(){
    if (EXAM.nowPrb == 1)
        return false;
    EXAM.nowPrb--;
    showPrbInfo(EXAM.nowPrb);
}

//下一题
function nextPrb(){
    if (EXAM.nowPrb == EXAM.paper.iprbnum)
        return false;
    EXAM.nowPrb++;
    showPrbInfo(EXAM.nowPrb);
}

//收集答案
function getAnswer(pno){
    if (EXAM.prblist[pno+""].iswrite == 1)
        return;
    if(EXAM.prblist[pno+""].type == 1){
        EXAM.prblist[pno+""].answer = $("#sel input[name='selr']:checked").val();
        EXAM.prblist[pno+""].iswrite = 1;
    }else if (EXAM.prblist[pno+""].type == 3){
        EXAM.prblist[pno+""].answer = $("#jud input[name='judr']:checked").val();
        EXAM.prblist[pno+""].iswrite = 1;
    }else if (EXAM.prblist[pno+""].type == 5){
        EXAM.prblist[pno+""].answer = $("#cod input.ans1").val();
        EXAM.prblist[pno+""].answer2 = $("#cod input.ans2").val();
        EXAM.prblist[pno+""].iswrite = 1;
    }else {
        EXAM.prblist[pno+""].answer = $("#fil input.ans").val();
        EXAM.prblist[pno+""].iswrite = 1;
    }
    EXAM.restnum--;
    showRestPrbNum();
    showPrbInfo(pno);
}

//提交试卷
function submitPaper(){
    if (EXAM.restnum > 0){
        alert("您还有" + EXAM.restnum + "道题目未答，请确认答题后交卷。");
        return;
    }
    $.ajax({
        type:"post",
        url : EXAM.url + "Exam/submitPaper",
        data:{answerlist:EXAM.prblist,paperid:EXAM.paper.id},
        success:function(data){
            if(data.statu == 0)
                alert("提交失败，请重新提交");
            else
                location.href = EXAM.url + "Index/success";
        }
    });
}

$(function(){
    //页面加载完成后，首先获取试卷信息并显示在页面上
    EXAM.paperid = $("#paperid").text();
    $.ajax({
        type:"post",
        url: EXAM.url + "Exam/getPaper",
        data: {id:EXAM.paperid},
        success: function(data) {
            EXAM.paper = data;//保存试卷信息
            EXAM.nowtime = data.itime;//保存时间信息
            EXAM.restnum = data.iprbnum;
            showPaperInfo();//显示试卷信息
            EXAM.timer = setInterval(setTime,1000);//设置计时器
        }
    });
    //其次获取试题信息并保存
    $.ajax({
        type:"post",
        url: EXAM.url + "Exam/getList",
        data: {id:EXAM.paperid},
        success: function(data) {
            EXAM.prblist = data;//保存试题信息
            EXAM.nowPrb = 1;//设置当前题数
            showPrbInfo(1);//显示试题信息
        }
    });
});
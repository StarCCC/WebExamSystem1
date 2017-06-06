function setChapter(sel_sub){
    //var subid=value.options[value.selectedIndex].value;
    var selectedIndex = sel_sub[0].options.selectedIndex;
    var subid = sel_sub[0].options[selectedIndex].value;  
    var sel_cha = $("select.sel-chapter");
    sel_cha.empty();
    //alert(subid);
    $.ajax({
        type: "POST",
        url: "/WebExamSystem1/index.php/Admin/Problem/getAllChapter",
        //data: {'prb_type':""+prbtype,'prb_no':""+prbno},
        data: {},
        //dataType: 'json',  
        success: function(data) {
            //alert(data);
            var ch;
            $.each(data,function(index, item){
                if(item.isubid == subid){
                    ch = $('<option></option>');
                    ch.attr("value",item.id);
                    ch.text(item.cname);
                    sel_cha.append(ch);
                }
            });
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
            alert("网络连接错误，请稍后再试！");
            alert(XMLHttpRequest.status);
            alert(XMLHttpRequest.readyState);
            alert(XMLHttpRequest.responseText);
            alert(textStatus);
        }
    });
}

$(function(){
    var sel_sub = $("select.sel-subject");
    setChapter(sel_sub);
});
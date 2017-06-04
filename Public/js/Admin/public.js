function setActiveLeft(activeid){
    var lis = $(".nav-sidebar li");
    var active = $("li[id='"+activeid+"']");
    //var num = $(".nowpage").text();
    lis.attr("class","");
    active.attr("class","active");
}

$(function(){
    var activeid = $("span[id='leftnum']").text();
    setActiveLeft(activeid);
});
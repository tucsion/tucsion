var page = 3;
$("#more").click(function () {
    $.post("/ajax/page.ashx", { page: page, pid: $("#pid").val() }, function (data) {
        if (data == "0") {
            alert("没有更多案例了");
            $("#more").remove();
        } else if (data == "1") {
            alert("查询出现错误")
        } else {
            var json = eval(data);
            //因为上面为list集合
            for (var i = 0; i < json.length; i++) {
                // alert(json[i].id + "Name:" + json[i].title);
                var av = json[i];
                var html = "";
                html += '<li>';
                html += '<a class="img" href="'+av.fileName + av.id + '.html">';
                html += '<img src="' + av.imgSrc + '" title="' + av.title + '" alt="' + av.title + '"/></a>';
                html + '<a class="title" href="' + av.fileName + av.id + '.html">';
                html += av.title;
                html += '</a>';
                html += '<p class="info">' + av.keyword + '</p> </li>';
                $("#more-append").append(html);
            }
        }
    })
})

function cz() {
    $("input").each(function () {
        $(this).val("");
    })
    $("textarea[name='need']").val("");
}
var flag = false;
$("#btnok").click(function () {
    if (flag) {
        alert("您已留言成功，请不要重复留言！")
        return;
    }
    var yzp = /^1[3|4|5|7|8][0-9]\d{8}$/;
    var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
    if ($("#userName").val() != "") {
        if (yzp.test($("#phone").val())) {
            if (myreg.test($("#mail").val())) {
                if ($("textarea[name='need']") != "") {
                    $.post("/ajax/addContact.ashx", { userName: $("#userName").val(), phone: $("#phone").val(), mail: $("#mail").val(), need: $("#need").val() }, function (data) {
                        if (data == "0") {
                            flag = true;
                            alert("留言成功，我们会尽快与您联系！")
                            cz();
                        } else {
                            alert(data)
                        }
                    })
                    return false;
                }
                alert("请输入您的需求，方便我们合作")
                return false;
            }
            alert("您输入的邮箱格式不正确")
            return false;
        }
        alert("您输入的手机号码格式不正确")
        return false;
    }
    alert("请输入您的姓名，方便我们联系")
})
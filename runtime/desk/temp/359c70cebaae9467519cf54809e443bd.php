<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:59:"E:\wamp\www\bazhonglvyou\app\desk\sign\view\sign\index.html";i:1490020751;}*/ ?>
<!DOCTYPE html>
<html lang="zh_CN">
<head >
    <meta charset="UTF-8">
    <!--IE8开启标准渲染模式-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--配置视窗-->
    <meta name="viewport" content="width=device-width, initial-scale=1 , user-scalable=no">
    <meta name="keywords" content="巴中华资科技有限公司,华资科技,软件开发,APP开发,网站开发,UI设计,计算机系统集成,行业管理软件,电子商务,大数据等，O2O，移动互联，行业应用,行业管理软件,华资学院，华资培训" />
    <meta name="description" content="巴中华资科技有限公司,华资科技,软件开发,APP开发,网站开发,UI设计,计算机系统集成,行业管理软件,电子商务,大数据等，O2O，移动互联，行业应用,行业管理软件，华资学院，华资培训" />
    <title>巴中华资科技有限公司</title>
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <link rel="stylesheet" href="/static/css/bootstrap-bixin.css">
    <link href="/static/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/static/css/plugins/iCheck/custom.css" rel="stylesheet">
    <style>
        /*解决样式冲突*/
        .lvjing{margin-top:40px}
        .i-checks{margin-bottom:20px}
    </style>
</head>
<body>
<!--<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.html" class="navbar-brand">
                <img src="/static/huaziimages/huazilogo.png" style="width: 285px;height: 85px;">
                <p style="color:#999999;  display: block;font-size: 12px;margin-left: 90px;margin-top: -30px;">企业管理和社会服务信息系统供应商</p>
            </a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#home">首页</a></li>
                <li><a href="#course">服务客户</a></li>
                <li><a href="#course">解决方案</a></li>
                <li><a href="index.html">服务项目</a></li>
                <li><a href="index.html">产品服务</a></li>
                <li><a href="huaziedu/index.html" target="_blank">华资学院</a></li>
                <li><a href="#contact">联系我们</a></li>

            </ul>
        </div>
    </div>
</nav>-->
<section id="contact">
    <div class="lvjing">
        <div class="container">
            <div class="row">
                <div class="col-md-6  wow fadeInRight">
                    <form action="" method="post" id="signForm" onsubmit="return false">
                        <div class="col-md-6 from-group">
                            <input type="text" class="form-control" name="stu_name" placeholder="真实姓名"/>
                        </div>
                        <div class="col-md-6 from-group">
                            <input type="tel" class="form-control" name="stu_phone" placeholder="联系手机"/>
                        </div>
                        <div class="col-md-12 from-group">
                            <input type="tel" class="form-control" name="stu_age" placeholder="您的年龄"/>
                        </div>
                        <div class="col-md-12 from-group i-checks">
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="radio" name="stu_sex" value="0" checked>男
                                </div>
                                <div class="col-xs-6">
                                    <input type="radio" name="stu_sex" value="1">女
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 from-group">
                            <input type="tel" class="form-control" name="stu_qq" placeholder="QQ号码"/>
                        </div>
                        <div class="col-md-12 from-group">
                            <select class="form-control" name="stu_xueli" id="stu_xueli">
                                <option value="0">您的学历</option>
                                <option value="1">本科</option>
                                <option value="2">大专</option>
                                <option value="3">中专</option>
                                <option value="4">高中</option>
                                <option value="5">初中</option>
                                <option value="6">初中以下</option>
                                <option value="7">社会人士</option>
                            </select>
                        </div>
                        <div class="col-md-12 from-group">
                            <select class="form-control" name="stu_zhuanye" id="stu_zhuanye">
                                <option value="0">意向专业</option>
                                <option value="1">普通话技能班</option>
                                <option value="2">办公技能班</option>
                                <option value="3">UI设计师就业班</option>
                                <option value="4">JAVA软件工程师就业班</option>
                                <option value="5">PHP软件工程师就业班</option>
                                <option value="6">Android软件工程师就业班</option>
                                <option value="7">大数据工程师就业班</option>
                                <option value="8">营销推广电商就业班</option>
                            </select>
                        </div>
                        <div class="col-md-8 has-error">
                            <span class="help-block m-b-none" id="serverError"></span>
                            <input type="submit" id="submit" class="form-control" value="提交"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<footer>
    <container>
        <div class="row">
            <div class="col-md-12">
                Copyright&nbsp;©&nbsp;2012-2015&nbsp;&nbsp;www.huaziedu.com&nbsp;&nbsp;渝ICP备13014270号-4
            </div>
        </div>
    </container>
</footer>
<script src="/static/js/jquery.min.bdimg.js"></script>
<script src="/static/js/bootstrap.min.huazi.js"></script>
<script src="/static/js/jquery.min.js?v=2.1.4"></script>
<script src="/static/js/plugins/validate/jquery.validate.min.js"></script>
<script src="/static/js/plugins/iCheck/icheck.min.js"></script>
<script>
    $(function(){

        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });

        var signForm = $("#signForm"),
            submitBtn = $("#submit"),
            serverError = $("#serverError");

        $.validator.setDefaults({
            highlight: function (element) {
                $(element).closest('.from-group').removeClass('has-success').addClass('has-error');
            },
            success: function (element) {
                element.closest('.from-group').removeClass('has-error').addClass('has-success');
            },
            errorPlacement: function(error, element) {
                element.before(error);
            },
            errorElement: "span",
            errorClass: "help-block m-b-none",
            validClass: ""
        });

        var icon = "<i class='fa fa-times'></i>";

        $.validator.addMethod("isMobile", function(value, element) {
            var length = value.length;
            var mobile = /^(13[0-9]{9})|(18[0-9]{9})|(14[0-9]{9})|(17[0-9]{9})|(15[0-9]{9})$/;
            return this.optional(element) || (length == 11 && mobile.test(value));
        }, "请正确填写您的手机号码");

        $.validator.addMethod("isAge", function(value, element) {
            var mobile = /^[0-9]{1,2}$/;
            return this.optional(element) || (mobile.test(value));
        }, "请正确填写您的年龄");

        $.validator.addMethod("isQQ", function(value, element) {
            var mobile = /^[0-9]{5,18}$/;
            return this.optional(element) || (mobile.test(value));
        }, "请正确填写您的QQ号码");

        signForm.validate({
            debug: true,
            rules: {
                stu_name: {
                    required: true,
                    rangelength:[2,20]
                },
                stu_phone: {
                    required: true,
                    isMobile:true,
                },
                stu_age:{
                    required: true,
                    isAge:true
                },
                stu_qq:{
                    required: true,
                    isQQ:true
                },
                stu_xueli:{
                    required: true,
                    min:1
                },
                stu_zhuanye:{
                    required: true,
                    min:1
                }
            },
            messages: {
                stu_name: {
                    required: icon + "请输入姓名",
                    rangelength:icon + "姓名应在2-20个字之间",
                },
                stu_phone: {
                    required: icon + "请输入手机号码",
                },stu_age: {
                    required: icon + "请输入年龄",
                },stu_qq: {
                    required: icon + "请输入QQ",
                },stu_xueli: {
                    required: icon + "请选择学历",
                    min:icon + "请选择学历",
                },stu_zhuanye: {
                    required: icon + "请选择专业",
                    min:icon + "请选择专业",
                }
            },
            submitHandler: function () {
                // 禁用按钮
                submitBtn.attr({
                    disabled: "disabled"
                }).html("提交中...");
                // 提交表单
                $.ajax({
                    url: "",
                    type: "post",
                    dataType: "json",
                    data: signForm.serialize(),
                    success: function (data) {
                        if (data.code === 0) {

                        } else {
                            serverError.show().html(icon + data.msg);
                        }
                    },
                    complete: function () {
                        // 恢复按钮可用
                        submitBtn.removeAttr("disabled").html("提交");
                    },
                    error: function () {
                        serverError.show().html(icon + "网络错误，请检查网络后重试");
                    }
                });
            }
        })
    })
</script>
</body>
</html>
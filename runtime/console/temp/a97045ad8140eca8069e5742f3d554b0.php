<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:62:"E:\wamp\www\bazhonglvyou\app\console\user\view\lists\edit.html";i:1489320858;s:76:"E:\wamp\www\bazhonglvyou\app\console\user\view\..\..\common\view\header.html";i:1489069153;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <title>TIGER·商户中心</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <link rel="shortcut icon" href="favicon.ico">
    <link href="/static/css/bootstrap.min.css?v=3.3.8" rel="stylesheet">
    <link href="/static/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/static/css/animate.css" rel="stylesheet">
    <link href="/static/css/style.css?v=4.1.1" rel="stylesheet">
    <link href="/static/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/static/css/plugins/chosen/chosen.css" rel="stylesheet">
    <link href="/static/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="/static/css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="/static/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/static/css/plugins/colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
</head>


<body class="gray-bg">
<div class="wrapper wrapper-content">
    <div class="col-sm-12">
        <h3 class="pull-left">添加会员</h3>
        <ol class="breadcrumb pull-right">
            <li>
                <a href="index.html"><i class="fa fa-dashboard"></i> 管理中心</a>
            </li>
            <li>
                会员列表
            </li>
            <li>
                添加会员
            </li>
        </ol>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-title">
                    <form class="form-horizontal m-t" onsubmit="return false;" method="post" id="userForm">
                        <input id="" name="id" class="form-control" type="hidden" value="<?php echo $user['id']; ?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">会员帐号：</label>
                            <div class="col-sm-2"><input id="user_name" name="user_name" class="form-control" type="text" value="<?php echo $user['user_name']; ?>"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">会员密码：</label>
                            <div class="col-sm-2">
                                <input id="password" name="password" class="form-control" type="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">确认密码：</label>
                            <div class="col-sm-2">
                                <input id="password_confirm" name="password_confirm" class="form-control" type="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">会员类型：</label>
                            <div class="col-sm-2">
                                <select class="form-control" name="type">
                                    <option value="2" <?php if($user['type'] == '2'): ?>selected<?php endif; ?> >普通会员</option>
                                    <option value="1" <?php if($user['type'] == '1'): ?>selected<?php endif; ?> >商家管理员</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group has-error">
                            <div class="col-sm-4 col-sm-offset-2">
                                <span id="server-error" class="help-block m-b-none"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary" type="submit" id="submit">提交</button>
                                <button class="btn btn-white" type="button" id="cancel">取 消</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 全局js -->
<script src="/static/js/jquery.min.js?v=2.1.4"></script>
<script src="/static/js/bootstrap.min.js?v=3.3.6"></script>
<!-- jQuery Validation plugin javascript-->
<script src="/static/js/plugins/validate/jquery.validate.min.js"></script>

<script>
    var menuForm = $("#userForm"),
            submitBtn = $("#submit"),
            serverError = $("#server-error"),
            cancel = $("#cancel");
    // 表单验证
    $.validator.setDefaults({
        highlight: function (element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        success: function (element) {
            element.closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        errorElement: "span",
        errorClass: "help-block m-b-none",
        validClass: ""
    });
    $().ready(function () {
        var icon = "<i class='fa fa-times'></i> ";
        menuForm.validate({
            debug: true,
            rules: {
                user_name: {
                    required: true,
                    minlength: 2,
                    maxlength: 10
                },
                password_confirm: {
                    equalTo: "#password"
                },
            },
            messages: {
                user_name: {
                    required: icon + "请输入会员帐号",
                    minlength: icon + "用户名必须2个字符以上",
                    maxlength: icon + "用户名必须10个字符以内"
                },
                password_confirm: {
                    equalTo: icon + "两次输入密码不一致",
                },
            },
            submitHandler: function () {
                // 禁用按钮
                submitBtn.attr({
                    disabled: "disabled"
                }).html("提交中...");
                // 提交表单
                $.ajax({
                    url: "<?php echo Url('/user/lists/edit','',false, true); ?>",
                    type: "post",
                    dataType: "json",
                    data: menuForm.serialize(),
                    success: function (data) {
                        if (data.code === 0) {
                            self.location = document.referrer;
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
        });
        cancel.click(function () {
            self.location = document.referrer;
        });
    });
</script>
</body>

</html>

<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:60:"E:\phpStudy\WWW\app\console\user\view\privilege\adduser.html";i:1489393301;s:67:"E:\phpStudy\WWW\app\console\user\view\..\..\common\view\header.html";i:1489392067;}*/ ?>
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
    <link href="/static/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
    <link href="/static/css/plugins/colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
</head>


<body class="gray-bg">
<div class="wrapper wrapper-content">
    <div class="col-sm-12">
        <h3 class="pull-left">为角色添加会员</h3>
        <ol class="breadcrumb pull-right">
            <li>
                <a href="index.html"><i class="fa fa-dashboard"></i> 管理中心</a>
            </li>
            <li>
                权限管理
            </li>
            <li>
                为角色添加会员
            </li>
        </ol>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-title">
                    <form class="form-horizontal m-t" onsubmit="return false;" method="post" id="userForm">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">当前角色：</label>
                            <p class="form-control-static"><?php echo $role['role_name']; ?></p>
                            <input type="hidden" name="role_code" value="<?php echo $role['role_code']; ?>">
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">会员：</label>
                            <div class="col-sm-10">
                                <table id="exampleTablePagination" data-toggle="table">
                                    <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="id">ID</th>
                                        <th data-field="name">名称</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>

                        <div class="form-group has-error">
                            <div class="col-sm-4 col-sm-offset-2">
                                <span id="server-error" class="help-block m-b-none hide"></span>
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
<script src="/static/js/plugins/bootstrap-table/bootstrap-table.min.js"></script>
<script src="/static/js/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.min.js"></script>
<script src="/static/js/plugins/iCheck/icheck.min.js"></script>
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

        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });

        var icon = "<i class='fa fa-times'></i> ";
        menuForm.validate({
            debug: true,
            rules: {
                user_name: {
                    required: true,
                    minlength: 2,
                    maxlength: 10
                },
                password: {
                    required: true,
                    minlength: 5,
                    maxlength: 20,
                },
                password_confirm: {
                    required: true,
                    minlength: 5,
                    maxlength: 20,
                    equalTo: "#password"
                },
            },
            messages: {
                user_name: {
                    required: icon + "请输入会员帐号",
                    minlength: icon + "用户名必须2个字符以上",
                    maxlength: icon + "用户名必须10个字符以内"
                },
                password: {
                    required: icon + "请输入密码",
                    minlength: icon + "密码必须5个字符以上",
                    maxlength: icon + "密码必须20个字符以内"
                },
                password_confirm: {
                    required: icon + "请再次输入密码",
                    minlength: icon + "密码必须5个字符以上",
                    maxlength: icon + "密码必须10个字符以内",
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
                    url: "<?php echo Url('/user/lists/addsave','',false, true); ?>",
                    type: "post",
                    dataType: "json",
                    data: menuForm.serialize(),
                    success: function (data) {
                        if (data.code === 0) {
                            self.location = document.referrer;
                        } else {
                            console.log("错误码：" + data.code);
                            serverError.removeClass('hide').html(icon + data.msg);
                        }
                    },
                    complete: function () {
                        // 恢复按钮可用
                        submitBtn.removeAttr("disabled").html("提交");
                    },
                    error: function () {
                        serverError.removeClass('hide').html(icon + "网络错误，请检查网络后重试");
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

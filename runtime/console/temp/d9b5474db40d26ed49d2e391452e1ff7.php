<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:64:"D:\wamp\www\bazhonglvyou\app\console\user\view\role\addrole.html";i:1489841398;s:76:"D:\wamp\www\bazhonglvyou\app\console\user\view\..\..\common\view\header.html";i:1489832979;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <title>飞猫旅行·管理中心</title>
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
    <link href="/static/css/plugins/treeview/bootstrap-treeview.css" rel="stylesheet">
</head>


<body class="gray-bg">
<div class="wrapper wrapper-content">
    <div class="col-sm-12">
        <h3 class="pull-left">添加角色</h3>
        <ol class="breadcrumb pull-right">
            <li>
                <a href="index.html"><i class="fa fa-dashboard"></i> 管理中心</a>
            </li>
            <li>
                权限管理
            </li>
            <li>
                添加角色
            </li>
        </ol>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-title">
                    <form class="form-horizontal m-t" onsubmit="return false;" method="post" id="roleForm">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">角色名称：</label>
                            <div class="col-sm-4">
                                <input type="text" name="role_name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">角色编码：</label>
                            <div class="col-sm-4">
                                <input type="text" name="role_code" class="form-control">
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

    var roleForm = $("#roleForm"),
            submitBtn = $("#submit"),
            serverError = $("#server-error"),
            cancel = $("#cancel");

    // 表单验证
    $().ready(function () {

        // 角色编码验证
        $.validator.addMethod("roleCodeCheck", function (value, element) {
            var role_code = /^[a-zA-Z_]*$/;
            return role_code.test(value);
        }, "角色编码只能输入字母和下划线");

        var icon = "<i class='fa fa-times'></i> ";
        roleForm.validate({
            debug: true,
            rules: {
                role_name: {
                    required: true,
                },
                role_code: {
                    required: true,
                    roleCodeCheck:true,
                }
            },
            messages: {
                role_name: {
                    required: icon + "请填写角色名称",
                },
                role_code: {
                    required: icon + "请填写角色编码",
                }
            },
            submitHandler: function () {
                // 禁用按钮
                submitBtn.attr({
                    disabled: "disabled"
                }).html("提交中...");
                // 提交表单
                $.ajax({
                    url: "<?php echo Url('/user/role/addrolesave','',false, true); ?>",
                    type: "post",
                    dataType: "json",
                    data: roleForm.serialize(),
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

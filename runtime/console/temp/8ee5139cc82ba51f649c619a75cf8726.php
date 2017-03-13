<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:60:"E:\phpStudy\WWW\app\console\user\view\privilege\adduser.html";i:1489410305;s:67:"E:\phpStudy\WWW\app\console\user\view\..\..\common\view\header.html";i:1489392067;}*/ ?>
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
                    <form class="form-horizontal m-t" onsubmit="return false;" method="post" id="roleForm">
                        <input type="hidden" name="user_id" id="user_id" value="">
                        <input type="hidden" name="role_code" value="<?php echo $role['role_code']; ?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">当前角色：</label>
                            <p class="form-control-static"><?php echo $role['role_name']; ?></p>
                            <input type="hidden" name="role_code" value="<?php echo $role['role_code']; ?>">
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">会员：</label>
                            <div class="col-sm-10">
                                <table id="exampleTablePagination" data-search="true" data-click-to-select="true"
                                       data-side-pagination="client" data-pagination="true" data-toggle="table"
                                       data-striped="true" data-sort-stable="true"
                                       data-url="<?php echo Url('user/privilege/userList'); ?>">
                                    <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="id">ID</th>
                                        <th data-field="user_name">帐号</th>
                                    </tr>
                                    </thead>
                                </table>
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
<script src="/static/js/plugins/bootstrap-table/bootstrap-table.min.js"></script>
<script src="/static/js/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.min.js"></script>
<script src="/static/js/plugins/iCheck/icheck.min.js"></script>
<script src="/static/js/plugins/validate/jquery.validate.min.js"></script>

<script>

    $('#exampleTablePagination').bootstrapTable({
        onCheck: function (element) {
            var cur_user_id = element.id;
            var user_id = $("#user_id").val();
            if (user_id == '') {
                $("#user_id").val(cur_user_id);
            } else {
                $("#user_id").val(user_id + ',' + cur_user_id);
            }
        },
        onUncheck: function (element) {
            var cur_user_id = element.id.toString();
            var user_id = $("#user_id").val();

            var user_id_arr = user_id.split(',');
            user_id_arr.splice($.inArray(cur_user_id, user_id_arr), 1);
            $("#user_id").val(user_id_arr.join());
        },
        onCheckAll: function (element) {
            var user_id = '';
            $.each(element, function (i, j) {
                user_id += ',' + j.id;
            })
            $("#user_id").val(user_id.substr(1, user_id.length));
        },
        onUncheckAll: function (element) {
            $("#user_id").val('');
        }
    })

    var menuForm = $("#roleForm"),
        submitBtn = $("#submit"),
        serverError = $("#server-error"),
        cancel = $("#cancel");

    // 表单验证
    $().ready(function () {

        var icon = "<i class='fa fa-times'></i> ";
        menuForm.validate({
            debug: true,
            submitHandler: function () {
                // 禁用按钮
                submitBtn.attr({
                    disabled: "disabled"
                }).html("提交中...");
                // 提交表单
                $.ajax({
                    url: "<?php echo Url('/user/privilege/save','',false, true); ?>",
                    type: "post",
                    dataType: "json",
                    data: menuForm.serialize(),
                    beforeSend:function(){
                        var user_id = $("#user_id").val();
                        if(user_id == ''){
                            serverError.show().html(icon + "必须选择会员");
                            submitBtn.removeAttr("disabled").html("提交");
                            return false;
                        }
                    },
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

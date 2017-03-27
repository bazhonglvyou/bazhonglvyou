<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"D:\WWW\bazhonglvyou\app\console\producttype\view\producttype\addlist.html";i:1490598479;s:78:"D:\WWW\bazhonglvyou\app\console\producttype\view\..\..\common\view\header.html";i:1489718237;}*/ ?>
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
        <h3 class="pull-left"><?php echo !empty($id)?'修改':'添加'; ?>供应商类型</h3>
        <ol class="breadcrumb pull-right">
            <li>
                <a href="index.html"><i class="fa fa-dashboard"></i> 管理中心</a>
            </li>
            <li>
                商品分类
            </li>
            <li>
                <?php echo !empty($id)?'修改':'添加'; ?>                商品分类

            </li>
        </ol>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-title">
                    <form class="form-horizontal m-t" onsubmit="return false;" method="post" id="userForm">
                        <input type="text" name="id" style="display: none" value="<?php echo isset($id) ? $id :  '0'; ?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">分类名称：</label>
                            <div class="col-sm-2"><input id="user_name" value="<?php echo isset($lists['product_type_name']) ? $lists['product_type_name'] :  ''; ?>" name="type_name" class="form-control" type="text"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">排序：</label>
                            <div class="col-sm-2">
                                <input id="product_one_price" name="sort" value="<?php echo isset($lists['sort']) ? $lists['sort'] :  ''; ?>" class="form-control" type="text">
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
                type_name: {
                    required: true,
                    minlength: 2,
                    maxlength: 15
                },
                sort: {
                    digits:true,
                    required: true
                }
            },
            messages: {
                type_name: {
                    required: icon + "请输入商品分类名",
                    minlength: icon + "产品名必须2个字符以上",
                    maxlength: icon + "产品名必须15个字符以内"
                },
                sort: {
                    required: icon + "请输入排序号",
                    digits:icon + "排序号为整数"
                }

            },
            submitHandler: function () {
                // 禁用按钮
                submitBtn.attr({
                    disabled: "disabled"
                }).html("提交中...");
                // 提交表单
                $.ajax({
                    url: "<?php echo Url('/producttype/producttype/add'); ?>",
                    type: "post",
                    dataType: "json",
                    data: menuForm.serialize(),
                    success: function (data) {
                        data = eval('('+data+')');
                        if (data.code == 1) {
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

<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:67:"D:\wamp\www\bazhonglvyou\app\console\user\view\privilege\lists.html";i:1489841939;s:76:"D:\wamp\www\bazhonglvyou\app\console\user\view\..\..\common\view\header.html";i:1489832979;}*/ ?>
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
        <h3 class="pull-left">权限管理</h3>
        <ol class="breadcrumb pull-right">
            <li>
                <a href="index.html"><i class="fa fa-dashboard"></i> 管理中心</a>
            </li>
            <li>
                权限管理
            </li>
            <li>
                权限列表
            </li>
        </ol>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-6 m-b-xs">
                            <div class="input-group">
                                <div class="btn-group">
                                    <a href="javascript:history.go(-1)" class="btn btn-primary"><i
                                            class="fa fa-reply"></i> 返回上一页</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div class="col-sm-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-content">
                                    <div class="form-group">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th width="10%" class="text-center"><input type="checkbox"
                                                                                           class="i-checks checkAll">
                                                </th>
                                                <th width="59%">菜单名称</th>
                                            </tr>
                                            </thead>
                                            <tbody class="pri">
                                            <?php echo $list; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-group has-error">
                                        <div class="col-sm-6 col-sm-offset-4">
                                            <span id="server-error" class="help-block m-b-none"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-6 col-sm-offset-4">
                                            <button class="btn btn-primary" data-rolecode="<?php echo $rolecode; ?>" type="submit"
                                                    id="submit">提交
                                            </button>
                                            <button class="btn btn-white" type="button" id="cancel">取 消</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 全局js -->
<script src="/static/js/jquery.min.js?v=2.1.4"></script>
<script src="/static/js/bootstrap.min.js?v=3.3.6"></script>
<script src="/static/js/plugins/iCheck/icheck.min.js"></script>
<script>

    $(function () {

        //复选框按钮样式
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });

        //全选权限
        $('.checkAll').on('ifChecked ifUnchecked', function (event) {
            var checkbox = $('.pri').find('input[type="checkbox"]');
            $.each(checkbox, function (i, j) {
                event.type == 'ifChecked' ? $(j).iCheck('check') : $(j).iCheck('uncheck');
            })
        });

        //添加权限
        $("#submit").bind('click', function () {
            var code = [],
                cover = $("input[name='code[]']"),
                error = $("#serverError"),
                submit = $(this),
                rolecode = submit.data('rolecode'),
                icon = '<i class="fa fa-times"></i>';
            if (cover.length > 0) {
                $.each(cover, function (i, j) {
                    if ($(j).is(':checked')) {
                        code.push($(j).val());
                    }
                })
                if (code.length > 0) {
                    $.ajax({
                        method: 'POST',
                        url: '<?php echo Url("user/privilege/save","",false,true); ?>',
                        data: {code: code, rolecode: rolecode},
                        dataType: 'json',
                        beforeSend: function () {
                            submit.attr('disabled', "disabled").html('保存中...');
                        },
                        success: function (data) {
                            if (data.code === 0) {
                                self.location = document.referrer;
                            } else {
                                error.show().html(icon + data.msg);
                            }
                        },
                        complete: function (XMLHttpRequest, status) {
                            if (status == 'timeout') {
                                error.show().html(icon + '请求超时，请重试');
                            }
                            submit.removeAttr('disabled').html('保存');
                        },
                        error: function () {
                            error.show().html(icon + '网络错误，请重试');
                            submit.removeAttr("disabled").html('保存');
                        }

                    })
                }
            } else {
                error.show().html(icon + '请选择权限');
            }
        })

        //渲染角色已有权限
        var cover = $("input[name='code[]']"),
            pri = <?php echo $roleprivilege; ?>;
        if(pri != ''){
            $.each(pri, function (i, j) {
                $(j).each(function (k, v) {
                    $.each(cover, function (m, n) {
                        if ($(n).val() == v.pri_code) {
                            $(n).iCheck('check');
                        }
                    })
                })
            })
        }

        //查询权限是否全选
        var flag = false;
        $.each(cover, function (i, j) {
            if (!$(j).is(':checked')) {
                flag = true;
                return false;
            }
        })

        //权限全选时，顶部全选复选框处于选中状态
        if (!flag) {
            $(".checkAll").iCheck('check');
        }
    })
</script>
</body>

</html>

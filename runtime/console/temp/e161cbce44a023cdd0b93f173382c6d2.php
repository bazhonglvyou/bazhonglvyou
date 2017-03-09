<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:54:"E:\phpStudy\WWW\app\console\menu\view\menu\create.html";i:1489058861;s:67:"E:\phpStudy\WWW\app\console\menu\view\..\..\common\view\header.html";i:1489043266;}*/ ?>
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
        <h3 class="pull-left">添加菜单</h3>
        <ol class="breadcrumb pull-right">
            <li>
                <a href="index.html"><i class="fa fa-dashboard"></i> 管理中心</a>
            </li>
            <li>
                系统设置
            </li>
            <li>
                菜单管理
            </li>
            <li>
                添加菜单
            </li>
        </ol>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-title">
                    <form class="form-horizontal m-t" onsubmit="return false;" method="post" id="menuForm">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">上级菜单：</label>
                            <div class="col-sm-5">
                                <select class="form-control" name="parent" id="menu">
                                    <option value="0">作为一级菜单</option>
                                    <?php echo $categorys; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group hide">
                            <label class="col-sm-2 control-label">菜单图标：</label>
                            <div class="col-sm-4">
                                <input type="hidden" name="icon" id="icon" value="">
                                <button data-toggle="tooltip" data-placement="top" data-original-title="点击选择图标"
                                        class="btn btn-primary btn-ico" type="button"><i class="fa fa-check"></i>
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">名称：</label>
                            <div class="col-sm-4">
                                <input id="name" name="name" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">模块：</label>
                            <div class="col-sm-4">
                                <input id="module" name="module" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">控制器：</label>
                            <div class="col-sm-4">
                                <input id="controller" name="controller" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">方法：</label>
                            <div class="col-sm-4">
                                <input id="action" name="action" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">参数：</label>
                            <div class="col-sm-4">
                                <input id="parameter" name="parameter" class="form-control" type="text">
                                <span class="help-block m-b-none"><i
                                        class="fa fa-info-circle"></i> 例:groupid=1&type=2</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">备注：</label>
                            <div class="col-sm-4">
                                <textarea id="remark" name="remark" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">状态：</label>
                            <div class="col-sm-4">
                                <div class="radio radio-success radio-inline">
                                    <input type="radio" id="redio-show" value="1" name="is_show" checked="">
                                    <label for="redio-show"> 显示</label>
                                </div>
                                <div class="radio radio-inline">
                                    <input type="radio" id="redio-hidden" value="0" name="is_show">
                                    <label for="redio-hidden"> 不显示</label>
                                </div>
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

<!--菜单图标弹出-->
<div class="modal fade" id="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">图标预览</h4>
            </div>
            <div class="modal-body">
                <div class="row fontawesome-icon-list">
                    <div class="fa-hover col-md-2 col-sm-4"><a href="#adjust"><i class="fa fa-adjust"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#anchor"><i class="fa fa-anchor"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#archive"><i class="fa fa-archive"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#area-chart"><i class="fa fa-area-chart"></i></a>
                    </div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#arrows"><i class="fa fa-arrows"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#arrows-h"><i class="fa fa-arrows-h"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#arrows-v"><i class="fa fa-arrows-v"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#asterisk"><i class="fa fa-asterisk"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#at"><i class="fa fa-at"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#car"><i class="fa fa-automobile"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#balance-scale"><i class="fa fa-balance-scale"></i></a>
                    </div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#ban"><i class="fa fa-ban"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#university"><i class="fa fa-bank"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#bar-chart"><i class="fa fa-bar-chart"></i></a>
                    </div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#bar-chart"><i class="fa fa-bar-chart-o"></i></a>
                    </div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#barcode"><i class="fa fa-barcode"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#bars"><i class="fa fa-bars"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#battery-empty"><i class="fa fa-battery-0"></i></a>
                    </div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#battery-quarter"><i
                            class="fa fa-battery-1"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#battery-half"><i class="fa fa-battery-2"></i></a>
                    </div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#eye-slash"><i class="fa fa-eye-slash"></i></a>
                    </div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#eyedropper"><i class="fa fa-eyedropper"></i></a>
                    </div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#fax"><i class="fa fa-fax"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#eye"><i class="fa fa-eye"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#battery-three-quarters"><i
                            class="fa fa-battery-3"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#battery-full"><i class="fa fa-battery-4"></i></a>
                    </div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#battery-empty"><i class="fa fa-battery-empty"></i></a>
                    </div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#battery-full"><i
                            class="fa fa-battery-full"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#battery-half"><i
                            class="fa fa-battery-half"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#battery-quarter"><i
                            class="fa fa-battery-quarter"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#battery-three-quarters"><i
                            class="fa fa-battery-three-quarters"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#bed"><i class="fa fa-bed"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#beer"><i class="fa fa-beer"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#bell"><i class="fa fa-bell"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#bell-o"><i class="fa fa-bell-o"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#bell-slash"><i class="fa fa-bell-slash"></i></a>
                    </div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#bell-slash-o"><i
                            class="fa fa-bell-slash-o"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#bicycle"><i class="fa fa-bicycle"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#binoculars"><i class="fa fa-binoculars"></i></a>
                    </div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#birthday-cake"><i class="fa fa-birthday-cake"></i></a>
                    </div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#bolt"><i class="fa fa-bolt"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#bomb"><i class="fa fa-bomb"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#book"><i class="fa fa-book"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#bookmark"><i class="fa fa-bookmark"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#bookmark-o"><i class="fa fa-bookmark-o"></i></a>
                    </div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#briefcase"><i class="fa fa-briefcase"></i></a>
                    </div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#bug"><i class="fa fa-bug"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#building"><i class="fa fa-building"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#building-o"><i class="fa fa-building-o"></i></a>
                    </div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#bullhorn"><i class="fa fa-bullhorn"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#bullseye"><i class="fa fa-bullseye"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#bus"><i class="fa fa-bus"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#taxi"><i class="fa fa-cab"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#calculator"><i class="fa fa-calculator"></i></a>
                    </div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#calendar"><i class="fa fa-calendar"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#calendar-check-o"><i
                            class="fa fa-calendar-check-o"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#calendar-minus-o"><i
                            class="fa fa-calendar-minus-o"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#calendar-o"><i class="fa fa-calendar-o"></i></a>
                    </div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#calendar-plus-o"><i
                            class="fa fa-calendar-plus-o"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#calendar-times-o"><i
                            class="fa fa-calendar-times-o"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#camera"><i class="fa fa-camera"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#camera-retro"><i
                            class="fa fa-camera-retro"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#car"><i class="fa fa-car"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#caret-square-o-down"><i
                            class="fa fa-caret-square-o-down"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#caret-square-o-left"><i
                            class="fa fa-caret-square-o-left"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#caret-square-o-right"><i
                            class="fa fa-caret-square-o-right"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#caret-square-o-up"><i
                            class="fa fa-caret-square-o-up"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#cart-arrow-down"><i
                            class="fa fa-cart-arrow-down"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#cart-plus"><i class="fa fa-cart-plus"></i></a>
                    </div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#cc"><i class="fa fa-cc"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#certificate"><i class="fa fa-certificate"></i></a>
                    </div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#check"><i class="fa fa-check"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#check-circle"><i
                            class="fa fa-check-circle"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#check-circle-o"><i
                            class="fa fa-check-circle-o"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#check-square"><i
                            class="fa fa-check-square"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#check-square-o"><i
                            class="fa fa-check-square-o"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#child"><i class="fa fa-child"></i></a></div>

                    <div class="fa-hover col-md-2 col-sm-4"><a href="#circle"><i class="fa fa-circle"></i></a></div>

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
<script src="/static/js/plugins/validate/additional-methods.min.js"></script>
<script src="/static/js/plugins/validate/messages_zh.min.js"></script>
<!-- 自定义js -->
<script src="/static/js/content.js?v=1.0.0"></script>
<script>
    $("#menu").bind('change', function () {
        //二级菜单显示icon图标上传
        var childMenu = <?php echo $childMenu; ?>;
        var childMenuId = [];
        $.each(childMenu, function (i, j) {
            childMenuId.push(j.id);
        })

        if ($.inArray(parseInt($(this).val()), childMenuId) >= 0) {
            //图标显示
            $(".btn-ico").closest('.form-group').removeClass('hide');
        } else {
            //图标隐藏
            $(".btn-ico").closest('.form-group').addClass('hide');
            //设为默认图标
            $("#icon").val('');
            $(".btn-ico").children('i').attr('class', 'fa fa-check');
        }
    })

    //菜单图标弹窗
    $(".btn-ico").bind('click', function () {
        $('#modal').modal();
    })

    //渲染选择的图标
    $(".fontawesome-icon-list").find('a').bind('click', function () {
        $('#modal').modal('hide');
        var cla = $(this).children('i').attr('class');
        $(".btn-ico").children('i').attr('class', cla);

        var claVal = $(this).attr('href');
        $("#icon").val(claVal.substr(1, claVal.length));
    })

    $('.ibox-title').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    });

    var menuForm = $("#menuForm"),
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
                parent: {
                    required: true,
                },
                name: {
                    required: true,
                },
                module: {
                    required: true,
                    lettersonly: true
                },
                controller: {
                    lettersonly: true
                },
                action: {
                    lettersonly: true
                },
                status: {
                    required: true,
                },
            },
            messages: {
                parent: {
                    required: icon + "请选择上级菜单",
                },
                name: {
                    required: icon + "请填写菜单名称",
                },
                module: {
                    required: icon + "请填写模块名（英文单词）",
                    lettersonly: icon + "模块名必须为英文单词"
                },
                controller: {
                    lettersonly: icon + "控制器名必须为英文单词"
                },
                action: {
                    lettersonly: icon + "方法名必须为英文单词"
                },
                status: {
                    required: icon + "请选择状态",
                },
            },
            submitHandler: function () {
                // 禁用按钮
                submitBtn.attr({
                    disabled: "disabled"
                }).html("提交中...");
                // 提交表单
                $.ajax({
                    url: "<?php echo Url('/menu/menu/save','',false, true); ?>",
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

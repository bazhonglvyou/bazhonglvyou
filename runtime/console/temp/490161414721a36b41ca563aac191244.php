<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:76:"D:\phpStudy\WWW\bazhonglvyou\app\console\supplier\view\supplier\addlist.html";i:1489928155;s:84:"D:\phpStudy\WWW\bazhonglvyou\app\console\supplier\view\..\..\common\view\header.html";i:1489718237;}*/ ?>
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
        <h3 class="pull-left"><?php echo !empty($id)?'修改':'添加'; ?>供应商</h3>
        <ol class="breadcrumb pull-right">
            <li>
                <a href="index.html"><i class="fa fa-dashboard"></i> 管理中心</a>
            </li>
            <li>
                供应商列表
            </li>
            <li>
                <?php echo !empty($id)?'修改':'增加'; ?>供应商
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
                            <label class="col-sm-2 control-label">供应商名称：</label>
                            <div class="col-sm-2"><input id="user_name" value="<?php echo isset($lists['gy_name']) ? $lists['gy_name'] :  ''; ?>" name="gy_name" class="form-control" type="text"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">供应商类型：</label>
                            <div class="col-sm-2">
                                <input type="text" name="type_name_text" style="display: none;" value="<?php echo isset($lists['gys_type']) ? $lists['gys_type'] :  ''; ?>">
                                <select class="form-control" name="gys_type" value="<?php echo isset($lists['gys_type']) ? $lists['gys_type'] :  ''; ?>">
                                    <?php if(is_array($list_type) || $list_type instanceof \think\Collection || $list_type instanceof \think\Paginator): $i = 0; $__LIST__ = $list_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo $vo['id']; ?>"><?php echo $vo['type_name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">负责人姓名：</label>
                            <div class="col-sm-2">
                                <input id="product_one_price" name="fz_name" value="<?php echo isset($lists['fz_name']) ? $lists['fz_name'] :  ''; ?>" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">性别：</label>
                            <div class="col-sm-5">
                                <input class="nan_c" type="radio" <?php echo !empty($lists["sex"]) && $lists["sex"]==1?'checked' : ''; ?>
                                value="1" name="sex" style="">
                                <span style="vertical-align: middle;color: #111111">男</span>
                                <input  class="nv_c" type="radio" <?php echo !empty($lists["sex"]) && $lists["sex"]==2?'checked' : ''; ?> value="2"  name="sex" style="margin-left: 16px;">
                                <span style="vertical-align: middle;color: #111111">女</span>
                                <input  class="no_c" <?php echo !empty($lists["sex"]) && $lists["sex"]==3?'checked' : ''; ?> type="radio"  value="3"  name="sex" style=" margin-left: 16px;">
                                <span style="vertical-align: middle;color: #111111">保密</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">联系电话：</label>
                            <div class="col-sm-2">
                                <input  value="<?php echo isset($lists['tel']) ? $lists['tel'] :  ''; ?>" name="tel" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">联系qq：</label>
                            <div class="col-sm-2">
                                <input id="" value="<?php echo isset($lists['qq']) ? $lists['qq'] :  ''; ?>" name="qq" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">微信号：</label>
                            <div class="col-sm-2">
                                <input id="" value="<?php echo isset($lists['wchat_nu']) ? $lists['wchat_nu'] :  ''; ?>" name="wchat_nu" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">详细地址：</label>
                            <div class="col-sm-2">
                                <input id="" value="<?php echo isset($lists['detail_address']) ? $lists['detail_address'] :  ''; ?>" name="detail_address" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">营业执照：</label>
                            <div class="col-sm-2">
                                <input id="file_upload1" name="file_upload" type="file" multiple="true" style="width: 185px; height: 25px;opacity:0;position: absolute;margin-top:12px;vertical-align: middle;" >
                                <div id="img_yulan1">
                                    <?php if(isset($ticket)){if(is_array($ticket['yy_url'])){
                            foreach($ticket['yy_url'] as $key => $value){
                                    ?>
                                    <img src="<?php echo $value?>" alt='' height='80' style='margin:0px 0px 5px 5px;'>
                                    <?php } } } ?>
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
                gy_name: {
                    required: true,
                    minlength: 2,
                    maxlength: 15
                },
                fz_name: {
                    required: true,
                    minlength: 2,
                    maxlength: 15
                },
                tel: {
                    required: true,
                    digits:true,
                    minlength: 11,
                    maxlength: 11
            },
                qq: {
                    required: true,
                    digits:true,
                    minlength: 6,
                    maxlength: 12
                },
                detail_address: {
                    required: true,
                },
                wchat_nu: {
                    required: true,
                    minlength: 5,
                    maxlength: 30
                },
            },
            messages: {
                gy_name: {
                    required: icon + "请输供应商名称",
                    minlength: icon + "供应商名必须2个字符以上",
                    maxlength: icon + "供应商名必须15个字符以内"
                },
                fz_name: {
                    required: icon + "请输入负责人姓名",
                },
                tel: {
                    required:icon + "请输 入电话号码",
                    digits: icon + "电话号码只能是数字",
                    minlength: icon + "电话号码输入有误",
                    maxlength: icon + "电话号码输入有误"
                },
                qq: {
                    required: icon + "请输入qq号",
                    digits: icon + "qq号码只能是数字",
                    minlength: icon + "qq号码输入有误",
                    maxlength: icon + "qq号码输入有误"
                },
                wchat_nu: {
                    required: icon + "请输入微信号",
                    minlength: icon + "微信号码输入有误",
                    maxlength: icon + "微信号码输入有误"
                },
                detail_address: {
                    required: icon + "请输入详细地址",
                },
            },
            submitHandler: function () {
                // 禁用按钮
                submitBtn.attr({
                    disabled: "disabled"
                }).html("提交中...");
                // 提交表单
                $.ajax({
                    url: "<?php echo Url('/supplier/supplier/add'); ?>",
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

    type_value = $('select[name="gys_type"]').val($('input[name="type_name_text"]').val());
</script>
</body>

</html>

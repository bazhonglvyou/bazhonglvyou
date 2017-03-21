<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:65:"D:\WWW\bazhonglvyou\app\console\scenery\view\scenery\addlist.html";i:1490075725;s:74:"D:\WWW\bazhonglvyou\app\console\scenery\view\..\..\common\view\header.html";i:1489718237;}*/ ?>
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

<link href="/static/css/page.css" rel="stylesheet" type="text/css">
<body class="gray-bg">
<div class="wrapper wrapper-content">
    <div class="col-sm-12">
        <h3 class="pull-left"><?php echo !empty($id)?'修改':'添加'; ?>景点</h3>
        <ol class="breadcrumb pull-right">
            <li>
                <a href="index.html"><i class="fa fa-dashboard"></i> 管理中心</a>
            </li>
            <li>
                景点管理
            </li>
            <li>
                <?php echo !empty($id)?'修改':'增加'; ?>景点
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
                            <label class="col-sm-2 control-label">景点名称：</label>
                            <div class="col-sm-2"><input id="user_name" value="<?php echo isset($lists['scenery_name']) ? $lists['scenery_name'] :  ''; ?>" name="scenery_name" class="form-control" type="text"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">所属供应商：</label>
                            <div class="col-sm-2">
                                <select class="form-control" name="supplier_id" value="<?php echo isset($lists['supplier_id']) ? $lists['supplier_id'] :  ''; ?>">
                                    <?php if(is_array($list_type) || $list_type instanceof \think\Collection || $list_type instanceof \think\Paginator): $i = 0; $__LIST__ = $list_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo $vo['id']; ?>"><?php echo $vo['type_name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">景点地址：</label>
                            <div class="col-sm-3">
                                <input id="product_one_price" name="scennery_address" value="<?php echo isset($lists['scennery_address']) ? $lists['scennery_address'] :  ''; ?>" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">星&nbsp;&nbsp;&nbsp;级：</label>
                            <div class="col-sm-5">
                                <input  type="radio" value="4" name="leverl" <?php echo !empty($lists["leverl"]) && $lists["leverl"]==4?'checked' : ''; ?> style="width: 15px;vertical-align: middle;">
                                <span style="vertical-align: middle;color: #111111">AAAA</span>
                                <input  type="radio" value="3"  name="leverl" <?php echo !empty($lists["leverl"]) && $lists["leverl"]==3?'checked' : ''; ?>  style="width: 15px;vertical-align: middle; margin-left: 16px;">
                                <span style="vertical-align: middle;color: #111111">AAA</span>
                                <input  type="radio" value="2"  name="leverl" <?php echo !empty($lists["leverl"]) && $lists["leverl"]==2?'checked' : ''; ?>  style="width: 15px;vertical-align: middle; margin-left: 16px;">
                                <span style="vertical-align: middle;color: #111111">AA</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">详细地址：</label>
                            <div class="col-sm-4">
                                <input  value="<?php echo isset($lists['detail_address']) ? $lists['detail_address'] :  ''; ?>" name="detail_address" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">库存：</label>
                            <div class="col-sm-1">
                                <input  value="<?php echo isset($lists['stock']) ? $lists['stock'] :  ''; ?>" name="stock" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">缩略图：</label>
                            <div class="col-sm-4">
                                <div class="row">
                                    <div class="col-sm-5"> <input id="file_upload_thumbnail" name="thumbnail" type="file" multiple="true" ></div>
                                    <div class="col-sm-3"> <a class="upload_css_a"  href="javascript:$('#file_upload_thumbnail').uploadify('upload')">预览</a></div>
                                    <div class="col-sm-3"> <a  class="upload_css_a" href="javascript:$('#file_upload_thumbnail').uploadify('upload')">上传</a></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div id="img_thumbnail">
                                            <?php if(isset($lists)): if(is_array($lists['thumbnail'])): if(is_array($lists['thumbnail']) || $lists['thumbnail'] instanceof \think\Collection || $lists['thumbnail'] instanceof \think\Paginator): if( count($lists['thumbnail'])==0 ) : echo "" ;else: foreach($lists['thumbnail'] as $key=>$vo): ?>
                                            <img src="<?php echo $vo; ?>" alt='' height='80' style='margin:10px 0px 5px 5px;'>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                            <input name='thumbnail' type='text' value="<?php echo $lists['thumbnail_input']; ?>" style='display:none;'>
                                            <?php endif; endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">幻灯片：</label>
                            <div class="col-sm-4">
                                <div class="row">
                                    <div class="col-sm-5"> <input id="file_upload_slide" name="slide" type="file" multiple="true" ></div>
                                    <div class="col-sm-3"> <a class="upload_css_a"  href="javascript:$('#file_upload_slide').uploadify('upload')">预览</a></div>
                                    <div class="col-sm-3"> <a class="upload_css_a"  href="javascript:$('#file_upload_slide').uploadify('upload')">上传</a></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div id="img_slide">
                                            <?php if(isset($lists)): if(is_array($lists['slide'])): if(is_array($lists['slide']) || $lists['slide'] instanceof \think\Collection || $lists['slide'] instanceof \think\Paginator): if( count($lists['slide'])==0 ) : echo "" ;else: foreach($lists['slide'] as $key=>$vo): ?>
                                            <img src="<?php echo $vo; ?>" alt='' height='80' style='margin:10px 0px 5px 5px;'>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                            <input name='slide' type='text' value="<?php echo $lists['slide_input']; ?>" style='display:none;'>
                                            <?php endif; endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">首页推荐景点：</label>
                            <div class="col-sm-4">
                                <input class="nan_c" type="radio" <?php echo !empty($lists['index_recommend']) && $lists['index_recommend']==1?'checked' : ''; ?> value="1" name="index_recommend" style="">
                                <span style="vertical-align: middle;color: #111111">是</span>
                                <input  class="nv_c" type="radio" <?php echo !empty($lists['index_recommend']) && $lists['index_recommend']==0?'checked' : ''; ?> value="0"  name="index_recommend" style="margin-left: 16px;">
                                <span style="vertical-align: middle;color: #111111">否</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">首页banner：</label>
                            <div class="col-sm-4">
                                <input class="nan_c" type="radio" <?php echo !empty($lists["index_banner"]) && $lists["index_banner"]==1?'checked' : ''; ?> value="1" name="index_banner" style="">
                                <span style="vertical-align: middle;color: #111111">是</span>
                                <input  class="nv_c" type="radio" <?php echo !empty($lists["index_banner"]) && $lists["index_banner"]==0?'checked' : ''; ?> value="0"  name="index_banner" style="margin-left: 16px;">
                                <span style="vertical-align: middle;color: #111111">否</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">景点关键词：</label>
                            <div class="col-sm-2">
                                <input id="" value="<?php echo isset($lists['key_word']) ? $lists['key_word'] :  ''; ?>" name="key_word" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">开放时间：</label>
                            <div class="col-sm-6">
                                <input  class="sang_Calender" name="start_time" value="<?php echo isset($lists['start_time']) ? $lists['start_time'] :  ''; ?>" style="width: 160px;" placeholder="开始时间">~~
                                <input  class="sang_Calender" name="end_time"  value="<?php echo isset($lists['end_time']) ? $lists['end_time'] :  ''; ?>" style="width: 160px" placeholder="结束时间" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">预定须知：</label>
                            <div class="col-sm-4">
                                 <textarea class="text_area_type"  name="notice">
                                    <?php echo isset($lists['notice']) ? $lists['notice'] :  ''; ?>
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">景点简介：</label>
                            <div class="col-sm-4">
                                 <textarea class="text_area_type" name="brief_introduction">
                                    <?php echo isset($lists['brief_introduction']) ? $lists['brief_introduction'] :  ''; ?>
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">景点详情：</label>
                            <div class="col-sm-4">
                                 <textarea class="text_area_type" name="scenery_detail">
                                        <?php echo isset($lists['scenery_detail']) ? $lists['scenery_detail'] :  ''; ?>
                                </textarea>
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
<script type="text/javascript" src="/extend/date/datetime.js"></script>
<script src="/extend/upload/jquery.uploadify.min.js"></script>
<script src="/static/js/upload.js"></script>
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
                scenery_name: {
                    required: true,
                    minlength: 2,
                    maxlength: 30
                },
                supplier_id: {
                    required: true
                },
                stock: {
                    required: true,
                    digits:true,
                    minlength: 1,
                    maxlength: 10
            },
                key_word: {
                    required: true,
                    minlength: 1,
                    maxlength: 30
                }
            },
            messages: {
                scenery_name: {
                    required: icon + "请输入景点名称名称",
                    minlength: icon + "供应商名必须2个字符以上",
                    maxlength: icon + "供应商名必须30个字符以内"
                },
                supplier_id: {
                    required: icon + "请选择供应商名"
                },
                stock: {
                    required:icon + "请输入库存",
                    digits: icon + "库存只能是数字",
                    minlength: icon + "库存至少有1件",
                    maxlength: icon + "库存不能超过10位数"
                },
                key_word: {
                    required: icon + "请输入关键字",
                    minlength: icon + "关键字至少1位",
                    maxlength: icon + "关键字至多30位"
                }
            },
            submitHandler: function () {
                // 禁用按钮
                submitBtn.attr({
                    disabled: "disabled"
                }).html("提交中...");
                // 提交表单
                $.ajax({
                    url: "<?php echo Url('/scenery/scenery/add'); ?>",
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

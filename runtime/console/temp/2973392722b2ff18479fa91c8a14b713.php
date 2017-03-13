<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:54:"E:\phpStudy\WWW\app\console\user\view\lists\index.html";i:1489367062;s:67:"E:\phpStudy\WWW\app\console\user\view\..\..\common\view\header.html";i:1489043266;}*/ ?>
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
        <h3 class="pull-left">会员管理</h3>
        <ol class="breadcrumb pull-right">
            <li>
                <a href="index.html"><i class="fa fa-dashboard"></i> 管理中心</a>
            </li>
            <li>
                会员管理
            </li>
            <li>
                会员列表
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
                                    <a href="<?php echo Url('user/lists/add','',false,true); ?>" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;创建会员</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>帐号</th>
                                <th>微信昵称</th>
                                <th>微信头像</th>
                                <th>电话</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(empty($userList['list']) || (($userList['list'] instanceof \think\Collection || $userList['list'] instanceof \think\Paginator ) && $userList['list']->isEmpty())): ?>
                                <tr>
                                    <th colspan="6" class="text-center">没有会员记录</th>
                                </tr>
                            <?php else: if(is_array($userList['list']) || $userList['list'] instanceof \think\Collection || $userList['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $userList['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                <tr>
                                    <th><?php echo $v['id']; ?></th>
                                    <th><?php echo $v['user_name']; ?></th>
                                    <th><?php echo $v['nick_name']; ?></th>
                                    <th><?php echo $v['head_img']; ?></th>
                                    <th><?php echo $v['tel']; ?></th>
                                    <th>
                                        <a href="<?php echo Url('user/lists/edit',['id'=>$v['id']],false,true); ?>" class="btn btn-primary btn-xs btn-circle" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="编辑">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="javascript:;" data-id="<?php echo $v['id']; ?>" class="btn btn-warning btn-xs btn-circle delete" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="删除">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </th>
                                </tr>
                                <?php endforeach; endif; else: echo "" ;endif; endif; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 全局js -->
<script src="/static/js/jquery.min.js?v=2.1.4"></script>
<script src="/static/js/bootstrap.min.js?v=3.3.6"></script>
<!-- Data Tables -->
<script src="/static/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="/static/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<!-- layer javascript -->
<script src="/static/js/plugins/layer/layer.min.js"></script>
<script>
    $('.ibox-content').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    });

    // 删除
    $('.delete').on('click', function() {
        var id = $(this).attr("data-id");
        layer.confirm('确定删除该会员？', {
            skin: 'layui-layer-molv',
            icon: 3,
            shadeClose: false,
        }, function(index, layero) {
            $.get("<?php echo Url('/user/lists/del', '', false, true); ?>?id=" + id, function(data,status){
                if (data.code) {
                    layer.msg(data.msg, {icon: 5});
                } else {
                    // 删除成功
                    window.location.reload();
                }
            });
        });
    });
</script>
</body>

</html>

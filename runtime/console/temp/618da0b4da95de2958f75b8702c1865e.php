<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:62:"D:\wamp\www\bazhonglvyou\app\console\menu\view\menu\index.html";i:1489832979;s:76:"D:\wamp\www\bazhonglvyou\app\console\menu\view\..\..\common\view\header.html";i:1489832979;}*/ ?>
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
        <h3 class="pull-left">菜单管理</h3>
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
                                    <a href="<?php echo Url('/menu/menu/create','',false,true); ?>" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;新建菜单</a>
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
                                <th width="8%">ID</th>
                                <th width="8%">排序</th>
                                <th width="59%">菜单名称</th>
                                <th width="10%">状态</th>
                                <th width="15%">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php echo $list; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <button class="btn btn-sm btn-primary btn-outline" type="button">排序</button>
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
        layer.confirm('确定删除该菜单？', {
            skin: 'layui-layer-molv',
            icon: 3,
            shadeClose: false,
        }, function(index, layero) {
            $.get("<?php echo Url('/menu/menu/delete', '', false, true); ?>?id=" + id, function(data,status){
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

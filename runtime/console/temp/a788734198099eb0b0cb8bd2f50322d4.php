<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:62:"D:\wamp\www\bazhonglvyou\app\console\user\view\role\lists.html";i:1489844669;s:76:"D:\wamp\www\bazhonglvyou\app\console\user\view\..\..\common\view\header.html";i:1489832979;}*/ ?>
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
                角色列表
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
                                    <a href="<?php echo Url('user/role/addrole','',false,true); ?>" class="btn btn-primary"><i class="fa fa-plus"></i>添加角色</a>
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
                                <th>角色编号</th>
                                <th>角色名称</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($role) || $role instanceof \think\Collection || $role instanceof \think\Paginator): $i = 0; $__LIST__ = $role;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                            <tr>
                                <td><?php echo $v['role_id']; ?></td>
                                <td><?php echo $v['role_name']; ?></td>
                                <td>
                                    <a href="<?php echo Url('user/role/editrole',['roleid'=>$v['role_id']],false,true); ?>" class="btn btn-primary btn-xs btn-circle" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="修改角色">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="<?php echo Url('user/role/add',['roleid'=>$v['role_id']],false,true); ?>" class="btn btn-primary btn-xs btn-circle" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="为角色添加用户">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                    <a href="<?php echo Url('user/role/look',['roleid'=>$v['role_id']],false,true); ?>" class="btn btn-primary btn-xs btn-circle" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="查看角色具有的用户">
                                        <i class="fa fa-search"></i>
                                    </a>
                                    <a href="<?php echo Url('user/privilege/lists',['roleid'=>$v['role_id']],false,true); ?>" class="btn btn-primary btn-xs btn-circle" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="管理角色权限">
                                        <i class="fa fa-unlock-alt"></i>
                                    </a>
                                    <a class="btn delete btn-warning btn-xs btn-circle" data-roleid="<?php echo $v['role_id']; ?>" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="删除角色">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
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
    $(function(){
        $('.ibox-content').tooltip({
            selector: "[data-toggle=tooltip]",
            container: "body"
        });

        // 删除
        $('.delete').on('click', function () {
            var roleid = $(this).data("roleid");
            layer.confirm('确定删除该角色？', {
                skin: 'layui-layer-molv',
                icon: 3,
                shadeClose: false,
            }, function (index, layero) {
                $.get("<?php echo Url('/user/role/delrole', '', false, true); ?>?roleid=" + roleid, function (data, status) {
                    if (data.code) {
                        layer.msg(data.msg, {icon: 5});
                    } else {
                        // 删除成功
                        window.location.reload();
                    }
                });
            });
        });
    })
</script>
</body>

</html>

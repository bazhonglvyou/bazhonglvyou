<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"D:\phpStudy\WWW\bazhonglvyou\app\console\ticket\view\ticket\lists.html";i:1489929588;s:82:"D:\phpStudy\WWW\bazhonglvyou\app\console\ticket\view\..\..\common\view\header.html";i:1489718237;}*/ ?>
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
        <h3 class="pull-left">门票管理</h3>
        <ol class="breadcrumb pull-right">
            <li>
                <a href="index.html"><i class="fa fa-dashboard"></i> 管理中心</a>
            </li>
            <li>
                门票管理
            </li>
            <li>
                门票列表
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
                                    <a href="<?php echo Url('ticket/ticket/addList'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;新增门票</a>
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
                                <th>票型名称</th>
                                <th>所属供应商</th>
                                <th>供应商类型</th>
                                <th>所属景点</th>
                                <th>产品分类</th>
                                <th>创建时间</th>
                                <th>销售价格</th>
                                <th>原价</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(empty($ticket) || (($ticket instanceof \think\Collection || $ticket instanceof \think\Paginator ) && $ticket->isEmpty())): ?>
                                <tr>
                                    <th colspan="6" class="text-center">没有会员记录</th>
                                </tr>
                            <?php else: if(is_array($ticket) || $ticket instanceof \think\Collection || $ticket instanceof \think\Paginator): $i = 0; $__LIST__ = $ticket;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                <tr>
                                    <th><?php echo $v['id']; ?></th>
                                    <th><?php echo $v['productName']; ?></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th><?php echo $v['productType']; ?></th>
                                    <th><?php echo $v['createTime']; ?></th>
                                    <th><?php echo $v['salePrice']; ?></th>
                                    <th><?php echo $v['onePrice']; ?></th>
                                    <th>
                                        <a href="<?php echo Url('ticket/ticket/addList',['id'=>$v['id']],false,true); ?>" class="btn btn-primary btn-xs btn-circle" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="编辑">
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
    <div style="margin-left: 300px;">
        <!--分页开始-->
        <?php if(($page>=1)): ?>
        <a href="<?php echo url('ticket/ticket/lists',['page'=> 1]); ?>" style="width: 50px;" class="jiantou">首页</a>
        <?php endif; if(($page>1)): ?>
        <a href="<?php echo url('ticket/ticket/lists',['page'=> $page-1]); ?>" class="jiantou"><</a>
        <?php endif; ?>
                    <span>
                        <?php $__FOR_START_11817__=$page-$ye+1;$__FOR_END_11817__=$page;for($i=$__FOR_START_11817__;$i < $__FOR_END_11817__;$i+=1){ if(($i>0)): ?>
                         <a class="page_a_css" href="<?php echo url('ticket/ticket/lists',['page'=> $i]); ?>" style=""><?php echo $i; ?></a>
                        <?php endif; } ?>
                        <a class="page_a_css_select" href="<?php echo url('ticket/ticket/lists',['page'=> $page]); ?>"><?php echo $page; ?></a>
                        <?php $__FOR_START_32688__=$page+1;$__FOR_END_32688__=$page+$ye;for($i=$__FOR_START_32688__;$i < $__FOR_END_32688__;$i+=1){ if(($i<=$maxpage)): ?>
                        <a class="page_a_css" href="<?php echo url('ticket/ticket/lists',['page'=> $i]); ?>"><?php echo $i; ?></a>
                        <?php endif; } ?>
                    </span>
        <?php if(($page<$maxpage)): ?>
        <a href="<?php echo url('ticket/ticket/lists',['page'=> $page+1]); ?>" class="jiantou">></a>
        <?php endif; if(($maxpage>1)): ?>
        <a href="<?php echo url('ticket/ticket/lists',['page'=> $maxpage]); ?>" class="jiantou" style="width: 50px;">尾页</a>
        <?php endif; ?>

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
            $.get("<?php echo Url('/ticket/ticket/del', '', false, true); ?>?id=" + id, function(data,status){
                data = eval('('+data+')');
                if (data.code == 500) {
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

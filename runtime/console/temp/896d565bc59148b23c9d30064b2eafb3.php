<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:68:"D:\phpStudy\WWW\bazhonglvyou\app\console\index\view\index\index.html";i:1489112758;s:81:"D:\phpStudy\WWW\bazhonglvyou\app\console\index\view\..\..\common\view\header.html";i:1489718237;s:85:"D:\phpStudy\WWW\bazhonglvyou\app\console\index\view\..\..\common\view\navigation.html";i:1489112758;s:87:"D:\phpStudy\WWW\bazhonglvyou\app\console\index\view\..\..\common\view\sidebar_left.html";i:1489112758;}*/ ?>
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


<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
<div id="wrapper">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0; border-bottom: 1px solid #2f4050;">
    <div class="navbar-header">
        <div class="nav navbar-left" style="text-align: center; background-color: #2f4050;">
            <div class="profile-element pull-left" style="width: 220px; line-height: 60px;"><img src="static/img/logo.png"></div>
            <div class="logo-element">H+</div>
        </div>
        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary pull-left" href="#"><i class="fa fa-bars"></i></a>
        <ul class="nav navbar-top-links navbar-left" id="J_navbar">
            <!-- <li class="hidden-xs">
                <a class="right-sidebar-toggle" aria-expanded="false">导航示例</a>
            </li> -->
        </ul>
    </div>
    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                <i class="fa fa-envelope"></i> <span class="label label-warning">16</span>
            </a>
            <ul class="dropdown-menu dropdown-messages">
                <li class="m-t-xs">
                    <div class="dropdown-messages-box">
                        <a href="profile.html" class="pull-left">
                            <img alt="image" class="img-circle" src="static/img/a7.jpg">
                        </a>
                        <div class="media-body">
                            <small class="pull-right">46小时前</small>
                            <strong>小四</strong> 这个在日本投降书上签字的军官，建国后一定是个不小的干部吧？
                            <br>
                            <small class="text-muted">3天前 2014.11.8</small>
                        </div>
                    </div>
                </li>
                <li class="divider"></li>
                <li>
                    <div class="dropdown-messages-box">
                        <a href="profile.html" class="pull-left">
                            <img alt="image" class="img-circle" src="static/img/a4.jpg">
                        </a>
                        <div class="media-body ">
                            <small class="pull-right text-navy">25小时前</small>
                            <strong>国民岳父</strong> 如何看待“男子不满自己爱犬被称为狗，刺伤路人”？——这人比犬还凶
                            <br>
                            <small class="text-muted">昨天</small>
                        </div>
                    </div>
                </li>
                <li class="divider"></li>
                <li>
                    <div class="text-center link-block">
                        <a class="J_menuItem" href="mailbox.html">
                            <i class="fa fa-envelope"></i> <strong> 查看所有消息</strong>
                        </a>
                    </div>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                <i class="fa fa-bell"></i> <span class="label label-primary">8</span>
            </a>
            <ul class="dropdown-menu dropdown-alerts">
                <li>
                    <a href="mailbox.html">
                        <div>
                            <i class="fa fa-envelope fa-fw"></i> 您有16条未读消息
                            <span class="pull-right text-muted small">4分钟前</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="profile.html">
                        <div>
                            <i class="fa fa-qq fa-fw"></i> 3条新回复
                            <span class="pull-right text-muted small">12分钟钱</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <div class="text-center link-block">
                        <a class="J_menuItem" href="notifications.html">
                            <strong>查看所有 </strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a aria-expanded="false" role="button" href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user"></i> <?php echo session('admin_user.nickname'); ?>
                <span class="caret"></span>
            </a>
            <ul role="menu" class="dropdown-menu">
                <li><a href=""><i class="fa fa fa-question-circle"></i> 帮助中心</a></li>
                <li><a href=""><i class="fa fa fa-gear"></i> 账号设置</a></li>
                <li><a href="/account/login/out"><i class="fa fa fa-sign-out"></i> 安全退出</a></li>
            </ul>
        </li>
    </ul>
</nav>
 <nav class="navbar-default navbar-static-side" role="navigation">
    <div class="nav-close"><i class="fa fa-times-circle"></i>
    </div>
    <div class="sidebar-collapse">
        <ul class="nav" id="J_sidebar">
        </ul>
    </div>
</nav>

    <!--右侧部分开始-->
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row J_mainContent" id="content-main">
            <iframe class="J_iframe" name="iframe" width="100%" height="100%" src="<?php echo Url('/index/index/main', '', false, true); ?>" frameborder="0" seamless></iframe>
        </div>
    </div>
    <!--右侧部分结束-->
</div>
<!-- 全局js -->
<script src="/static/js/jquery.min.js?v=2.1.4"></script>
<script src="/static/js/bootstrap.min.js?v=3.3.6"></script>

<script src="/static/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="/static/js/plugins/layer/layer.min.js"></script>

<!-- 第三方插件 -->
<script src="/static/js/plugins/pace/pace.min.js"></script>

<script>
    /**
     * 导航菜单
     * @author   liuke <1078151140@qq.com>
     * @datetime 2017-02-08T11:51:31+0800
     */
    var MENU = <?php echo $menu; ?>;

    //一级菜单展示
    $(function() {
        // iframe加载事件
        var J_iframe = $(".J_iframe"),
            contentHeight = 0;
        $(J_iframe.document).ready(function () {
            setHeight();
            J_iframe.show();
        });
        function setHeight(){
            contentHeight = $("body").height() - $(".navbar").height() - 2;
            $("#page-wrapper").height(contentHeight);
        }

        // 文档窗口改变大小时触发
        $(window).on('resize', function () {
            setTimeout(function () {
                setHeight();
            }, 100);
        });

        // 导航渲染
        var navHtml = [];
        $.each(MENU, function(i, o) {
            navHtml.push('<li class="hidden-xs"><a class="right-sidebar-toggle" title="' + o.name + '" data-id="' + o.id + '" aria-expanded="false">' + o.name + '</a></li>');
        });
        $('#J_navbar').html(navHtml.join(''));

        // 导航点击
        $('#J_navbar').on('click', 'a', function(e) {
            e.preventDefault(); // 取消事件的默认动作
            e.stopPropagation(); // 终止事件 不再派发事件
            $(this).parent().addClass('active').siblings().removeClass('active');
            var navbarId = $(this).attr('data-id'),
                sidebarList = MENU['menu_' + navbarId],
                sidebarHtml = [],
                sidebarSubHtml = [],
                sidebarIndex = 0,
                J_sidebar = $('#J_sidebar');
            if (J_sidebar.attr('data-id') == navbarId) {
                return false;
            };

            // 显示左侧菜单
            showSidebar(sidebarList['items']);
            J_sidebar.html(sidebarHtml.join('')).attr('data-id', navbarId);

            function showSidebar(data) {
                for (var attr in data) {
                    if (data[attr] && typeof(data[attr]) === 'object') {
                        // 循环子对象
                        if (!data[attr].url && attr === 'items') {
                            // 子菜单添加识别属性
                            $.each(data[attr], function(i, o) {
                                sidebarIndex++;
                                o.isChild = true;
                                o.sidebarIndex = sidebarIndex;
                            });
                        }
                        showSidebar(data[attr]); // 递归(筛选子菜单)
                    } else {
                        if (attr === 'name') {
                            data.url = data.url ? data.url : 'javascript:;';
                            icon = data.icon ? '<i class="fa fa-' + data.icon + '"></i>' : '<i class="fa fa-circle-o"></i>';
                            if (!(data['isChild'])) {
                                // 一级
                                sidebarHtml.push('<li class="active"><a href="javascript:;" data-id="' + data.id + '">' + icon + '<span class="nav-label">' + data.name + '</span><span class="fa arrow"></span></a>');
                            } else {
                                // 二级
                                sidebarSubHtml.push('<li><a class="J_menuItem" href="' + data.url + '" data-id="' + data.id + '" data-index="0">' + data.name + '</a></li>');
                                // 二级全部push完毕
                                if (data.sidebarIndex == sidebarIndex) {
                                    sidebarHtml.push('<ul class="nav nav-second-level collapse">' + sidebarSubHtml.join('') + '</ul></li>');
                                    sidebarSubHtml = [];
                                }
                            }
                        }
                    }
                }
            };

            // MetsiMenu
            $('#J_sidebar').metisMenu();
        });
        // 默认选中第一个导航
        $('#J_navbar li:first > a').click();

        $('#J_sidebar').on('click', 'a', function(e) {
            e.preventDefault();
            var href = $(this).attr("href");
            if(href != 'javascript:;'){
                J_iframe.attr("src", href);
            }
        });

    });
</script>

<!-- 自定义js -->
<script src="/static/js/hplus.js?v=4.1.0"></script>
<script src="/static/js/plugins/metisMenu/jquery.metisMenu.js"></script>

</body>

</html>

<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"E:\wamp\www\bazhonglvyou\app\console\login\view\login\index.html";i:1488980834;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>飞猫旅行网 - 后台登录</title>
    <meta name="keywords" content="飞猫旅行网">
    <meta name="description" content="飞猫旅行网">
    <link href="/static/css/bootstrap.min.css" rel="stylesheet">
    <link href="/static/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/static/css/animate.css" rel="stylesheet">
    <link href="/static/css/style.css" rel="stylesheet">
    <link href="/static/css/login.css" rel="stylesheet">
</head>

<body class="signin">
<div class="signinpanel">
    <div class="row">
        <div class="col-sm-7">
            <div class="signin-info">
                <div class="logopanel m-b">
                    <h1>[ Fei ]</h1>
                </div>
                <div class="m-b"></div>
                <h4>欢迎使用 <strong>飞猫旅行网后台管理系统</strong></h4>
                <ul class="m-b">
                    <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 优势一</li>
                    <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 优势二</li>
                    <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 优势三</li>
                    <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 优势四</li>
                    <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 优势五</li>
                </ul>
                <strong>还没有账号？ <a href="#">立即注册&raquo;</a></strong>
            </div>
        </div>
        <div class="col-sm-5">
            <form method="post" action="<?php echo Url('/login/login/','',false,true); ?>">
                <h4 class="no-margins">登录：</h4>
                <p class="m-t-md">登录到飞猫旅行网后台</p>
                <input type="text" class="form-control uname" placeholder="用户名" />
                <input type="password" class="form-control pword m-b" placeholder="密码" />
                <a href="">忘记密码了？</a>
                <button class="btn btn-success btn-block">登录</button>
            </form>
        </div>
    </div>
    <div class="signup-footer">
        <div class="pull-left">
            &copy; 2015 All Rights Reserved. H+
        </div>
    </div>
</div>
</body>
</html>

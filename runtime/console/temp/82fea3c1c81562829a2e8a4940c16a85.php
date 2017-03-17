<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"D:\WWW\bazhonglvyou\app\console\supplier\view\supplier\addtypegong.html";i:1489734490;s:75:"D:\WWW\bazhonglvyou\app\console\supplier\view\..\..\common\view\header.html";i:1489718237;}*/ ?>
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

<link href="/static/css/tickt.css" rel="stylesheet" type="text/css">
<body>
<input type="text" name="add_or_update" style="display: none" value="<?php if(isset($_GET['id'])){
    echo $_GET['id'];
}else{
    echo 0;
} ?>">
    <div>
        <div class="div11" style="margin-top: 20px;">
            <p class="p11">分类名称</p><p class="p22"><input type="text" name="type_name"></p>
            <div class="clear"></div>
        </div>
        <div class="div11">
            <p class="p11">排序</p><p class="p22"><input type="text" name="sort"></p>
            <div class="clear"></div>
        </div>
        <div style="margin-top: 40px;">  <input class="upload_botton" id="all_upload"type="submit" value="提交" tabindex="0"  style="margin-left: 200px;"> <input class="upload_botton" id="all_quxiao"type="submit" value="取消" tabindex="0" style="margin-left: 40px;" > </div>
        <div style="height: 60px;"></div>
    </div>
    <script src="/static/js/jquery.min.js?v=2.1.4"></script>
    <script type="text/javascript" src="/public/date/datetime.js"></script>
    <script src="/public/upload/jquery.uploadify.min.js" type="text/javascript"></script>
    <script>
        var id_no = $('input[name="add_or_update"]').val();
        if(id_no == 0){

        }
        else{
            $('input[name="type_name"]').val('<?php if(isset($ticket)){ echo $ticket["type_name"];}?>');
            $('input[name="sort"]').val('<?php if(isset($ticket)){ echo $ticket["sort"];}?>');
        }
    </script>
    <script>
        $('#all_upload').click(function(){
            var type_name = $('input[name="type_name"]').val();
            var sort = $('input[name="sort"]').val();
            var id = $('input[name="add_or_update"]').val();
            $.post('<?php echo url("supplier/supplier/addtypegonggo"); ?>',{'id':id,'type_name':type_name,'sort':sort
            },function(reg){
                if(reg){
                    if(id!=0){
                        alert('更新成功');
                        window.history.go(-1);
                    }
                    else{
                        alert('添加成功');
                        window.history.go(-1);
                    }
                }
                else{
                    alert('添加失败');
                }
            });
        });
    </script>
    <script>
            $('#all_quxiao').click(function(){
                window.history.go(-1);
            });
            $('#all_upload').click(function(){
                setTimeout(function(){
                    var doc = document.getElementById("suolue_tu_iframe").contentDocument;
                    alert(doc);
                },4);
            });
            function sleep(numberMillis) {
                var now = new Date();
                var exitTime = now.getTime() + numberMillis;
                while (true) {
                    now = new Date();
                    if (now.getTime() > exitTime)
                        return;
                }
            }
            $("#yulan").click(function () {
                    var objUrl = getObjectURL(document.getElementById('upload_suolue').files[0]) ; //获取图片的路径，该路径不是图片在本地的路径
                    $('.not_rel_url').val(objUrl);
                    if (objUrl) {
                        $("#pic").attr("src", objUrl) ; //将图片路径存入src中，显示出图片
                    }
            });
            $('#upload_suolue').change(function(){
                var objUrl = getObjectURL(document.getElementById('upload_suolue').files[0]) ; //获取图片的路径，该路径不是图片在本地的路径
                $('.not_rel_url').val(objUrl);
            });
        //建立一個可存取到該file的url
        function getObjectURL(file) {
            var url = null ;
            if (window.createObjectURL!=undefined) { // basic
                url = window.createObjectURL(file) ;
            } else if (window.URL!=undefined) { // mozilla(firefox)
                url = window.URL.createObjectURL(file) ;
            } else if (window.webkitURL!=undefined) { // webkit or chrome
                url = window.webkitURL.createObjectURL(file) ;
            }
            return url ;
        }
    </script>
</body>
</html>
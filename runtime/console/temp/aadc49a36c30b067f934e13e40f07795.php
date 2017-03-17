<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:67:"D:\WWW\bazhonglvyou\app\console\supplier\view\supplier\addgong.html";i:1489735287;s:75:"D:\WWW\bazhonglvyou\app\console\supplier\view\..\..\common\view\header.html";i:1489718237;}*/ ?>
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
            <p class="p11">供应商名称</p><p class="p22"><input type="text" name="gy_name"></p>
            <div class="clear"></div>
        </div>
        <div class="div11">
            <p class="p11">供应商类型</p><p class="p22">
            <select type="text" name="type" >
                <?php foreach($gongtype as $key => $value){?>
                <option  value="<?php echo $value['id']?>"><?php echo $value['type_name']?></option>
              <?php } ?>
            </select>
        </p>
            <div class="clear"></div>
        </div>
        <div class="div11">
            <p class="p11">负责人姓名</p><p class="p22"><input type="text" name="fz_name"></p>
            <div class="clear"></div>
        </div>
        <div class="div11">
            <p class="p11">性别</p>
            <p class="p22" style="vertical-align: middle;">
                    <input class="nan_c" type="radio" value="1" name="sex" style="width: 15px;vertical-align: middle;">
                    <span style="vertical-align: middle;color: #111111">男</span>
                    <input  class="nv_c" type="radio" value="2"  name="sex" style="width: 15px;vertical-align: middle; margin-left: 16px;">
                    <span style="vertical-align: middle;color: #111111">女</span>
                <input  class="no_c" type="radio" value="3"  name="sex" style="width: 15px;vertical-align: middle; margin-left: 16px;">
                <span style="vertical-align: middle;color: #111111">保密</span>
            </p>
            <div class="clear"></div>
        </div>
        <div class="div11">
            <p class="p11">联系电话</p><p class="p22"><input type="text" name="tel"></p>
            <div class="clear"></div>
        </div>
        <div class="div11">
            <p class="p11">联系qq</p><p class="p22"><input type="text" name="qq"></p>
            <div class="clear"></div>
        </div>
        <div class="div11">
            <p class="p11">微信号</p><p class="p22"><input type="text" name="wchat_nu"></p>
            <div class="clear"></div>
        </div>
        <div class="div11">
            <p class="p11">详细地址</p><p class="p22"><input type="text" name="detail_address"></p>
            <div class="clear"></div>
        </div>
        <div class="div11">
            <p class="p11">营业执照</p>
            <div class="p22" style="height: 140px;">
                <input id="file_upload1" name="file_upload" type="file" multiple="true" style="width: 185px; height: 25px;opacity:0;position: absolute;margin-top:12px;vertical-align: middle;" >
                <div id="img_yulan1">
                    <?php if(isset($ticket)){if(is_array($ticket['yy_url'])){
                            foreach($ticket['yy_url'] as $key => $value){
                     ?>
                    <img src="<?php echo $value?>" alt='' height='80' style='margin:0px 0px 5px 5px;'>
                    <?php } } } ?>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div style="margin-top: 40px;">  <input class="upload_botton" id="all_upload"type="submit" value="提交" tabindex="0"  style="margin-left: 200px;"> <input class="upload_botton" id="all_quxiao"type="submit" value="取消" tabindex="0" style="margin-left: 40px;" > </div>
        <div style="height: 60px;"></div>
    </div>
    <script src="/static/js/jquery.min.js?v=2.1.4"></script>
    <script type="text/javascript" src="/public/date/datetime.js"></script>
    <script src="/public/upload/jquery.uploadify.min.js" type="text/javascript"></script>
<script>
    var yy_url = Array();
    $(function() {
        $('#file_upload1').uploadify({
        <?php $timestamp = time();?>
        'formData'     : {
            'timestamp' : '<?php echo $timestamp;?>',
                    'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
        },
        'swf'      : '/public/upload/uploadify.swf',
                'uploader' : '/public/upload/uploadify.php',
                'buttonImage':'/static/img/u31.png' ,
                'height':50,
                'width':50,
                'onUploadSuccess' : function(file, data, response) {
            $('#img_yulan1').append("<img src='" + data + "' alt='' height='80' style='margin:30px 5px 5px 5px;'>");
            yy_url.push(data);
        }
    });
    });
</script>
    <script>
        var id_no = $('input[name="add_or_update"]').val();
        if(id_no == 0){

        }
        else{
            $('input[name="gy_name"]').val('<?php if(isset($ticket)){ echo $ticket["gy_name"];}?>');
            $('input[name="fz_name"]').val('<?php if(isset($ticket)){ echo $ticket["fz_name"];}?>');
            $('select[name="type"]').val('<?php if(isset($ticket)){ echo $ticket["type"];}?>');
            $('input[name="tel"]').val('<?php if(isset($ticket)){ echo $ticket["tel"];}?>');
            $('input[name="qq"]').val('<?php if(isset($ticket)){ echo $ticket["qq"];}?>');
            $('input[name="wchat_nu"]').val('<?php if(isset($ticket)){ echo $ticket["wchat_nu"];}?>');
            $('input[name="detail_address"]').val('<?php if(isset($ticket)){echo $ticket["detail_address"];}?>');
            if('<?php if(isset($ticket)){ $ticket["sex"] == 1;}?>'){
                document.getElementsByClassName("nan_c")[0].checked= true;
            }
            else if('<?php if(isset($ticket)){ $ticket["sex"] == 2;}?>'){
                document.getElementsByClassName("nv_c")[0].checked= true;
            }
            else{
                document.getElementsByClassName("no_c")[0].checked= true;
            }
        }
    </script>
    <script>
        $('#all_upload').click(function(){
            var type = $('select[name="type"]').val();
            var gy_name = $('input[name="gy_name"]').val();
            var fz_name = $('input[name="fz_name"]').val();
            var sex = $('input[name="sex"]').filter(":checked").val();
            var tel = $('input[name="tel"]').val();
            var qq = $('input[name="qq"]').val();
            var wchat_nu = $('input[name="wchat_nu"]').val();
            var detail_address = $('input[name="detail_address"]').val();
            var id = $('input[name="add_or_update"]').val();
            $.post('<?php echo url("supplier/supplier/addgonggo"); ?>',{'id':id,'gy_name':gy_name,'type':type,'fz_name':fz_name,'sex':sex,'tel':tel,'qq':qq,
                'wchat_nu':wchat_nu,'detail_address':detail_address,'yy_url':yy_url
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
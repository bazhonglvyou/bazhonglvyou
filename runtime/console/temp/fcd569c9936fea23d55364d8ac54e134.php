<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:66:"D:\WWW\bazhonglvyou\app\console\ticket\view\ticket\addjindian.html";i:1489629823;s:73:"D:\WWW\bazhonglvyou\app\console\ticket\view\..\..\common\view\header.html";i:1489112758;}*/ ?>
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

<link href="/static/css/tickt.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/public/upload/uploadify.css">
<body>
<input type="text" name="add_or_update" style="display: none" value="<?php if(isset($_GET['id'])){
    echo $_GET['id'];
}else{
    echo 0;
} ?>">
    <div>
        <div class="div11" style="margin-top: 20px;">
            <p class="p11">景点名称</p><p class="p22"><input type="text" name="product_name"></p>
            <div class="clear"></div>
        </div>
        <div class="div11">
            <p class="p11">所属供应商</p><p class="p22">
                <select type="text" name="product_type">
                    <option selected="" value="ticket">门票</option>
                    <option value="hotel">酒店</option>
                    <option value="specialty">特产</option>
                    <option value="route">旅游线路</option>
                </select>
            </p>
            <div class="clear"></div>
        </div>
        <div class="div11">
            <p class="p11">景点地址</p><p class="p22"><input type="text" name="product_one_price"></p>
            <div class="clear"></div>
        </div>
        <div class="div11">
            <p class="p11">星&nbsp;&nbsp;&nbsp;级</p>
            <p class="p22" style="vertical-align: middle;">
                    <input  type="radio" value="4" name="if_sale" style="width: 15px;vertical-align: middle;">
                    <span style="vertical-align: middle;color: #111111">AAAA</span>
                    <input  type="radio" value="3"  name="if_sale" style="width: 15px;vertical-align: middle; margin-left: 16px;">
                    <span style="vertical-align: middle;color: #111111">AAA</span>
                    <input  type="radio" value="2"  name="if_sale" style="width: 15px;vertical-align: middle; margin-left: 16px;">
                    <span style="vertical-align: middle;color: #111111">AA</span>
            </p>
            <div class="clear"></div>
        </div>
        <div class="div11">
            <p class="p11">详细地址</p><p class="p22"><input type="text" name="detail_address"></p>
            <div class="clear"></div>
        </div>
        <div>
            <p class="p11">库存</p><p class="p22"><input type="text" name="product_num" style="width: 75px;"></p>
            <div class="clear"></div>
        </div>
        <div class="div11">
            <p class="p11">缩略图</p>
            <div class="p22" style="height: 100px;">
                <input id="file_upload1" name="file_upload" type="file" multiple="true" style="width: 185px; height: 25px;opacity:0;position: absolute;margin-top:12px;vertical-align: middle;" >
                <div id="img_yulan1"></div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="div11" style="margin-top: 38px;">
            <p class="p11">内页幻灯片</p>
            <div class="p22" style="height: 130px;">
                <input id="file_upload" name="file_upload" type="file" multiple="true" style="width: 185px; height: 25px;opacity:0;position: absolute;margin-top:12px;vertical-align: middle;" >
                <div id="img_yulan"></div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="div11">
            <p class="p11">首页推荐景区</p>
            <p class="p22" style="vertical-align: middle;">
                <input  type="radio" value="1" name="if_tuijian" style="width: 15px;vertical-align: middle;">
                <span style="vertical-align: middle;color: #111111">是</span>
                <input  type="radio" value="0"  name="if_tuijian" style="width: 15px;vertical-align: middle; margin-left: 16px;">
                <span style="vertical-align: middle;color: #111111">否</span>
            </p>
            <div class="clear"></div>
        </div>
        <div>
            <p class="p11">首页banner</p>
            <p class="p22" style="vertical-align: middle;">
                <input  type="radio" value="1" name="if_banner" style="width: 15px;vertical-align: middle;">
                <span style="vertical-align: middle;color: #111111">是</span>
                <input  type="radio" value="0"  name="if_banner" style="width: 15px;vertical-align: middle; margin-left: 16px;">
                <span style="vertical-align: middle;color: #111111">否</span>
            </p>
            <div class="clear"></div>
        </div>
        <div class="div11">
            <p class="p11">景点关键词</p><p class="p22"><input type="text" name="guanjianci" placeholder="多个关键词，用“，”分隔开"></p>
            <div class="clear"></div>
        </div>
        <div class="div11">
            <p class="p11">开放时间</p>
            <p class="p22">
                <input  class="sang_Calender" name="start_time" style="width: 160px;" placeholder="开始时间">
                <input  class="sang_Calender" name="end_time" style="width: 160px; margin-left: 60px;" placeholder="结束时间" >
            </p>
            <div class="clear"></div>
        </div>

        <div class="div11">
            <p class="p11">预定须知</p>
            <div class="p22" style="height: auto;">
                <textarea class="text_area_type" name="yudingxuzhi">

                </textarea>
            </div>
            <div class="clear"></div>
        </div>
        <div class="div11">
            <p class="p11">景点简介</p>
            <div class="p22" style="height: auto;">
                <textarea class="text_area_type" name="menpiaojianjie">

                </textarea>
            </div>
            <div class="clear"></div>
        </div>
        <div class="div11">
            <p class="p11">景点详情</p>
            <div class="p22" style="height: auto;">
                <textarea class="text_area_type" name="menpiaoxiangqing">

                </textarea>
            </div>
            <div class="clear"></div>
        </div>
        <div style="margin-top: 40px;">  <input class="upload_botton" id="all_upload"type="submit" value="提交" tabindex="0"  style="margin-left: 200px;"> <input class="upload_botton" id="all_quxiao"type="submit" value="取消" tabindex="0" style="margin-left: 40px;" > </div>
        <div style="height: 60px;"></div>
    </div>
    <script src="/static/js/jquery.min.js?v=2.1.4"></script>
    <script type="text/javascript" src="/public/date/datetime.js"></script>
    <script src="/public/upload/jquery.uploadify.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        var huandengpian = Array();
        var suoluetu =Array();
        $(function() {
            $('#file_upload').uploadify({
            <?php $timestamp = time();?>
                'formData'     : {
                    'timestamp' : '<?php echo $timestamp;?>',
                    'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
                },
                'swf'      : '/public/upload/uploadify.swf',
                'uploader' : '/public/upload/uploadify.php',
                'onUploadSuccess' : function(file, data, response) {
                $('#img_yulan').append("<img src='" + data + "' alt='' height='80' style='margin:0px 0px 5px 5px;'>");
                    huandengpian.push(data);
                }
            });
        });
    </script>
    <script>
        $(function() {
            $('#file_upload1').uploadify({
            <?php $timestamp = time();?>
            'formData'     : {
                'timestamp' : '<?php echo $timestamp;?>',
                        'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
            },
            'swf'      : '/public/upload/uploadify.swf',
                    'uploader' : '/public/upload/uploadify.php',
                    'onUploadSuccess' : function(file, data, response) {
                $('#img_yulan1').append("<img src='" + data + "' alt='' height='80' style='margin:0px 0px 5px 5px;'>");
                suoluetu.push(data);
            }
        });
        });
    </script>
    <script>
        $('#all_upload').click(function(){
            var product_name = $('input[name="product_name"]').val();
            var product_type = $('select[name="product_type"]').val();
            var product_one_price = $('input[name="product_one_price"]').val();
            var is_sale = $('input[name="if_sale"]').filter(":checked").val();
            var product_price = $('input[name="product_price"]').val();
            var product_address = $('input[name="product_address"]').val();
            var start_time = $('input[name="start_time"]').val();
            var end_time = $('input[name="end_time"]').val();
            var detail_address = $('input[name="detail_address"]').val();
            var product_num = $('input[name="product_num"]').val();
            var if_tuijian = $('input[name="if_tuijian"]').filter(":checked").val();
            var if_banner = $('input[name="if_banner"]').filter(":checked").val();
            var guanjianci = $('input[name="guanjianci"]').val();
            var yudingxuzhi = $('textarea[name="yudingxuzhi"]').val();
            var menpiaojianjie = $('textarea[name="menpiaojianjie"]').val();
            var menpiaoxiangqing = $('textarea[name="menpiaoxiangqing"]').val();
            var id = $('input[name="add_or_update"]').val();
            $.post('<?php echo url("ticket/ticket/add"); ?>',{'id':id,'productName':product_name,'productType':product_type,'onePrice':product_one_price,'statu':is_sale,'salePrice':product_price,'ticketAddress':product_address,
                'startTime':start_time,'endTime':end_time,'detailAddress':detail_address,'stock':product_num,'thumbnail':suoluetu,'Slide':huandengpian,'indexRecommend':if_tuijian,'indexBanner':if_banner,'keyWord':guanjianci,
                'notice':yudingxuzhi,'introduction':menpiaojianjie,'detail':menpiaoxiangqing
            },function(reg){
                if(reg){
                    alert('添加成功');
                    window.location.go(-1);
                }
                else{

                }
            });
        });
    </script>
    <script>
            $('#all_quxiao').click();
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
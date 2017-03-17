<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:61:"D:\WWW\bazhonglvyou\app\console\ticket\view\ticket\lists.html";i:1489721138;s:73:"D:\WWW\bazhonglvyou\app\console\ticket\view\..\..\common\view\header.html";i:1489718237;}*/ ?>
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
    <div class="">
        <div style="margin-left: 10px; margin-top: 20px;">
            <input class="upload_botton list_ye_head" id="create_ticket" type="submit" value="创建门票" >
            <input class="upload_botton list_ye_head" id="upload_ticket" type="submit" value="跟新" >
            <input class="upload_botton list_ye_head" id="delete_ticket" type="submit" value="删除" >
            <input class="upload_botton list_ye_head"  type="submit" value="查看详情" >
            <input id="shousuo" type="search" placeholder="请输入关键字搜索" data-label="搜索框">
            <img id="u270_img" class="img " src="/static/img/u270.png" style=" width: 19px;height: 22px; margin-left: 10px;">
            <span style="color:  #aaaaaa; cursor: pointer" id="select_ticket">搜索</span>
        </div>
        <div style="margin-left: 10px; margin-top: 6px;">
            <table class="ticket_table">
                <tr>
                    <td style="background: #009dd9; height: 84px;width: 87px; border: 1px #666666 solid;">
                        <input class="allcheck" name="all_check" datacheck ='no' type="checkbox" style="margin-left: 6px; height: 14px; width: 14px;vertical-align: middle; ">
                        <span style="margin-left: 10px; color: #000000;font-size: 13px; width: 50px; display: inline-block; height: 40px;vertical-align: middle; margin-top: 22px;">全选/反选</span>
                    </td>
                    <td style="background: #009dd9; height: 84px;min-width: 152px; text-align: center;color: #000000;font-size: 14px; border: 1px #666666 solid;">票型名称</td>
                    <td style="background: #009dd9; height: 84px;min-width: 76px; text-align: center;color: #000000;font-size: 14px; border: 1px #666666 solid;">所属供应商</td>
                    <td style="background: #009dd9; height: 84px;min-width: 149px; text-align: center;color: #000000;font-size: 14px; border: 1px #666666 solid;">供应商类型</td>
                    <td style="background: #009dd9; height: 84px;min-width: 81px; text-align: center;color: #000000;font-size: 14px; border: 1px #666666 solid;">所属景点</td>
                    <td style="background: #009dd9; height: 84px;min-width: 93px; text-align: center;color: #000000;font-size: 14px; border: 1px #666666 solid;">产品分类</td>
                    <td style="background: #009dd9; height: 84px;min-width: 95px; text-align: center;color: #000000;font-size: 14px; border: 1px #666666 solid;">创建时间</td>
                    <td style="background: #009dd9; height: 84px;min-width: 123px; text-align: center;color: #000000;font-size: 14px; border: 1px #666666 solid;">销售价格</td>
                    <td style="background: #009dd9; height: 84px;min-width: 123px; text-align: center;color: #000000;font-size: 14px; border: 1px #666666 solid;">原价</td>
                </tr>
                <?php foreach($ticket as $key => $value){?>
                <tr>
                    <td style="height: 36px;border: 1px #666666 solid; text-align: center; font-size: 14px;"> <input class="onecheck" dataid="<?php echo $value['id'] ?>" datacheck = 'no' type="checkbox" style="height: 14px; width: 14px;vertical-align: middle; "></td>
                    <td style="height: 36px;border: 1px #666666 solid; text-align: center; font-size: 14px; color: #333333;"><?php echo $value['productName']?></td>
                    <td style="height: 36px;border: 1px #666666 solid; text-align: center; font-size: 14px; color: #333333;"></td>
                    <td style="height: 36px;border: 1px #666666 solid; text-align: center; font-size: 14px; color: #333333;"></td>
                    <td style="height: 36px;border: 1px #666666 solid; text-align: center; font-size: 14px; color: #333333;"></td>
                    <td style="height: 36px;border: 1px #666666 solid; text-align: center; font-size: 14px; color: #333333;"><?php if($value['productType'] == 1){echo '门票'; }
                    if($value['productType'] == 2){echo '酒店'; }if($value['productType'] == 3){echo '特产'; }if($value['productType'] == 4){echo '旅游路线'; }
                    ?></td>
                    <td style="height: 36px;border: 1px #666666 solid; text-align: center; font-size: 14px; color: #333333;"><?php echo $value['createTime']?></td>
                    <td style="height: 36px;border: 1px #666666 solid; text-align: center; font-size: 14px; color: #333333;"><?php echo $value['salePrice']?></td>
                    <td style="height: 36px;border: 1px #666666 solid; text-align: center; font-size: 14px; color: #333333;"><?php echo $value['onePrice']?></td>
                </tr>
                <?php } ?>
            </table>
            <div style="margin-top: 60px;">
                <div style="margin-left: 300px;">
                    <!--分页开始-->
                    <?php if($page>=1) {?>
                    <a href="<?php echo url('ticket/ticket/lists',['page'=> 1]); ?>" style="width: 50px;" class="jiantou">首页</a>
                    <?php } if($page>1) {?>
                    <a href="<?php echo url('ticket/ticket/lists',['page'=> $page-1]); ?>" class="jiantou"><</a>
                    <?php } ?>
                    <span>
                        <?php for($i = $page-$ye+1;$i<$page;$i++) { if($i>0){ ?>
                         <a href="<?php echo url('ticket/ticket/lists',['page'=> $i]); ?>" style="display: inline-block; height: 20px; cursor: pointer; width: 26px; line-height: 20px;text-align: center; color: #333333;"><?php echo $i?></a>
                        <?php } } ?>
                         <a href="<?php echo url('ticket/ticket/lists',['page'=> $page]); ?>" style="display: inline-block; height: 20px; background: #009DDA; cursor: pointer;width: 26px; line-height: 20px;text-align: center;color: #ffffff "><?php echo $page ?></a>
                        <?php for($i = $page+1;$i<$page+$ye;$i++) {
                            if($i<=$maxpage){ ?>
                         <a href="<?php echo url('ticket/ticket/lists',['page'=> $i]); ?>" style="display: inline-block; height: 20px;cursor: pointer; width: 26px; line-height: 20px;text-align: center;color: #333333;"><?php echo $i?></a>
                        <?php } } ?>
                    </span>
                    <?php if ($page<$maxpage) { ?>
                        <a href="<?php echo url('ticket/ticket/lists',['page'=> $page+1]); ?>" class="jiantou">></a>
                    <?php } if ($maxpage>1) {?>
                    <a href="<?php echo url('ticket/ticket/lists',['page'=> $maxpage]); ?>" class="jiantou" style="width: 50px;">尾页</a>
                    <?php } ?>
                </div>
            </div>
       </div>
    </div>
    <script src="/static/js/jquery.min.js?v=2.1.4"></script>
    <script>
        $('#delete_ticket').click(function(){
            var idlist = Array();
            $('.onecheck').each(function(){
                if($(this).attr('datacheck') == 'yes'){
                    idlist.push($(this).attr('dataid'));
                }
            });
            if(idlist.length<0){
                alert('你至少需要选择一个ticket');
            }
            else{
                $.post('<?php echo url("ticket/ticket/del"); ?>',{'listid':idlist},function(reg) {
                    alert('删除成功');
                    window.location.reload()
                    /*$('.onecheck').each(function(){
                        if($(this).attr('datacheck') == 'yes'){
                            $(this).parents('tr').remove();
                        }
                    });*/
                });
            }

        });
        //.全选或者单选
        $('.allcheck').click(function(){
            if($(this).attr('datacheck') == "no"){
                $(this).attr('datacheck','yes');
                var el = document.getElementsByClassName('onecheck');
                var len = el.length;
                for(var i=0; i<len; i++){
                    el[i].checked = true;
                    el[i].setAttribute('datacheck','yes');
                }
            }
            else{
                $(this).attr('datacheck','no');
                var el = document.getElementsByClassName('onecheck');
                var len = el.length;
                for(var i=0; i<len; i++){
                    el[i].checked = false;
                    el[i].setAttribute('datacheck','no');
                }
            }
            selectone();
        });
        $('.onecheck').click(function(){
            if($(this).attr('datacheck') == "no"){
                $(this).attr('datacheck','yes');

            }
            else {
                $(this).attr('datacheck', 'no');
            }
            selectone();
        });
        function selectone(){
            var len = $('.onecheck').length;
            var alllen = 0;
            $('.onecheck').each(function(){
                if($(this).attr('datacheck') == 'yes'){
                    alllen++;
                }
            });
            if(alllen == len){
                $('.allcheck').attr('datacheck','yes');
                document.getElementsByClassName("allcheck")[0].checked= true;
            }
            else{
                $('.allcheck').attr('datacheck','no');
                document.getElementsByClassName("allcheck")[0].checked= false;
            }
        }
    </script>
    <script>
        $('#create_ticket').click(
                function(){
                    location.href = '<?php echo url("ticket/ticket/addticket"); ?>';
                }
        );
        $('#upload_ticket').click(function(){
            var idlist = Array();
            $('.onecheck').each(function(){
                if($(this).attr('datacheck') == 'yes'){
                    idlist.push($(this).attr('dataid'));
                }
            });
            if(idlist.length ==0){
                alert('你需要选择一个ticket');
            }
            else if(idlist.length>1){
                alert('一次只能修改一个');
            }
            else{
                location.href = 'addticket?id='+idlist[0];
            }
        });
        $('#select_ticket').click(
                function(){
                    var value = $('#shousuo').val();
                    if(value){
                        location.href = 'selectgong?value='+value;
                    }
                }
        );
    </script>
</body>
</html>
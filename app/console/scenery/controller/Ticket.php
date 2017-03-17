<?php
namespace app\console\ticket\controller;

use app\api\common\controller\Base;
use app\api\ticket\logic\Lists as listsApi;
use think\Request;
use think\Db;
/**
 * 门票模块
 * Created by PhpStorm.
 * User: yanghuan
 * Date: 2017/3/8
 * Time: 21:58
 */
class Ticket extends Base
{
    /**
     * 门票列表
     * author: yanghuan
     * date:2017/3/8 22:17
     */
    public function lists()
    {
        //每一页显示的数据条数
        $pagesize = 2;
        //当前可以显示的条数为($ye-1)*2+1
        $ye = 6;
        //查找总共有多少条数据
        $all = Db::table('fm_ticket')->count();
        //算出总共有多少你页
        $maxpage = ceil($all/$pagesize);
        //获取当前页数
        $page = 1;
        if(!isset($_GET['page'])){

        }
        else{
            $page = $_GET['page'];
        }
        if($page <= 1){
            $page = 1;
        }
        else if($page>=$maxpage){
            $page = $maxpage;
        }
        else{
            $page = $_GET['page'];
        }
        if($maxpage==0){
            $maxpage =1;
        }
        $this->assign('page',$page);
        $this->assign('ye',$ye);
        $this->assign('maxpage',$maxpage);
        //分页结束
        $ticket = new listsApi();
        $this->assign('ticket',$ticket->getPage($page,$pagesize));
        return $this->fetch();
    }
    public function addjindian(){
        return $this->fetch();
    }
    public function addticket(){
        if(isset($_GET['id'])){
            $ticket = new listsApi();
            $this->assign('ticket',$ticket->get_one_ticket($_GET['id']));
            $this->assign('id',$_GET['id']);
            return $this->fetch();
        }
        else{
            return $this->fetch();
        }
    }
    public function add(){
        $ticket = new listsApi();
        if($ticket->add()){
            return 1;
        }
        return 0;
    }
    public function del(){
        $id = $_POST['listid'];
        $ticket = new listsApi();
        $ticket->del($id);

    }
    public function select_detail(){

    }
    public function select_like(){

    }
    public function upload(Request $request){
        $targetFolder = "/public/uploads/"; // Relative to the root
        if (!empty($_FILES)) {
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
            $name = md5(uniqid().'fsfgd'.time());
            $targetFile = rtrim($targetPath,'/') . '/' .$name.$_FILES['Filedata']['name'];
        // Validate the file type
            $fileTypes = array('jpg','jpeg','gif','png'); // File extensions
            $fileParts = pathinfo($_FILES['Filedata']['name']);
            if (in_array($fileParts['extension'],$fileTypes)) {
                move_uploaded_file($tempFile,$targetFile);
                return '/public/uploads/'.$name.$_FILES['Filedata']['name'];
            } else {
                echo '0';
            }
        }
    }
    public function selectgong(){
        $value = $_GET['value'];
        $ticket = Db::table('fm_ticket')
            ->where('productName','like',"%$value%")
            ->whereOr('salePrice','like',"%$value%")
            ->select();
        foreach($ticket as $key => $value){
            //$ticket[$key]['supplier'] = M('newsimage')->where(array('id' => $value['supplierId']))->select();
            //$ticket[$key]['ScenicSpot'] = M('newsimage')->where(array('id' => $value['ScenicSpotId']))->select();
        }
        $this->assign('ticket',$ticket);
        $this->assign('page',1);
        $this->assign('maxpage',1);
        $this->assign('ye',1);
        return $this->fetch('lists');
    }
}
<?php
namespace app\console\supplier\controller;

use app\api\common\controller\Base;
use think\Request;
use think\Db;
/**
 * 门票模块
 * Created by PhpStorm.
 * User: yanghuan
 * Date: 2017/3/8
 * Time: 21:58
 */
class Supplier extends Base
{
    public function gonglist(){
        //每一页显示的数据条数
        $pagesize = 1;
        //当前可以显示的条数为($ye-1)*2+1
        $ye = 3;
        //查找总共有多少条数据
        $all = Db::table('fm_gys')->count();
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
        $ticket =  Db::table('fm_gys')->order(array('createTime'  => 'desc' ))->limit(($page-1)*$pagesize,$pagesize)->select();
        foreach($ticket as $key => $value){
            $data = Db::table('fm_gysfl')->where(array('id' => $value['type']))->find();
            $ticket[$key]['gys_type'] = $data['type_name'];
            //$ticket[$key]['ScenicSpot'] = M('newsimage')->where(array('id' => $value['ScenicSpotId']))->select();
        }
        $this->assign('gonglist',$ticket);
        return $this->fetch();

    }
    public function addgong(){
        if(isset($_GET['id'])){
            $ticket =  Db::table('fm_gys')->where(array('id' => $_GET['id']))->find();
            if(($ticket['yy_url'])){
                $ticket['yy_url'] = unserialize($ticket['yy_url']);
            }
            else{

            }
            $this->assign('ticket',$ticket);
            $this->assign('id',$_GET['id']);
            $this->assign('gongtype',Db::table('fm_gysfl')->select());
            return $this->fetch();
        }
        else{
            $this->assign('gongtype',Db::table('fm_gysfl')->select());
            return $this->fetch();
        }
    }
    public function addgonggo(){
        $url = 0;
        if(isset($_POST['yy_url'])){
            $url = serialize($_POST['yy_url']);
        }
        else{

        }
        $data = array(
            'type' => $_POST['type'],
            'gy_name' => $_POST['gy_name'],
            'fz_name' => $_POST['fz_name'],
            'sex' => $_POST['sex'],
            'tel' => $_POST['tel'],
            'qq' => $_POST['qq'],
            'wchat_nu' => $_POST['wchat_nu'],
            'detail_address' => $_POST['detail_address'],
            'yy_url' => $url,
            'createTime' => date('Y-m-d H:i:s')
        );
        if($id = $_POST['id']){
            if(Db::table('fm_gys')->where(array('id' => $id ))->update($data)){
                return 1;
            }
        }
        else{
            if(Db::table('fm_gys')->insert($data)){
                return 1;
            }
        }
        return 0;
    }
    public function delgong(){
        $id = $_POST['listid'];
        foreach($id as $key => $value){
            Db::table('fm_gys')->where(array('id' => $value))->delete();
        }
        return 1;
    }
    public function selectgong(){
        $value = $_GET['value'];
        $ticket = Db::table('fm_gys')
            ->where('gy_name','like',"%$value%")
            ->whereOr('fz_name','like',"%$value%")
            ->whereOr('sex','like',"%$value%")
            ->whereOr('tel','like',"%$value%")
            ->whereOr('qq','like',"%$value%")
            ->select();
        foreach($ticket as $key => $value){
            //$ticket[$key]['supplier'] = M('newsimage')->where(array('id' => $value['supplierId']))->select();
            //$ticket[$key]['ScenicSpot'] = M('newsimage')->where(array('id' => $value['ScenicSpotId']))->select();
        }
        $this->assign('gonglist',$ticket);
        $this->assign('page',1);
        $this->assign('maxpage',1);
        $this->assign('ye',1);
        return $this->fetch('gonglist');
    }
    public function gongtypelist(){
        //每一页显示的数据条数
        $pagesize = 1;
        //当前可以显示的条数为($ye-1)*2+1
        $ye = 3;
        //查找总共有多少条数据
        $all = Db::table('fm_gysfl')->count();
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
        $ticket =  Db::table('fm_gysfl')->order(array('createTime'  => 'desc' ))->limit(($page-1)*$pagesize,$pagesize)->select();
        foreach($ticket as $key => $value){
            //$ticket[$key]['supplier'] = M('newsimage')->where(array('id' => $value['supplierId']))->select();
            //$ticket[$key]['ScenicSpot'] = M('newsimage')->where(array('id' => $value['ScenicSpotId']))->select();
        }
        $this->assign('gongtypelist',$ticket);
        return $this->fetch();
    }
    public function addtypegong(){
        if(isset($_GET['id'])){
            $ticket =  Db::table('fm_gysfl')->where(array('id' => $_GET['id']))->find();
            $this->assign('ticket',$ticket);
            $this->assign('id',$_GET['id']);
            return $this->fetch();
        }
        else{
            return $this->fetch();
        }
    }
    public function addtypegonggo(){
        $url = 0;
        $data = array(
            'type_name' => $_POST['type_name'],
            'sort' => $_POST['sort'],
            'createTime' => date('Y-m-d H:i:s')
        );
        if($id = $_POST['id']){
            if(Db::table('fm_gysfl')->where(array('id' => $id ))->update($data)){
                return 1;
            }
        }
        else{
            if(Db::table('fm_gysfl')->insert($data)){
                return 1;
            }
        }
        return 0;
    }
    public function deltypegong(){
        $id = $_POST['listid'];
        foreach($id as $key => $value){
            Db::table('fm_gysfl')->where(array('id' => $value))->delete();
        }
        return 1;
    }
}
<?php
namespace app\index\controller;

use think\Controller;
use think\Db;

class Index extends controller
{   //添加页面
    public function index()
    {
       return view('add');
    }
    //添加入库
    public function insert(){
    	$data=request()->post();
    	$res=Db::table('marathon_registration')->insert($data);
    	if($res){
              $this->success('新增成功', 'index/show');
    	}else{
             $this->error('新增失败');
    	}
  }
   //展示页面
    public function show(){
    	$list = Db::name('marathon_registration')->paginate(3);
     // 把分页数据赋值给模板变量list
        $this->assign('list', $list);
     // 渲染模板输出
         return $this->fetch();
    }
    //审核页面
    public function shen(){
    	$id=request()->get('id');
    	$list=Db::table('marathon_registration')->where("id=$id")->find();
    	return $this->fetch('shen',['list'=>$list]);
    }

    public function save(){
    	$data=request()->post();
    	$res=Db::table('marathon_registration')->update($data);
    	if($res){
              $this->success('提交成功', 'index/show');
    	}else{
             $this->error('提交失败');
    	}

 }





}

<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;
class  Body extends Controller{
    public function index(){
        $res=db('user')->paginate(3);
//        var_dump($res);
        $this->assign('ids',$res);

        $req=db('body')->select();
        $this->assign('body',$req);
        return view('basictable');
        //return 'admin tp';
    }
    public function add(Request $req){
//        dump($req);
//        exit;
        if ($req->isPost()){
            $data=$req->post();
            $postTime=$updateTime=date('Y-m-d H:i:s');
            $data=array_merge($data,array('postTime'=>$postTime,'updateTime'=>$updateTime));
            $res=db('body')->insert($data);
            if ($res){
                $this->success('发布成功',url('index/index'));
            }else{
                $this->error('发布失败',url('body/add'));
            }
        }
        return view('add');
    }
    public function delete(Request $req){
        if ($req->isGet()){
            $num=$req->param('num');
            $res=db('body')->where('num',$num)->delete();
            if ($res){
                $this->success('删除成功',url('index/index'));

            }else{
                $this->error('删除失败',url('index/index'));
            }
        }
    }
    public function editartice(Request $req){
//        var_dump($req);
//        exit;
        $res=db('user')->select();
//        var_dump($res);
        $this->assign('ids',$res);

        $ret=db('body')->select();
        $this->assign('body',$ret);

        if($req->isGet()){
            $num=$req->param('num');
            $row=db('body')->where('num',$num)->find();
            $this->assign('body',$row);
        }
        if ($req->isPost()){
            $data=$req->post();
            $updateTime=date('Y-m-d H:i:s');
            $data=array_merge($data,array('updateTime'=>$updateTime));
            $res=db('body')->where('num',$data['num'])->update($data);
//            var_dump($res);
            if ($res){
                $this->success('更新成功',url ('index/index'));

            }else{
                $this->error('更新失败',url('body/add'));
            }
        }
        return view('basictable');
    }
}
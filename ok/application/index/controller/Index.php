<?php
namespace app\index\controller;
use app\index\controller\Base;

use think\Controller;
use think\Request;
use think\File;
class Index extends Base
{
    public function index()
    {
        $req=db('body')->paginate(3);
        $this->assign('body',$req);
        $rep=db('body')->paginate(2);
        $this->assign('body2',$rep);
        $rep=db('body')->paginate(5);
        $this->assign('body3',$rep);
        return view('index');

    }
    public function index1()
    {
        $req=db('body')->paginate(3);
        $this->assign('body',$req);
        $rep=db('body')->paginate(2);
        $this->assign('body2',$rep);
        $rep=db('body')->paginate(5);
        $this->assign('body3',$rep);
       return view('index1');

    }
    public function add(Request $req){
//        dump($req->post());
//        exit;
        $res=db('user')->select();
//        var_dump($res);
        $this->assign('ids',$res);
        $ref=db('body')->select();
        $this->assign('body',$ref);
        if ($req->isPost()){
            $data=$req->post();
            $postTime=$updateTime=date('Y-m-d H:i:s');
            $data=array_merge($data,array('postTime'=>$postTime,'updateTime'=>$updateTime));
            $res=db('body')->insert($data);
            if ($res){
                $this->success('发布成功',url('index/mainthing'));
            }else{
                $this->error('发布失败',url('index/write'));
            }
        }
        return view('mainthing');
    }
    public function write(Request $req){
//        dump($req->post());
//        exit;
        $res=db('user')->select();
//        var_dump($res);
        $this->assign('ids',$res);
        $ref=db('body')->select();
        $this->assign('body',$ref);
        if ($req->isPost()){
            $data=$req->post();
            $postTime=$updateTime=date('Y-m-d H:i:s');
            $data=array_merge($data,array('postTime'=>$postTime,'updateTime'=>$updateTime));
            $res=db('body')->insert($data);
            if ($res){
                $this->success('发布成功',url('index/mainthing'));
            }else{
                $this->error('发布失败',url('index/write'));
            }
        }
        return view('write');
    }
    // 文件上传
    public function uploads(){
        // 获取表单上传文件
        $files = request()->file('file');
        foreach($files as $file){
            // 移动到框架应用根目录/public/uploads/ 目录下
            $name=iconv('utf-8','gbk',$file->getInfo()[
                'name']);
            $info = $file->move('public/uploads',$name);
            if($info){
                // 成功上传后 获取上传信息
                // 输出 jpg
                echo $info->getExtension();
                // 输出 文件名
                echo $info->getFilename();
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
            $data = [
                ['uploadfile' => $info->getFilename()]
            ];
            $db = db('uploadfile') -> insertAll($data);
        }
        return $this -> success('文件上传成功','thing');
    }

    public function skip(){
        return view('login');
    }

    public function bodyindex(){
        return view('bodyindex');
    }
    public function upload(){
        return view('upload');
    }
    public function focuspeople(){
        $req=db('user')->select();
        $this->assign('user',$req);

        return view('focuspeople');
    }
    public function mainthing(){
        $req=db('body')->paginate(2);
        $this->assign('body',$req);

        return view('mainthing');
    }
    public function thing2(){
        $req=db('body')->where('num',3)->select();
        $this->assign('body',$req);
        $rep=db('body')->where('num',4)->select();
        $this->assign('body2',$rep);
        return view('thing2');
    }
    public function thing(){
        return view('thing');
    }
public function focus(){
    $req=db('user')->select();
    $this->assign('user',$req);
    if ($req->isPost()){
        $data=$req->post();
        $res=db('focuspeople')->insert($data);
        if ($res){
            $this->success('关注成功',url('index/focuspeople'));
        }else{
            $this->error('关注失败',url('index/focuspeople'));
        }
    }
}
    public function com(Request $req){

        if ($req->isPost()){
            $data=$req->post();
            $res=db('com')->insert($data);
            if ($res){
                $this->success('留言成功',url('index/mainthing'));
            }else{
                $this->error('留言失败',url('index/mainthing'));
            }
        }
    }

}

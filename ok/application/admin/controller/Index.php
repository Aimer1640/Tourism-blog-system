<?php
namespace app\admin\controller;
use think\Request;
use think\Controller;

class Index extends Controller
{
    public function index(){
        $res=db('user')->select();
//        var_dump($res);
        $this->assign('ids',$res);

        $req=db('body')->paginate(3);
        $this->assign('body',$req);

        $ret=db('com')->select();
        $this->assign('com',$ret);

        return view('login');
        //return 'admin tp';
    }
    public function login()
    {

        return view();
        //return 'admin tp';
    }

    public function basictable()
    {
        $res=db('user')->select();
//        var_dump($res);
        $this->assign('ids',$res);

        $req=db('body')->paginate(3);
        $this->assign('body',$req);

        $ret=db('com')->select();
        $this->assign('com',$ret);
        return view();
        //return 'admin tp';
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
                $this->success('发布成功',url('index/basictable'));
            }else{
                $this->error('发布失败',url('index/basictable'));
            }
        }
        return view('add');
    }
    public function delete(Request $req){
        if ($req->isGet()){
            $num=$req->param('num');
            $res=db('body')->where('num',$num)->delete();
            if ($res){
                $this->success('删除成功',url('index/basictable'));

            }else{
                $this->error('删除失败',url('index/basictable'));
            }
        }
    }
    public function deletes(Request $req){
        if ($req->isPost()){
            $nums=$req->post();

            $nums=implode(',',$nums['numarr']);//降维
            $res=db('body')->where("num in ($nums)")->delete();
            if ($res){
                $this->success('批量删除成功',url('index/basictable'));
            }else{
                $this->error('批量删除失败',url('index/basictable'));
            }
        }
    }
    public function editartice(Request $req){
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
            var_dump($res);
            if ($res){
                $this->success('更新成功',url ('index/basictable'));
            }else{
                $this->error('更新失败',url('index/basictable'));
            }
        }

        return view('edit');
    }
    public function lst()
    {
        $selfattribute_select = db("selfattribute")->paginate(5);
        $this->assign("self",$selfattribute_select);
        if (request()->isAjax()) {
            return view("paginate1");
        } else {
            return view();
        }
    }


    public function fenye(){
        //获取总条数
        $list =db('user')->select();
        $count=count($list);
        //获取每页显示的条数
        $limit= Request::instance()->param('limit');
        //获取当前页数
        $page= Request::instance()->param('page');
        //计算出从那条开始查询
        $tol=($page-1)*$limit+1;
        // 查询出当前页数显示的数据
        $list = db('user')->where("id",">=","$tol")->limit("$limit")->select();
        //返回数据
        return ["count"=>$count,"data"=>$list];
    }



    public function chartchartjs()
    {

        return view();
        //return 'admin tp';
    }
    public function profile()
    {

        return view();
        //return 'admin tp';
    }
    public function formcomponent()
    {
        $res=db('user')->select();
//        var_dump($res);
        $this->assign('ids',$res);

        $req=db('body')->paginate(3);
        $this->assign('body',$req);
        return view();
        //return 'admin tp';
    }

    public function carousels()
    {

        return view();
        //return 'admin tp';
    }

}
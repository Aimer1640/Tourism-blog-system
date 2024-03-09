<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use app\admin\model\User as UserModel;
use think\Session;
use think\Request;
class User extends Base{

    public function login(){
        $this->autoLogin();

        return view();
    }
    public function logout(){
        Session::delete('userId');
        Session::delete('username');
        $this->success('您已退出登录',url('user/login'));
    }

    public function newuser(Request $req){
        if ($req->isPost()){
            $data=$req->post();
            $res=db('user')->insert($data);
            if ($res){
                $this->success('注册成功',url('index/basictable'));
            }else{
                $this->error('注册失败',url('index/basictable'));
            }
        }
        return view('newuser');
    }
    public function checklogin(){
        if (request()->isPost()){
            $data=request()->post();
//            dump($data);
//            exit;
            $rule=[
                'username'=>'require',
                'password'=>'require',
                'verify'=>'require|captcha'
            ];
            $msg=[
                'username'=>['require'=>'用户名不能为空，请重新输入'],
                'password'=>['require'=>'密码不能为空，请重新输入'],
                'verify'=>[
                    'require'=>'验证码不能为空，请重新输入',
                    'captcha'=>'验证码输入错误，请重新输入'
                ]

            ];
            $res=$this->validate($data,$rule);
            if ($res!==true){
                echo '<script>alert("'.$res.'");window.location.href="login";</script>';
            }else{
                $map=[
                    'username'=>$data['username'],
                    'password'=>$data['password']
                ];
                $user=UserModel::get($map);

                if ($user==null){
                    $this->error('账号或密码错误，请重新输入');
                }else{
                    Session::set('userId',$user['id']);
                    Session::set('username',$user['username']);
                    $this->success('欢迎登陆',url('admin/index/basictable'));

                }

            }
        }
    }
}
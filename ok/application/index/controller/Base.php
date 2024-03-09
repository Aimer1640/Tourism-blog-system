<?php
namespace app\index\controller;
use think\Controller;
use think\Session;

class Base extends Controller{
    protected function _initialize()
    {
        define('USER_ID',Session::get('userId'));

    }
    protected function isLogin(){
        if (empty(USER_ID)){
            $this->error('请先登录',url('user/login'));
        }
    }
    protected function autoLogin(){
        if (!empty(USER_ID)){
            $this->success('用户已登录',url('index/index1'));
        }
    }
}
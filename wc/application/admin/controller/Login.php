<?php
namespace app\admin\controller;
use think\Controller;
//use think\Db;
//use app\admin\model\Links as LinksModel;
use app\admin\model\Admin;

class Login extends Controller
{
    public function  index()
    {
        if (request()->isPost()){
            $admin=new Admin();
            $data=input('post.');
            $sum=$admin->login($data);
            if  ($sum==3){
                $this->success("信息正确,正在为您跳转...",'index/index');
            }elseif ($sum==4){
                $this->error("验证码错误");
            }
            else{
                $this->error("用户名或者密码错误");
            }
        }
        return $this->fetch('login');

    }


}

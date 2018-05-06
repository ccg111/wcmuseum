<?php
namespace app\admin\controller;
use think\Controller;


class Base extends Controller
{

    //初始化方法，进入管理系统前先要验证身份
    public function _initialize()
    {
        if (！session('username')){
            $this->error('请先登录系统',admin/login);

        }

    }
}

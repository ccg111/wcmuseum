<?php
namespace app\index\controller;
use think\Controller;
use think\Db;

class Intrmuse extends Controller
{
    public function intrmuse()
    {
        $articleres=Db::name('article')->where(['cateid'=>2,'classid'=>3])->select();
        $this->assign('articleres',$articleres);

       return $this->fetch('intrmuse');

    }
}

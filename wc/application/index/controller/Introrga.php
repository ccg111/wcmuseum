<?php
namespace app\index\controller;
use think\Controller;
use think\Db;

class Introrga extends Controller
{
    public function introrga()
    {
        $articleres=Db::name('article')->where(['cateid'=>2,'classid'=>5])->select();
        $this->assign('articleres',$articleres);
       return $this->fetch('introrga');

    }
}

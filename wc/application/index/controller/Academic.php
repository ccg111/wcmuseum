<?php
namespace app\index\controller;
use think\Controller;
use think\Db;

class Academic extends Controller
{
    public function academic()
    {
//        $exhibs=Db::name('articles')->select();
//        $this->assign('articles',$articles);
       return $this->fetch('academic');

    }
}

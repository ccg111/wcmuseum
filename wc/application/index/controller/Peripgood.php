<?php
namespace app\index\controller;
use think\Controller;
use think\Db;

class Peripgood extends Controller
{
    public function peripgood()
    {
//        $perips=Db::name(perip)->select();
//        $this->assign('perips',$perips);
       return $this->fetch('peripgood');

    }
}

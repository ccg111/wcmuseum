<?php
namespace app\index\controller;
use think\Controller;
use think\Db;

class Exhibtemp extends Controller
{
    public function exhibtemp()
    {

        $exhibs=Db::name('exhib')->select();
        $this->assign('exhibs',$exhibs);
       return $this->fetch('exhibtemp');

    }
}

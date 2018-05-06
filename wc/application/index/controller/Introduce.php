<?php
namespace app\index\controller;
use think\Controller;
use think\Db;

class Introduce extends Controller
{
    public function introduce()
    {

        $articleres=Db::name('article')->where(['cateid'=>2,'classid'=>3])->select();
        $this->assign('articleres',$articleres);

        $events=Db::name('article')->where(['cateid'=>2,'classid'=>4])->select();
        $this->assign('events',$events);

        $develops=Db::name('article')->where(['cateid'=>2,'classid'=>6])->select();
        $this->assign('develops',$develops);

       return $this->fetch('introduce');

    }
}

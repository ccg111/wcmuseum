<?php
namespace app\index\controller;
use think\Controller;
use think\Db;

class Actirecep extends Controller
{
    public function actirecep()
    {

        //查询当前栏目下的文章
//        $articleres=Db::name('article')->where([['cateid',2],['classid',4]])->select();
        $articleres=Db::name('article')->where(['cateid'=>4,'classid'=>13])->select();
//        $articleres=Db::name('article')->where('classid',4)->select();

        $this->assign('articleres',$articleres);

        return $this->fetch('actirecep');

    }
}

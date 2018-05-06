<?php
namespace app\index\controller;
use think\Controller;
use think\Db;

class Acadspeech extends Controller
{
    public function acadspeech()
    {

        //查询当前栏目下的文章
//        $articleres=Db::name('article')->where([['cateid',2],['classid',4]])->select();
        $articleres=Db::name('article')->where(['cateid'=>6,'classid'=>21])->select();
//        $articleres=Db::name('article')->where('classid',4)->select();

        $this->assign('articleres',$articleres);

        return $this->fetch('acadspeech');

    }
}

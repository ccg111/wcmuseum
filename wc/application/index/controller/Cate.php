<?php
namespace app\index\controller;
use think\Controller;
use think\Db;

class Cate extends Controller
{
    public function index()
    {
        $cateid=input('cateid');

        //查询当前栏目名称
        $cates=Db::name('cate')->find($cateid);
        $this->assign('cates',$cates);

        //查询当前栏目下的文章
        $articleres=Db::name('article')->where(array('cateid'=>$cateid))->select();
        $this->assign('articleres',$articleres);
        return $this->fetch('cate');

    }
}

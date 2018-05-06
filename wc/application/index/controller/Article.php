<?php
namespace app\index\controller;
use think\Controller;
use think\Db;

class Article extends Controller
{
    public function article()
    {
        //通过文章id来查找栏目id
        $arid=input('arid');
        $articles=Db::name('article')->find($arid);
//        Db::name('article')->where('id',$arid)->setInc('click',1);
//        dump(Db::name('article')->getLastSql());
        $cates=Db::name('cate')->find($articles['cateid']);
        $classes=Db::name('classes')->find($articles['classid']);
//        Db::name('article')->where('id',$arid)->setInc('click',1);

        $this->assign(array(
            'articles'=>$articles,
            'cates'=>$cates,
            'classes'=>$classes,

            )
        );

        return $this->fetch('article');

    }
}

<?php
namespace app\index\controller;
use think\Controller;
use think\Db;

class Message extends Controller
{
    public function message()
    {
        $news=Db::name('article')->where(['cateid'=>3,'classid'=>7])->select();
        $this->assign('news',$news);

        $medias=Db::name('article')->where(['cateid'=>3,'classid'=>8])->select();
        $this->assign('medias',$medias);

        $partys=Db::name('article')->where(['cateid'=>3,'classid'=>9])->select();
        $this->assign('partys',$partys);

        $notices=Db::name('article')->where(['cateid'=>3,'classid'=>10])->select();
        $this->assign('notices',$notices);
       return $this->fetch('message');

    }
}

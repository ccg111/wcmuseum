<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use app\admin\model\Exhib as ExhibModel;

class Exhib extends Controller
{
    public function lst()
    {
//        $list = ArticleModel::paginate(8);
        $list=ExhibModel::paginate(8);
        $this->assign('list',$list);

        return $this->fetch();

    }

    public function add()
    {
        if (request()->isPost()){

//            dump($_POST);die;

            $data=[
                'title'=>input('title'),
                'desc'=>input('desc'),
                'content'=>input('content'),

            ];

            //上传缩略图文件
            if ($_FILES['pic']['tmp_name']){
                $file = request()->file('pic');
                $info = $file->move(ROOT_PATH . 'public' . DS . 'static/uploads');
//                dump($info);
                $data['pic']='/uploads/'.$info->getSaveName();
            }


            $validate = \think\Loader::validate('Exhib');

            if(!$validate->scene('add')->check($data)){
//                dump($validate->getError());
                $this->error($validate->getError());die;
            }

            if (Db::name('exhib')->insert($data)){
                return $this->success('添加展览成功!','lst');
            }else{
                return $this->error('添加展览失败!');
            }

            return;
        }
        //引用两个表
        $cateres=Db::name('cate')->select();
        $this->assign('cateres',$cateres);

        $classes=Db::name('classes')->select();
        $this->assign('classes',$classes);

        return $this->fetch();

    }

    public function edit(){
        //获取到了数据
        $id = input('id');
        //命名为articles
        $Exhibs=(Db::name('exhib')->find($id));
        if (request()->isPost()){
            $data = [
                'id'=>input('id'),
                'title'=>input('title'),
                'desc'=>input('desc'),
                'content'=>input('content'),
            ];

            if ($_FILES['pic']['tmp_name']){
//                @unlink(SITE_URL.'/public/static'.$Articles['pic']);
                $file = request()->file('pic');
                $info = $file->move(ROOT_PATH . 'public' . DS . 'static/uploads');
//                dump($info);
                $data['pic']='/uploads/'.$info->getSaveName();
            }

            $validate = \think\Loader::validate('Exhib');
            if(!$validate->scene('edit')->check($data)){
//                dump($validate->getError());
                $this->error($validate->getError());die;
            }

            if(Db::name('exhib')->update($data)){
                $this->success('修改展览内容成功!','lst');
            }else{
                $this->error('修改展览内容失败!');
            }

            return;
        }
        //分配到模板当中
        $this->assign('Exhibs',$Exhibs);
//        dump();die;
        $cateres=Db::name('cate')->select();
        $this->assign('cateres',$cateres);

        $classes=Db::name('classes')->select();
        $this->assign('classes',$classes);
        return $this->fetch();
    }




    public function del(){
        $id = input('id');
            if (Db::name('exhib')->delete(input('id'))) {
                $this->success('删除展览成功！', 'lst');
            } else {
                $this->error('删除展览失败！');
            }
        }



}

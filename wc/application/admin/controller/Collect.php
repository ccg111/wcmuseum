<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use app\admin\model\Collect as CollectModel;

class Collect extends Controller
{
    public function lst()
    {
//        $list = ArticleModel::paginate(8);
        $list=CollectModel::paginate(8);
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
                'classid'=>input('classid'),

            ];

            //上传缩略图文件
            if ($_FILES['pic']['tmp_name']){
                $file = request()->file('pic');
                $info = $file->move(ROOT_PATH . 'public' . DS . 'static/uploads');
//                dump($info);
                $data['pic']='/uploads/'.$info->getSaveName();
            }


            $validate = \think\Loader::validate('Collect');

            if(!$validate->scene('add')->check($data)){
//                dump($validate->getError());
                $this->error($validate->getError());die;
            }

            if (Db::name('collect')->insert($data)){
                return $this->success('添加藏品成功!','lst');
            }else{
                return $this->error('添加藏品失败!');
            }

            return;
        }
        //引用colcla表

        $colclaes=Db::name('colcla')->select();
        $this->assign('colclaes',$colclaes);

        return $this->fetch();

    }

    public function edit(){
        //获取到了数据
        $id = input('id');
        //命名为articles
        $Collects=(Db::name('collect')->find($id));
        if (request()->isPost()){
            $data = [
                'id'=>input('id'),
                'title'=>input('title'),
                'classid'=>input('classid'),

            ];

            if ($_FILES['pic']['tmp_name']){
//                @unlink(SITE_URL.'/public/static'.$Articles['pic']);
                $file = request()->file('pic');
                $info = $file->move(ROOT_PATH . 'public' . DS . 'static/uploads');
//                dump($info);
                $data['pic']='/uploads/'.$info->getSaveName();
            }

            $validate = \think\Loader::validate('Collect');
            if(!$validate->scene('edit')->check($data)){
//                dump($validate->getError());
                $this->error($validate->getError());die;
            }

            if(Db::name('collect')->update($data)){
                $this->success('修改藏品内容成功!','lst');
            }else{
                $this->error('修改藏品内容失败!');
            }

            return;
        }
        //分配到模板当中
        $this->assign('Collects',$Collects);
//        dump();die;
        $colclaes=Db::name('colcla')->select();
        $this->assign('colclaes',$colclaes);


    }




    public function del(){
        $id = input('id');
            if (Db::name('collect')->delete(input('id'))) {
                $this->success('删除藏品成功！', 'lst');
            } else {
                $this->error('删除藏品失败！');
            }
        }



}

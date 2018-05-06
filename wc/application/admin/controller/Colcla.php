<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use app\admin\model\Colcla as ColclaModel;

class Colcla extends Controller
{
    public function lst()
    {
        $list = ColclaModel::paginate(3);
        $this->assign('list',$list);
        return $this->fetch();

    }

    public function add()
    {
        if (request()->isPost()){


            $data=[
                'username'=>input('username'),
                'password'=>input('password'),
            ];


            $validate = \think\Loader::validate('Cate');

            if(!$validate->scene('add')->check($data)){
//                dump($validate->getError());
                $this->error($validate->getError());die;
            }

            if (Db::name('cate')->insert($data)){
                return $this->success('添加管理员成功!','lst');
            }else{
                return $this->error('添加管理员失败!');
            }

            return;
        }
        return $this->fetch();

    }

    public function edit(){
        $id = input('id');
        $admins=(Db::name('cate')->find($id));
        if (request()->isPost()){
            $data = [
                'id'=>input('id'),
                'username'=>input('username'),

            ];
//当获取的密码为空的时候则保留原来的密码，如果有修改则为修改密码，$data为修改之后的数组，$admins为原来的数组
            if (input('password')){
                $data['password']=md5(input('password'));
            }else{
                $data['password']=$admins['password'];
            }

            $validate = \think\Loader::validate('Cate');
            if(!$validate->scene('edit')->check($data)){
//                dump($validate->getError());
                $this->error($validate->getError());die;
            }

            if(Db::name('cate')->update($data)){
                $this->success('修改管理员信息成功!','lst');
            }else{
                $this->error('修改管理员信息失败!');
            }

            return;
        }

        $this->assign('cates',$cates);
//        dump();die;
        return $this->fetch();
    }




    public function del(){
        $id = input('id');
        //初始化管理员不删除
        if ($id!=1) {
            if (Db::name('cate')->delete(input('id'))) {
                $this->success('删除管理员成功！', 'lst');
            } else {
                $this->error('删除管理员失败！');
            }
        }else{
            $this->error('初始化管理员不能删除！');
        }
    }


}

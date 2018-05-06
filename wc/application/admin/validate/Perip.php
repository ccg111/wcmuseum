<?php
namespace app\admin\validate;
use think\Validate;


class Perip extends Validate
{
    protected $rule = [
        'title'  =>  'require|max:25',
        'desc' =>  'require',
//        'classid' =>  'require',
//        'content' =>  'require',
    ];

    protected $message  =   [
        'title.require' => '请填写文章标题',
        'desc.require' => '请填写介绍',
//        'classid.require' => '请选择所属分类',
        'title.max' => '文章标题长度不得大于25位',
//        'password.require' => '请填写管理员密码',
    ];

    protected $scene = [
        'add'  =>  ['title'=>'require|max:25','desc'=>'require'],
        'edit'  =>  ['title'=>'require|max:25','desc'],
    ];

}

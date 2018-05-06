<?php
namespace app\admin\validate;
use think\Validate;


class Admin extends Validate
{
    protected $rule = [
        'username'  =>  'require|max:25|unique:admin',
        'password' =>  'require',
    ];

    protected $message  =   [
        'username.require' => '请填写管理员名称',
        'username.max' => '管理员名称长度不得大于25位',
        'password.require' => '请填写管理员密码',
        'username.unique' => '管理员名称不得重复',
    ];

    protected $scene = [
        'add'  =>  ['username'=>'require|max:25|unique:admin','password'],
        'edit'  =>  ['username'=>'require|max:25'],
    ];

}

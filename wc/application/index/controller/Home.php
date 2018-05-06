<?php
namespace app\index\controller;
use think\Controller;

class Home extends Controller
{
    public function home()
    {
       return $this->fetch('home');

    }
}

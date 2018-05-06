<?php
namespace app\index\controller;
use think\Controller;

class Exhibper extends Controller
{
    public function exhibper()
    {
       return $this->fetch('exhibper');

    }
}

<?php
namespace app\index\controller;
use think\Controller;

class Actvolun extends Controller
{
    public function actvolun()
    {
       return $this->fetch('actvolun');

    }
}

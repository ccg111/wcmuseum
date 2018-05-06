<?php
namespace app\index\controller;
use think\Controller;

class Intrevent extends Controller
{
    public function intrevent()
    {
       return $this->fetch('intrevent');

    }
}

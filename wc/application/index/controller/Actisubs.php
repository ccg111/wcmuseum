<?php
namespace app\index\controller;
use think\Controller;

class Actisubs extends Controller
{
    public function actisubs()
    {
       return $this->fetch('actisubs');

    }
}

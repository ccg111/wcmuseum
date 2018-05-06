<?php
namespace app\index\controller;
use think\Controller;

class Peripstat extends Controller
{
    public function peripstat()
    {
       return $this->fetch('peripstat');

    }
}

<?php
namespace app\index\controller;
use think\Controller;

class Collection extends Controller
{
    public function collection()
    {
       return $this->fetch('collection');

    }
}

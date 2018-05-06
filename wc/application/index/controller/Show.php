<?php
namespace app\index\controller;
use think\Controller;
//use think\Db;
header("Access-Control-Allow-Origin: http://127.0.0.1");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

class Show extends Controller
{
    public function show()
    {

        return $this->fetch('show');

    }




}

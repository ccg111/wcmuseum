<?php
namespace app\admin\model;
use think\Model;


class Collect extends Model
{
    public function colcla(){
        return $this->belongsTo('colcla','classid');
    }


    public function classes(){
        return $this->belongsTo('classes','classid');
    }




}

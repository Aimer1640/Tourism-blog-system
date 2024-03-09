<?php
namespace app\admin\model;
use think\Model;
class body extends Model{
    public function selectBody($num){
        return $this->get($num);

    }

}
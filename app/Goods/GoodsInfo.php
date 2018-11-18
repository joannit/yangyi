<?php

namespace App\Goods;

use Illuminate\Database\Eloquent\Model;

class GoodsInfo extends Model
{
    //关联数据表商品详情
    protected $table = 'goodsinfo';
    // 自增id
    protected $primaryKey="id";
    // 该模型是否被自动维护时间戳
    public $timestamps = false;
    // 可以被批量赋值的属性。
    protected $fillable = ['store','colorid','discount','gid','udis','gprice','sizeid','status'];

    // 绑定颜色
    public function getColoridAttribute($value){
    $colorid=[1=>"红色",2=>"蓝色",3=>"深蓝色",4=>"黄色",5=>"绿色",6=>"灰色",7=>"白色",8=>"浅绿色",9=>"荧光绿"];
    return $colorid[$value];
    }
    // 绑定规格
    public function getSizeidAttribute($value){
    $sizeid=[1=>"xxxl",2=>"xxl",3=>"xl",4=>"l",5=>"m",6=>"s",7=>"36",8=>"37",9=>"38",10=>"39",11=>"40",12=>"41",13=>"42",14=>"43",15=>"44",16=>"45"];
    return $sizeid[$value];
    }


    //获取与用户关联的颜色信息(1对多)
    public function color(){

    return $this->hasOne('App\Goods\Color','colorid');
    }

    //获取与用户关联的规格信息(1对多)
    public function size(){

    return $this->hasOne('App\Goods\Size','sizeid');
    }
}

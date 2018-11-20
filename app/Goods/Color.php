<?php

namespace App\Goods;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    //
     //关联数据表商品详情
    protected $table = 'color';
    // 自增id
    protected $primaryKey="id";
    // 该模型是否被自动维护时间戳
    public $timestamps = false;
    // 可以被批量赋值的属性。
    protected $fillable = ['cname'];
}

<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //定义与模型关联的数据表
    protected $table="user_info";
    //主键
    protected $primaryKey="id";
    //设置是否需要自动维护时间戳 created_at updated_at
    public $timestamps =true;
    // 可以被批量赋值的属性
    protected $fillable = ['name','sex','birthday','uid','pic'];

}

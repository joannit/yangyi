<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class TypeController extends Controller
{
    public function index(Request $request)
    {
        dd($request->all());
        $type = DB::table('type')->where('pid','=',$id)->get();
        // dd($type);
        if(count($type)>0){
        $pid=[];
        $pid[] = $id;
        foreach ($type as $key => $value) {
            $pid[] = $value->id;
        }
        $typeid = join(",",$pid);
        // dd($typeid) ;
        $list = DB::select("select * from goods where typeid in ($typeid)");
        }else{
            $list = DB::select("select * from goods where typeid = $id");
        }
        // // 加载分类页
        // dd($list);
        // 爆款推荐
        $tops = DB::select("select * from goods order by sales desc limit 10");
        return view('Home.Type.type',['list'=>$list,'type'=>$type,'tops'=>$tops]);
    }
}

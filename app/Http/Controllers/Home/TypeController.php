<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 搜索商品    
        $k = $request->keywords;
        $list = DB::table('goods')->where('name','like','%'.$k.'%')->get();
        // dd($list);
        // 爆款推荐
        $tops = DB::select("select * from goods order by sales desc limit 10");
         return view('Home.Type.type',['list'=>$list,'tops'=>$tops]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 按商品分类显示
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
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

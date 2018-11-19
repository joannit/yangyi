<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
// 商品详情模型
use App\Goods\GoodsInfo;
// 颜色模型
use App\Goods\Color;
// 添加商品详情的表单验证
use App\Http\Requests\Goods\Goodsinfoadd;

// 修改商品信息验证
use App\Http\Requests\Goods\Goodsinfoedit;


class GoodsInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // 商品详情首页
    public function index(Request $request)
    {


        $id=$request->input('id');
        $name=$request->input('name');
        $data=GoodsInfo::where('gid','=',$id)->get();
        // dd($data);
        return view('Admin.GoodsInfo.index',['data'=>$data,'name'=>$name,'gid'=>$id]);



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 添加商品详情
    public function create(Request $request)
    {
        $name=$request->input('name');
        // dd($name);
       $gid=$request->input('gid');
       // dd($name,$gid);
       $color=DB::table('color')->get();
       $size=DB::table('size')->get();
       // dd($color,$size,$data);
       // dd($data);
       return view('Admin.GoodsInfo.create',['gid'=>$gid,'color'=>$color,'size'=>$size,'name'=>$name]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Goodsinfoadd $request)
    {
        //
        $request->flash();
        $data=$request->except('_token');

        $gid=$request->input('gid');
        $colorid=$request->input('colorid');
        $sizeid=$request->input('sizeid');
        // 判断有没有相同属性的商品
        $same=DB::table('goodsinfo')->where('colorid','=',$colorid)->where('sizeid','=',$sizeid)->where('gid','=',$gid)->get();
        // 获取商品名字给跳转参数
        $goodsname=DB::table('goods')->where('id','=',$gid)->first()->name;

        if (count($same)){
            return back()->with('error','相同颜色并且相同规格的该商品已存在');
        } else {
            $bool=GoodsInfo::create($data);
            if($bool) {
                // 添加成功后跳转到商品详情
                $data1=GoodsInfo::where('gid','=',$gid)->get();
                // session(['success'=>'添加成功']);
                echo('<script>alert("添加成功")</script>');
                return view('Admin.GoodsInfo.index',['data'=>$data1,'name'=>$goodsname,'gid'=>$gid]);
            } else {

                return back()->with('error','添加失败，数据插入失败');
            }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 修改商品信息
    public function edit($id)
    {
        // 颜色和规格
        $color=DB::table('color')->get();
        $size=DB::table('size')->get();
        // 详情
        $data=DB::table('goodsinfo')->where('id','=',$id)->first();
        $gid=$data->gid;
        // 商品名称
        $goodsname=DB::table('goods')->find($gid)->name;
        return view('Admin.GoodsInfo.edit',['name'=>$goodsname,'data'=>$data,'color'=>$color,'size'=>$size]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Goodsinfoedit $request, $id)
    {
        // 获取商品颜色规格和商品gid用来判断修改后的商品和数据库的是否一样gid colorid sizeid一样则商品一样(出本身以外)
        $colorid=$request->input('colorid');
        $sizeid=$request->input('sizeid');
        $gid=DB::table('goodsInfo')->where('id','=',$id)->first()->gid;


        $data=$request->except('_token','_method');
        $bool=DB::table('goodsInfo')->where('colorid','=',$colorid)->where('sizeid','=',$sizeid)->where('id','!=',$id)->where('gid','=',$gid)->get();
        if (count($bool)) {
            // 商品与其他相同商品的商品规格相同返回
            return back()->with('error','相同颜色并且相同规格的该商品已存在');
        } else {

            // 更新 跳转详情首页
           if (GoodsInfo::where('id','=',$id)->update($data)) {

            $name=DB::table('goods')->find($gid)->name;
            $data1=GoodsInfo::where('gid','=',$gid)->get();
            echo('<script>alert("修改成功")</script>');
            return view('Admin.GoodsInfo.index',['data'=>$data1,'name'=>$name,'gid'=>$gid]);
           } else {

            // 更新失败
            $name=DB::table('goods')->find($gid)->name;
            $data1=GoodsInfo::where('gid','=',$gid)->get();
            echo('<script>alert("修改失败,可能原因,信息未做修改")</script>');
            return view('Admin.GoodsInfo.index',['data'=>$data1,'name'=>$name,'gid'=>$gid]);
           }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            if (GoodsInfo::destroy($id)) {
                return back()->with('success','删除成功');
            } else {
                return balck()->with('error','删除失败');
            }
    }
}

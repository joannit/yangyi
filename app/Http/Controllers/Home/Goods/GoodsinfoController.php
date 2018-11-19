<?php

namespace App\Http\Controllers\Home\Goods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Goods\Color;
use App\Goods\GoodsInfo;
class GoodsinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        dd($request->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // 立即购买
    public function store(Request $request)
    {
        // 商品详情id
        $id=$request->input('ginfoid');
        // 数量
        $num=$request->input('num');
        // dd($id,$num);
        // $
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
    // 商品详情
    public function goodsinfo(Request $request,$id)
    {



        $data=DB::table('goods')->where('id','=',$id)->first();

        // 获取商品的所属分类信息
        $type=DB::table('type')->where('id','=',$data->typeid)->first();
        // dd($type);
        // $goodsname[]=$data->name;
        $goodsname[]=$type->name;
        // 调用方法获取所有上级分类
        if(!empty($this->type($type->pid))) {
            $goodsname[]=$this->type($type->pid);
        }
        // 键名从新排序 从大到小
        krsort($goodsname);

        $ginfo=GoodsInfo::where('gid','=',$id)->get();

        return view('Home.Goods.index',['type'=>$goodsname,'goods'=>$data,'goodsinfo'=>$ginfo]);
    }


    // 获取所有商品上级分类
    public function type($pid)
    {
       if($pid!=0) {
        $data=DB::table('type')->where('id','=',$pid)->first();


        $this->type($data->pid);
        return $data->name;

        } else
        {
           return ;
        }
    }


    // 订单详情的ajax数据处理
    public function ajaxginfo(Request $request)
    {
        // 根据点击选择规格获取每件商品的商品详情 库存和价格的随点击改变
        $id=$request->input('id');

        $data=DB::table('goodsinfo')->where('id','=',$id)->first();

        // 转换为数组格式
        foreach($data as $key=>$val) {
            $info[$key]=$val;
        }

        return $info;
    }


    // 添加到购物车
    public function addcart(Request $request)
    {
        // dd($request->all(),222);
        // 商品详情id
        $id=$request->input('ginfoid');
        // 数量
        $num=$request->input('num');
        // dd($num,$id);

    }
}

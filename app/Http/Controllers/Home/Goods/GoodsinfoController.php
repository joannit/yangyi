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
        $uid=session('user')['id'];
       // dd($uid);
        $goodsinfo=GoodsInfo::where('id','=',$id)->first();
        // 获取商品名
        $goods=DB::table('goods')->where('id','=',$goodsinfo->gid)->first();
        $goodsinfo->num=$num;
        // 商品名
        $goodsinfo->name=$goods->name;
        // 图片
        $goodsinfo->pic=$goods->pic;

        // 交易号
        $goodsinfo->ordernum=uniqid(date('Ymd',time()));
        // 用户地址
        $address=DB::table('address')->where('uid','=',$uid)->get();
        // dd(count($address));
        $goodsinfo->createtime = date('Y-m-d　H:i:s',time());

        // dd($time);
        // echo uniqid(date('Ymd',time()));
        // exit;
        return view('Home.Goods.orderpay',['address'=>$address,'goodsinfo'=>$goodsinfo]);
        // dd($id,$num);

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
        // $id=11;
        // 数量
        $num=$request->input('num');
        // 获取用户id
        $uid=session('user')['id'];
        // echo $uid;
        // echo $id;
        // dd($uid);
        // 查询购物车表 商品重复则加数量不重复则添加
        $bool=DB::table('cart')->where('ginfo_id','=',$id)->where('uid','=',$uid)->first();
        // dd($bool);
        if(count($bool)) {
            $cid=$bool->id;
            // dd($cid);
            // 购物车有相同商品数量想加
            $bool->num+=$num;

            foreach($bool as $key=>$val) {
                $data[$key]=$val;
            }
            // dd($data);
            $bool1=DB::table('cart')->where('id','=',$cid)->update($data);
            if ($bool) {

                return redirect('/cart');
            } else {
                // 添加购无车失败 未知错误
                return back()->with('error','添加失败,未知错误');
            }
        } else {
            // 没有重复商品 插入
            $bool2=DB::table('cart')->insert(['uid'=>$uid,'ginfo_id'=>$id,'num'=>$num]);
            // echo $bool2;
            if($bool2) {
                // 插入成功++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                 return redirect('/cart');
            } else {
                // 插入失败
                return back()->with('error','添加失败,未知错误');
            }

        }

    }


    // 支付页设置默认地址
    public function defaultadd(Request $request)
    {
        // dd($request->all());
        $id=$request->input('id');
        $uid=session('user')['id'];
        dd($uid,$id);

    }



    // 支付
    public function pay(Request $request)
    {
        dd($request->all());
    }


}

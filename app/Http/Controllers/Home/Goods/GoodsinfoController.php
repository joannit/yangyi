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

       	//获取优惠券的信息
       	$uid=session('user')['id'];
       	$data=DB::table('couponsuser')->where('uid','=',$uid)->join('coupons','coupons.id','=','couponsuser.ponsid')->select('couponsuser.*','coupons.*','couponsuser.id as crid','coupons.id as cid')->where('p_status','=',0)->get();
       //	dd($data);
        // dd($time);
        // echo uniqid(date('Ymd',time()));
        // exit;
        return view('Home.Goods.orderpay',['address'=>$address,'goodsinfo'=>$goodsinfo,'data'=>$data]);
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
    //收藏
    public function shoucang(Request $request)
    { 
    	$id=$request->input('id');
    	//echo $row['gid'];exit;
    	$uid=session('user')['id'];
    	//echo $uid;exit;
    	//通过传过来的id取查询 有数据表示已经存在数据不添加 否则添加
    	$data=DB::table('house')->where('gid','=',$id)->where('uid','=',$uid)->get();
    	//echo $data;exit;
    	//echo $data;exit;
    	if(count($data)){ 
    		echo 1;
    	}else{ 
    		echo 2;
    	}
    }

    public function shoucangs(Request $request)
    { 
    	$gid=$request->input('id');
    	$uid=session('user')['id'];
    	if(!empty(session('user'))){
    	//通过传过来的id取查询 有数据表示已经存在数据删除 否则添加
    	$data=DB::table('house')->where('gid','=',$gid)->where('uid','=',$uid)->get();
    	//echo $data;exit;
    	$row=json_decode($data,true);
    	//var_dump($row);exit;
    	foreach($row as $value){ 

    		$id=$value['id'];
    	}
    	if(count($data)){ 
    		$res=DB::table('house')->where('id','=',$id)->delete();
    		if($res){ 
    			echo 1;
    		}
    	}else{ 
    		$row['gid']=$gid;
    		$row['uid']=$uid;
    		$rows=DB::table('house')->insert($row);
    		if($row){ 
    			echo 2;
    		}
    	}
    	}else{ 
    		echo 3;
    	}
    }
    public function docoupons(Request $request)
    { 
    	$id=$request->input('id');
    	//echo $id;exit;
    	$datas=DB::table('couponsuser')->join('coupons','coupons.id','=','couponsuser.ponsid')->select('coupons.*','couponsuser.*','coupons.id as cid','couponsuser.id as cpid')->where('couponsuser.id','=',$id)->first();	
    	//dd($datas);
    	if(count($datas)){
    	$data['pname']=$datas->pname ;
    	$data['discount']=$datas->discount ;
    	$data['money']=$datas->money;
    	$data['type']=$datas->type;
    	$data['cpid']=$datas->cpid;
    	$data['lowmoney']=$datas->lowmoney;
    	return $data;
    	}else{ 
    		return 0;
    	}
    }
}

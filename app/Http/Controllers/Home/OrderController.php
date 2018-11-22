<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        // 获取购物车商品
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
    // 跳转订单页
    public function store(Request $request)
    {
        $id = ($request->except('_token'));

        // 查询传过来的商品已经详情
        $list = DB::table('cart')->join('goodsinfo','cart.ginfo_id','=','goodsinfo.id')->join('goods','goodsinfo.gid','=','goods.id')->join('color','goodsinfo.colorid','=','color.id')->join('size','goodsinfo.sizeid','=','size.id')->whereIn('cart.id',$id['id'])->select('cart.*','goodsinfo.gprice','goodsinfo.discount','goods.name','goods.pic','color.cname','size.value')->get();
        // dd($list);
        // 订单号
        $orderid = uniqid(date('Ymd',time()));
        $ordertime = date('Y-m-d H:i:s',time());
        // 地址
        $address = DB::table('address')->where('uid','=',session('user')['id'])->get();
        // 加载订单页面
        return view('Home.cart_pay',['list'=>$list,'orderid'=>$orderid,'ordertime'=>$ordertime,'address'=>$address]);
    }
    // 订单生成
    public function insert(Request $request)
    {
        // 获取订单表需要的数据
        $order = $request->except('_token','cid','default');
        $order['uid']=session('user')['id'];
        // 购物车id
        $cid = $request->input('cid');
        $count = $request->input('count');
        $onum =$order['ordernum'];
        // 获取订单详情需要的数据
        $info = DB::table('cart')->join('goodsinfo','cart.ginfo_id','=','goodsinfo.id')->whereIn('cart.id',$cid)->select('cart.ginfo_id as ginfoid','cart.num','goodsinfo.gprice as price','goodsinfo.discount as discount')->get();  
        // dd($info);
        foreach ($info as $key => $value) {
            $value->count = number_format($value->num*$value->price*($value->discount/100),2);
            // $value->oid = $oid;
            $arr[$key]=$value;
           unset($value->discount);
        };
        // dd($arr);
        // 插入订单表
        // dd($order);
        $oid=DB::table('order')->insertGetId($order);

        foreach ($arr as $key => $value) {
            foreach ($value as $k => $v) {
               $ar[$key][$k]=$v;
               $ar[$key]['oid']=$oid;
            }
            }
            // dd($ar);
         // 如果订单插入成功     
        if($oid){
            // 把数据插入详情表   
            foreach ($ar as $key => $value) {
            $result =DB::table('orderinfo')->insert($value);
        }
        // 如果插入详情表成功
        if(count($result)>0){
            // 删除购物车数据
            DB::table('cart')->whereIn('id',$cid)->delete();
            // 修改库存
            foreach ($ar as $v) {
                DB::table('goodsinfo')->where('id','=',$v['ginfoid'])->decrement('store',$v['num']);
            }

            
        }
        }else{
            echo '<script>alert("订单提交失败");location="/order"</script>';
        }
        pay($onum,$oid,'羊燚网商');
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
}

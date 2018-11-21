<?php

namespace App\Http\Controllers\Home\Order;

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

        $uid=session('user')['id'];

        $data=DB::table('order')->where('uid','=',$uid)->paginate(4);
        // dd($data);
        foreach ($data as $key => $value) {
            $oid=$value->id;

            $data[$key]->num=count(DB::table('orderinfo')->where('oid','=',$value->id)->get());
            // echo $oid;
            $info=DB::table('orderinfo as oi')->join('goodsinfo as gi','gi.id','=','oi.ginfoid')->join('goods as g','gi.gid','g.id')->join('color as c','c.id','=','gi.colorid')->join('size as s','s.id','=','gi.sizeid')->select('c.cname','s.value','g.pic','g.bid','gi.discount','gi.gprice','g.name')->where('oi.oid','=',$oid)->first();

            $data[$key]->info=$info;
        }


        // dd($aa);
        // dd($info);
        // $oid=$data->id;
        // dd($data);
        // $data=[];
        return view('Home.Goods.myorder',['data'=>$data,'request'=>$request->all()]);
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
        // $id订单id
        // dd($id);
        $data=DB::table('order')->join('address','address.id','=','order.addid')->where('order.id','=',$id)->select('order.*','address.*','order.id as orid')->first();
        // 详情
        // $info=DB::table('orderinfo')->where('oid','=',$id)->get();



        // dd($info);
        // foreach ($info as $key => $value) {

         $info=DB::table('orderinfo as or')->join('goodsinfo as gi','or.ginfoid','gi.id')->join('goods as g','g.id','=','gi.gid')->join('color as c','c.id','=','gi.colorid')->join('size as s','s.id','=','gi.sizeid')->join('brand as b','g.bid','=','b.id')->select('b.name as bname','gi.gprice','gi.discount','g.name as gname','c.cname','s.value','or.num')->where('or.oid','=',$id)->get();
        // }
        // dd($info);
        // dd($id);
        // dd($data);
        return view('Home.Goods.orderinfo',['data'=>$data,'info'=>$info]);
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
    // 删除订单 删除订单详情
    public function destroy($id)
    {
        //
        echo $id;
    }

    // 改变订单状态
    public function changestatus($id)
    {
        // dd($id);
        $bool=DB::table('order')->where('id','=',$id)->update(['ostatus'=>4]);
        if ($bool) {
            echo '<script>alert("已确认收货");location="/myorder"</script>';
        }
    }


    // 订单中心的立即付款的支付
    public function paynow(Request $request,$id)
    {
                // 订单号
        $ordernum=DB::table('order')->where('id','=',$id)->first()->ordernum;
         // 订单名
        $ordername=$id;
        // 订单描述
        $orderdescr='test by joann';
        // 调用支付接口
        pay($ordernum,$ordername,$orderdescr);
    }
}

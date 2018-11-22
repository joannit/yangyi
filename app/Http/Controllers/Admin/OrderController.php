<?php

namespace App\Http\Controllers\Admin;

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
        $k = $request->input('keywords');
        // dd($k);
        // 获取订单列表
        $order = DB::table('order')->join('address','order.addid','=','address.id')->join('user','order.uid','=','user.id')->where('order.ordernum','like','%'.$k.'%')->select('order.*','address.aname','address.aphone','address.address','user.user_name')->orderBy('ostatus','asc')->paginate(5);
        // dd($order);
        return view('Admin.Order.index',['order'=>$order,'request'=>$request->all()]);
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
        // 订单详情
        $info = DB::table('orderinfo')->join('order','orderinfo.oid','=','order.id')->join('goodsinfo','orderinfo.ginfoid','=','goodsinfo.id')->join('goods','goodsinfo.gid','=','goods.id')->join('color','goodsinfo.colorid','=','color.id')->join('size','goodsinfo.sizeid','=','size.id')->where('oid','=',$id)->select('orderinfo.*','order.ordernum','goodsinfo.gprice','goods.name','goods.pic','size.value','color.cname')->get();
        // dd($info);
        return view('Admin.Order.info',['info'=>$info]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        // 发货
        $result = DB::table('order')->where('id','=',$id)->update(['ostatus'=>3]);
        if(count($result)){
            return redirect('/admin/order')->with('success','发货成功！');
        }else{
            return redirect('/admin/order')->with('error','发货失败！');
        }
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

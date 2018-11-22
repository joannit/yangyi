<?php
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uid = session('user')['id'];
        // 查询当前用户购物车
        $cart = DB::table('cart')->join('goodsinfo','cart.ginfo_id','=','goodsinfo.id')->join('goods','goodsinfo.gid','=','goods.id')->join('color','goodsinfo.colorid','=','color.id')->join('size','goodsinfo.sizeid','=','size.id')->where('uid','=',$uid)->select('cart.*','goodsinfo.*','goods.pic','goods.name','color.cname','size.value','cart.id as cid')->get();
        // dd($cart);
        return view('Home.cart',['cart'=>$cart]);
    }
    // 购物车数量改变
    public function numadd(Request $request)
    {
        $num = $request->input('num');
        $id = $request->input('id');
        // 查询当前商品库存
        $store = DB::table('goodsinfo')->join('cart','goodsinfo.id','=','cart.ginfo_id')->where('cart.id','=',$id)->first();

        if($num>$store->store){
            echo 2;
        }else{
            if(DB::table('cart')->where('id','=',$id)->update(['num'=>$num])){
                echo 1;
            }
        }
    }
    // ajax删除
    public function cartdel(Request $request)
    {
        $id = $request->input('id');
        if(DB::table('cart')->where('id','=',$id)->delete()){
            echo 1;
        }
    }
    // ajax删除全选
    public function cartdels(Request $request)
    {
        $id = ($request->input('arr'));
        if(DB::table('cart')->whereIn('id',$id)->delete()){
            echo 1;          
        }
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

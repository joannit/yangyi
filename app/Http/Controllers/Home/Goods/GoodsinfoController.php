<?php

namespace App\Http\Controllers\Home\Goods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
// 颜色模型
use App\Goods\Color;
// 详情模型
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

        // dd($request->all());
        // echo 222;
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
        // 判断如果没登录则不能进入购买+++++++++++++++++++++++++++++++++++++++++++
        // dd($request->all());
        $gid=$request->input('gid');
        if (session('user')) {
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
            $orderid=uniqid(date('Ymd',time()));
            // 用户地址
            $address=DB::table('address')->where('uid','=',$uid)->get();
            // dd(count($address));
            $ordertime = date('Y-m-d　H:i:s',time());
            session(['buynoworder'=>$goodsinfo]);
            session(['ordernum'=>$orderid]);

            return view('Home.Goods.orderpay',['address'=>$address,'goodsinfo'=>$goodsinfo,'orderid'=>$orderid,'ordertime'=>$ordertime]);
            // dd($id,$num);
        } else {
           echo '<script>alert("您还未登录,请先登录");location="/homegoodsinfo/'.$gid.'";</script>';

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


    }
    // 商品详情
    public function goodsinfo(Request $request,$id)
    {

        // dd($id);

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
        // 爆款推荐
        $hot = DB::table('goods')->orderBy('sales')->get();
        // 查询评价
        $comment = DB::table('comment')->join('user_info','comment.uid','=','user_info.uid')->where('comment.gid','=',$data->id)->paginate(10);;
        // dd($comment);
        return view('Home.Goods.index',['type'=>$goodsname,'goods'=>$data,'goodsinfo'=>$ginfo,'hot'=>$hot,'comment'=>$comment,'request'=>$request->all()]);

        // 评论数
        $comnum=DB::table('comment')->where('gid','=',$id)->count();

        // dd($data,$comnum);
        return view('Home.Goods.index',['type'=>$goodsname,'goods'=>$data,'goodsinfo'=>$ginfo,'comnum'=>$comnum]);

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
        // 商品详情id
        $id=$request->input('ginfoid');
        // 数量
        $num=$request->input('num');
        // 获取用户id
        $uid=session('user')['id'];

        // 查询购物车表 商品重复则加数量不重复则添加
        $bool=DB::table('cart')->where('ginfo_id','=',$id)->where('uid','=',$uid)->first();

        // dd($bool);
        if(count($bool)) {
            $cid=$bool->id;
            // 判断是否是否能大于库存
            $gnum=DB::table('goodsinfo')->where('id','=',$bool->ginfo_id)->first()->store;
            // dd($gnum);
            // dd($cid);
            // 购物车有相同商品数量想加
            $bool->num+=$num;
            foreach($bool as $key=>$val) {
                $data[$key]=$val;
            }
            // 大于库存则等于库存
            if($data['num'] > $gnum)$data['num']=$gnum;
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
        // 地址id
        $id=$request->input('id');
        // 用户id
        $uid=session('user')['id'];
        // echo $uid;
        // 设置默认地址，先把用户所有的地址默认为0 然后设置选择的地址为默认1
        $bool=DB::table('address')->where('uid','=',$uid)->update(['default'=>0]);
        $bool1=DB::table('address')->where('id','=',$id)->update(['default'=>1]);
        if ($bool1) {
            return 1;
        } else {
            return 0;
        }

    }



    // 下单 成功后调用支付接口
    public function pays(Request $request)
    {

            // 实际付款
            if(session('buynoworder')) {


                $data['pay']=(session('buynoworder')->gprice)*(session('buynoworder')->num)*(session('buynoworder')->discount/100);
                // 总价格
                $data['tprice']=(session('buynoworder')->gprice)*(session('buynoworder')->num);
                // 地址id
                $data['addid']=$request->input('address');
                // 用户ID
                $data['uid']=session('user')['id'];
                // 订单号
                $data['ordernum']=session('ordernum');
                // 下单时间
                $data['createtime']=date('Y-m-d H:i:s',time());
                // dd($data);
                $oid=DB::table('order')->insertGetId($data);
                // dd($aa);
                // 下单成功
                if ($oid) {
                    // 添加商品详情
                    // dd($data);
                    $oinfo['ginfoid']=session('buynoworder')->id;
                    $oinfo['oid']=$oid;
                    $oinfo['num']=session('buynoworder')->num;
                    $oinfo['price']=$data['tprice'];
                    $oinfo['count']=$data['pay'];
                    // 添加到订单详情
                     $bool=DB::table('orderinfo')->insertGetId($oinfo);
                     // dd($bool);
                     if($bool) {
                        // 添加订单详情ok
                            // 订单详情
                        $ordernum=$data['ordernum'];
                        // 金额
                        // $orderprice='0.01';
                        // 订单id
                        $ordername=$oid;
                        // 订单描述
                        $orderdescr='test by joann';
                        // 调用支付接口
                        pay($ordernum,$ordername,$orderdescr);

                     } else {
                        // 添加到订单详情失败
                        @DB::table('order')->where('id','=',$oid)->delete();
                        return back()->with('error','添加订单失败,请稍后重试');
                     }

                } else {
                        // 订单失败

                    return back()->with('error','添加订单失败,请稍后重试');
                }
            } else {
                return back()->with('error','数据添加失败,请重新登录');
            }


    }


    // 支付成功返回

    public function payfinished(Request $request)
    {

        // 付款时间
        $paytime = $request->input('notify_time');
        // 付款金额
        // 订单id
        $id = $request->input('subject');
          // 支付宝交易号
        $alinum=$request->input('trade_no');
        $bool=DB::table('order')->where('id','=',$id)->update(['paytime'=>$paytime,'alinum'=>$alinum,'ostatus'=>2]);
        // 返回订单中心
        echo  '<script>alert("下单成功");location="/myorder"</script>';

    }


}

<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 公共方法
    public function gettypepid($pid)
    {
        $type_top = DB::table('type')->where("pid",'=',$pid)->orderBy('id', 'asc')->get();
        $data = [];
        foreach ($type_top as $key => $value) {
            $value->son = $this->gettypepid($value->id);
            $data[] = $value;
        }
        return $data;
    }


    public function index()
    {
        // 获取商品详情的所有gid 方便前台判断商品遍历是否有详情
        $info=DB::table('goodsinfo')->select('goodsinfo.gid')->get();
        foreach ($info as $key => $value) {
            $goodsinfo[]=$value->gid;
        }
        // dd($goodsinfo);
        // 如果商品详情为空赋予空数组 不然前台遍历会错
        if(!count($goodsinfo))$goodsinfo=array();
        // 获取顶级分类
        $type= $this->gettypepid(0);
        // 查询所有顶级分类下的商品
        $tid = [];
        foreach ($type as $key => $value) {
            // if (count($this->getgoodsid($value->id))) {
            // echo count($value->id);
            $tid[] = $this->getgoodsid($value->id);
            // }
        }
        // dd($tid);
        $typeall = [];
        foreach ($tid as $key => $value) {
            // 判断顶级分类是否有子分类
        if(count($value)) {
             $str=join(",",$value);
            }

        // $typeall[]=DB::select("select * from goods where typeid in ($str)");
        $typeall[]=DB::select("select goods.*,brand.name as bname from goods, brand where brand.id = goods.bid and goods.typeid in ($str)");
         }
        //加载前台首页
        //爆款推荐
        $tops = DB::select("select * from goods order by sales desc limit 6");
        //公告
        $notice = DB:: table('notice')->limit(5)->get();
        //广告
        $advent = DB::table('advent')->where('status','=',1)->first();


        // 用户等级
        if(session('user'))
        {
            $level=DB::table('user')->where('id','=',session('user')['id'])->first();
        } else {
            $level=array();
        }
        // dd($level);
        // 伦播图
        $images=DB::table("images")->where('status','=',1)->get();
        return view('Home.index',['type'=>$type,'typeall'=>$typeall,'tops'=>$tops,'notice'=>$notice,'advent'=>$advent,'goodsinfo'=>$goodsinfo,'level'=>$level,'images'=>$images]);





    }

    // 获取顶级分类下的所有商品
    public function getgoodsid($gid)
    {
         $type_son = DB::table('type')->where("pid",'=',$gid)->get();
         // dd($type_son);
          $pid =[];
         foreach ($type_son as $key => $value) {
            $value->pids = $this->getgoodsid($value->id);
            $pid[] = $value->id;
            if(count($value->pids)>0){
                foreach ($value->pids as $key => $values) {
                    $pid[] = $values;
                }
            }
         }
         return $pid;
    }
    // 公告
    public function notice(Request $request){
        $id=$request->input('id');
        // 判断点击的是公告还是公告栏
        if(isset($id)){
            $list = DB::table('notice')->where('id','=',$id)->first();
        }else{
            $list = DB::table('notice')->first();
        }
        // 查询所有公告
        $lists = DB::table('notice')->get();
        return view('Home.notice',['list'=>$list,'lists'=>$lists]);
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

    public function aboutus()
    {
        return view('Home.aboutus');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
// 引入表单验证类
use App\Http\Requests\AdminGoodsinsert;
use App\Http\Requests\AdminGoodsedit;
class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $k = $request->input("keywords");
        // 获取所有商品
        $goods = DB::table('goods')->join('type','type.id','=','goods.typeid')->join('brand','brand.id','=','goods.bid')->select('goods.*','type.name as tname','brand.name as bname')->where('goods.name','like','%'.$k.'%')->paginate(5);
        // dd($goods);
        // 修改状态
        foreach ($goods as $key => $value) {
            if($value->status == 0){
                $value->status = '上架';
            }else{
                $value->status = '下架';
            }
        }

        // dd($goods);
        return view('Admin.Goods.index',['goods'=>$goods,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // 获取所有的类别数据
        $list = DB::table('type')->select(DB::raw('*,concat(path,",",id) as paths'))->orderBy('paths')->get();
        // 遍历数据
        foreach ($list as $key => $value) {
            // 转换为数组
            $arr  = explode(',',$value->path);
            // 获取逗号个数
            $len = count($arr)-1;
            // 重复字符串函数
            $list[$key]->name = str_repeat('--|',$len).$value->name;
        }


        // 添加品牌数组到list
        foreach($list as $key=>$value) {
            $brand=DB::table('brand')->where('tid','=',$value->id)->get();
            $list[$key]->brand=$brand;

        }

 //加载添加商品页面

        // dd($list);
        return view('Admin.Goods.add',['list'=>$list]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminGoodsinsert $request)
    {
        //处理商品添加

        // dd($request->all());
        $data=($request->except('_token','pic'));
        // 检测是否有文件上传
        if($request->hasFile('pic')){
            // 设置文件格式
            $filetype = ['jpg','png'];
            $ext=$request->file("pic")->getClientOriginalExtension();
            $name = '2018'.uniqid().'.'.$ext;
            if(in_array($ext,$filetype)){
                $data['pic']=$name;
                // dd($data);
                if($result = DB::table('goods')->insert($data)){
                // 将上传的图片移入文件夹中
                $request->file("pic")->move("./uploads/goods",$name);
                return redirect('/admin/goods')->with('success','添加成功');
                }
            }else{
                return redirect('/admin/goods/create')->with('error','请上传jpg或png格式图片');
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


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 加载商品修改页面
        $data = DB::table('goods')->where('id','=',$id)->first();
        // 获取所有的类别数据
        // dd($data);
        $list = DB::table('type')->select(DB::raw('*,concat(path,",",id) as paths'))->orderBy('paths')->get();
        // 遍历数据
        foreach ($list as $key => $value) {
            // 转换为数组
            $arr  = explode(',',$value->path);
            // 获取逗号个数
            $len = count($arr)-1;
            // 重复字符串函数
            $list[$key]->name = str_repeat('--|',$len).$value->name;
        }
        return view('Admin.Goods.edit',['data'=>$data,'list'=>$list]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminGoodsedit  $request, $id)
    {
        // 处理商品修改
        $data=($request->except('_token','_method'));
        $row = DB::table('goods')->where('id','=',$id)->first();
        // 获取旧图片名
        $pic = $row->pic;
        // 检测是否有图片上传
        if($request->hasFile('pic')){
            // 设置文件格式
            $filetype = ['jpg','png'];
            $ext=$request->file("pic")->getClientOriginalExtension();
            // 检测格式是否正确
            if(in_array($ext,$filetype)){
                $name = '2018'.uniqid().'.'.$ext;
                // 处理上传的图片名
                $data['pic']=$name;
                if(DB::table('goods')->where('id','=',$id)->update($data)){
                // 将上传的图片移入文件夹中
                $request->file("pic")->move("./uploads/goods",$name);
                // 删除旧图片
                unlink('./uploads/goods/'.$pic);
                return redirect('/admin/goods')->with('success','修改成功');
                }
             }else{
                return redirect('/admin/goods/create')->with('error','请上传jpg或png格式图片');
             }
        }else{
            // 没有图片上传
            $data=($request->except('_token','_method','pic'));
            if(DB::table('goods')->where('id','=', $id) ->update($data)){
                return redirect('/admin/goods')->with('success','修改成功');
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
        // echo $id;
        // 商品删除操作
        // 获取商品图片名称
        $data = DB::table('goods')->where('id','=',$id)->first();
        $pic = $data->pic;
        // 删除数据库数据
        if(DB::table('goods')->where('id','=',$id)->delete()){
            @unlink('./uploads/goods/'.$pic);
            @DB::table('goodsinfo')->where('gid','=',$id)->delete();
            return redirect('/admin/goods')->with('success','删除成功');
        }else{
             return redirect('/admin/goods')->with('error','删除失败');
        }
    }

    // 品牌
    public function typebrand (Request $request)
    {

    $data=$request->all();
    $tid=$data['tid'];
      // echo $tid;
    $brand=DB::table('brand')->where('tid','=',$tid)->get();
    return $brand;

    }

    // 商品下的品牌修改
    public function changebr (Request $request)
    {
       // 获取商品id和类id
        $gid=$request->input('id');
        $typeid=$request->input('typeid');
        // 获取商品名字用于商品修改时显示
        $name=$request->input('name');
        $data=DB::table('brand')->where('tid','=',$typeid)->get();
        // dd($data);
        return view('Admin.Goods.editbrand',['data'=>$data,'gid'=>$gid,'name'=>$name]);
    }

    // 执行商品列表下的品牌修改
    public function updatebr(Request $request)
    {
        // 获取品牌表的id
        $bid=$request->input('id');
        // 获取商品id
        $id=$request->input('gid');
        // 执行修改
        $bool=DB::table('goods')->where('id','=',$id)->update(['bid'=>$bid]);
        if ($bool) {
            // 修改成功
            return redirect('/admin/goods')->with('success','修改品牌成功');
        } else {
            // 修改失败
            return redirect('/admin/goods')->with('error','修改失败,可能原因:修改的品牌与原来的一致');
        }



        dd($bid,$id);
    }
}

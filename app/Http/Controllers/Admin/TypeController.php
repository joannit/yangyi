<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $k = $request->input("keywords");

        $type = DB::table('type')->select(DB::raw('*,concat(path,",",id) as paths'))->where('name','like','%'.$k.'%')->orderBy('paths')->paginate(5);
        // 遍历数据
        foreach ($type as $key => $value) {
            // 转换为数组
            $arr = explode(',',$value->path);
            // 获取逗号个数
            $len = count($arr)-1;
            // 重复字符串函数
            $type[$key]->name = str_repeat('--|',$len).$value->name;
        }
        return view('Admin.Type.index',['type'=>$type,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 获取所有的类别数据
        $type = DB::table('type')->select(DB::raw('*,concat(path,",",id) as paths'))->orderBy('paths')->get();
        return view('Admin.Type.add',['type'=>$type]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //处理添加分类
        // dd($request->all());
        $data = $request->except('_token');
        // 获取pid值
        $pid = $request->input('pid');
        // 判断
        if($pid == 0){
            // 添加顶级分类
            $data['path']='0';
        }else{
            $info = DB::table('type')->where('id','=',$pid)->first();
            $data['path'] = $info->path.','.$info->id;
        }
        // 执行插入
        if(DB::table('type')->insert($data)){
            return redirect('/admin/type')->with('success','添加成功');
        }else{
            return redirect('/admin/type/create')->with('error','添加失败');
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
        // 获取修改数据
        $data = DB::table('type')->find($id);
        // $list = DB::table('type')->get();
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
       return view('Admin.Type.edit',['data'=>$data],['list'=>$list]);
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
        // 修改商品分类
        $data = $request->except('_token','_method');
        $pid = $request->input('pid');
        // 判断name是否为空
        if($request->input('name')==''){
            return redirect("/admin/type/{$id}/edit")->with('error','名称不能为空');
        }
        // 判断是否修改为顶级分类
        if($pid== 0){
            $data['path']=0;
        }
        $result = DB::table('type') ->where('id','=', $id) ->update($data);
        if($result){
            return redirect("/admin/type")->with('success','修改成功');
        }else{
            return redirect("/admin/type/{$id}/edit")->with('error','修改失败');
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
        // 删除分类操作 
        // 查看是否有商品
        $goods = DB::table('goods')->where('typeid','=',$id)->get();
        // 查看是否有子分类
        $data = DB::table('type')->where('pid','=',$id)->get();
        if(count($data) || count($goods)){
            return redirect('/admin/type')->with('error','删除失败,当前分类下有子分类或商品');
        }else{

            if(DB::table('type')->where('id','=',$id)->delete()){
                return redirect('/admin/type')->with('success','删除成功');
            }else{
                return redirect('/admin/type')->with('error','删除失败');
            }
        }
        
    }
}

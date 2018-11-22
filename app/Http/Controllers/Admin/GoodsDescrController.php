<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
// 引入表单验证类
class GoodsDescrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminGoodsinsert $request)
    {
        
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
        // 加载描述页面有则修改没有则添加
        // echo $id;
        $info = DB::table('goods')->where('id','=',$id)->first();
        // dd($descr);
        return view('Admin.Goods.descr',['info'=>$info]);
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
      $descr = ($request->except('_token','_method'));
      $info = DB::table('goods')->where('id','=',$id)->first();
       preg_match_all('/<img.*?src="(.*?)".*?>/is', $info->descr, $arr);
            if(isset($arr[1])){
            foreach ($arr[1] as $key => $value) {
                unlink('.'.$value);
            }
            }
      if(DB::table('goods')->where('id','=',$id)->update($descr)){
            return redirect('/admin/goods')->with('success','修改成功！');
      }else{
            return redirect('/admin/goods')->with('error','修改成功！');
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
      
    }

}

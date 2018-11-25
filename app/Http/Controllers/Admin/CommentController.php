<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 搜索
        $k = $request->input('keywords');
        // dd($k);
        // 获取所有评价
        $list = DB::table('comment')->join('goods','comment.gid','=','goods.id')->join('user','comment.uid','=','user.id')->select('comment.*', 'goods.name','user.user_name')->where('goods.name','like','%'.$k.'%')->paginate(5);
        // 加载评价列表
        // dd($list);
        return view('Admin.Comment.index',['request'=>$request->all(),'list'=>$list]);
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
        $info = DB::table('comment')->join('goods','gid','=','goods.id')->join('user','uid','=','user.id')->select('comment.*', 'goods.name','user.user_name')->where('comment.id','=',$id)->first();
        // 加载回复评价页面
        return view('Admin.Comment.edit',['info'=>$info]);
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
        // 获取回复的内容
        $data = $request->input('recontent');
        // dd($data);
        // 处理修改操作
        if(DB::table('comment')->where('id','=',$id)->update(['recontent'=>$data])){
            return redirect('/admin/comment')->with('success','回复成功');
        }else{
             return redirect('/admin/comment')->with('error','回复失败');
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
        //
    }
}

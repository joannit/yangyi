<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// 导入公共添加验证类
use App\Http\Requests\AdminNoticeadd;
use DB;
class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = DB::table('notice')->paginate(3);
        // 加载公告列表
        return view('Admin.Notice.index',['list'=>$list,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Notice.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminNoticeadd $request)
    {
        // 处理公告添加
        $data = $request->except('_token');
        $data['time']=time();
        if(DB::table('notice')->insert($data)){
            return redirect('/admin/notice')->with('success','添加成功');
        }else{
            return redirect('/admin/notice')->with('error','添加失败');
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
        $info = DB::table('notice')->where('id','=',$id)->first();
        // dd($info);
        // 加载公告修改页面
        return view('Admin.Notice.edit',['info'=>$info]);
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
        $data = ($request->only('title','content'));
        // 执行修改
        if(DB::table('notice')->where('id','=',$id)->update($data)){
            return redirect('/admin/notice')->with('success','修改成功');
        }else{
           return redirect('/admin/notice')->with('error','修改失败'); 
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
        // 获取要删除的数据
        $info = DB::table('notice')->where('id','=',$id)->first();
        // dd($info);
        // 获取图片路径
        preg_match_all('/<img.*?src="(.*?)".*?>/is', $info->content, $arr);
        if(DB::table('notice')->where('id','=',$id)->delete()){
            if(isset($arr[1])){
            foreach ($arr[1] as $key => $value) {
                unlink('.'.$value);
            }
            }
            return redirect('/admin/notice')->with('success','删除成功');
        }
    }

    // 批量删除
    public function del(Request $request)
    {
        $arr = $request->input('arr');
        // dd($arr);
        if($arr == ''){
            echo '请至少选中一条数据';
        }else{
            foreach ($arr as $key => $value) {
                DB::table('notice')->where('id','=',$value)->delete();
            }
            echo 1;
        }
    }
}
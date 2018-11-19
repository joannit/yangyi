<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $k = $request->input('keywords');
        $list = DB::table('message')->join('user','message.uid','=','user.id')->where('user.user_name','like','%'.$k.'%')->select('message.*','user.user_name')->orderBY('id','desc')->paginate(5);
        // dd($list);
        // 加载站内信列表
        return view('Admin.Message.index',['list'=>$list,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 查询所有用户
        $user = DB::table('user')->select('id','user_name')->get();
        // dd($user);
        //加载发送消息页面
        return view('Admin.Message.add',['user'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 处理添加
        $data = $request->except('_token');
        $data['time']=time();
        if($data['content']==''){
            return redirect('/admin/message/create')->with('error','发送失败,内容不能为空！'); 
            exit;
        }
        // 发给所有人
        if($data['uid'] == 'all'){
            $user = DB::table('user')->pluck('id');
            foreach ($user as $key => $value) {
                DB::table('message')->insert(['uid'=>$value,'content'=>$data['content'],'time'=>time()]);   
            }
            return redirect('/admin/message')->with('success','发送成功！');
        }else{
            // 指定用户发送
            if(DB::table('message')->insert($data)){
            return redirect('/admin/message')->with('success','发送成功！');   
         }else{
            return redirect('/admin/message/create')->with('error','发送失败！'); 
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
        // 删除操作
        if(DB::table('message')->where('id','=',$id)->delete()){
            return redirect('/admin/message')->with('success','删除成功！');   
        }else{
            return redirect('/admin/message')->with('error','删除失败！'); 
        }
    }
}

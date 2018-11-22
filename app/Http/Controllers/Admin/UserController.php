<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use DB;
// 导入添加会员表单验证
use App\Http\Requests\User\AdminUserCreate;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //会员管理列表
    public function index(Request $request)
    {
        $user_name=$request->input('user_name');
        $user_status=$request->input('user_status');

        $data=DB::table('user')->where('user_name','like','%'.$user_name.'%')->where('user_status','like','%'.$user_status.'%')->orderBy('id')->paginate(4);
        // dd($request->all());
       return view("Admin.User.index",['data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 会员添加
    public function create()
    {
        //
        // echo 111;
        return view("Admin.User.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // 执行添加
    public function store(AdminUserCreate $request)
    {
        $data=$request->except("_token","user_repassword");

        $data['user_password']=Hash::make('user_password');
        // dd($data);
        $bool=DB::table('user')->insert($data);
        // dd($bool);
        if ($bool) {
            return redirect('/admin/user')->with('success','添加成功');
        } else {
            return back()->with('error','添加失败');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 会员详情
    public function show($id)
    {
        $data=DB::table('user_info')->where('uid','=',$id)->first();
        // dd($data); 
        if(count($data)==0) {
            return back()->with('error','该会员还未添加会员详情');
        } else {
            if($data->sex == 0){
            $data->sex = '男';
        }elseif($data->sex == 1){
            $data->sex = '女';
        }else{
            $data->sex = '保密';
        }
             return view('Admin.User.info',['data'=>$data]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //会员信息修改
    public function edit($id)
    {
        $data=DB::table('user')->find($id);
        // dd($data);
        return view("Admin.User.edit",['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 执行修改
    public function update(Request $request, $id)
    {
        //
       $data=$request->except('_token','_method');
       $bool=DB::table('user')->where('id','=',$id)->update($data);
        if ($bool) {
            return redirect("/admin/user")->with('success','修改成功');
        } else {
            return back()->with('error','修改失败');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 会员删除
    public function destroy($id)
    {
        //
        // var_dump($id);
        $bool=DB::table('user')->where('id','=',$id)->delete();
        // dd($bool);
        if ($bool) {
            return redirect("/admin/user")->with('success','删除成功');
        } else {
            return redirect("/admin/user")->with('error','删除失败');
        }
    }
}

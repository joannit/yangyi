<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use DB;
class AdminLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // echo 222;
        // 退出和登录
        // 清除缓存
        //$request->session()->pull('nodelist');
        $request->session()->pull('admin_name');


        return redirect('/adminlogin/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        // 加载后台登录
        return view("Admin.Admins.login");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 执行登录
        // dd($request->all());
        // 获得输入的用户名
        $admin_name=$request->input('admin_name');
        // 获得密码
        $admin_password=$request->input('admin_password');
        // 根据用户名查询数据 检测用户名
        $info=DB::table('admin')->where('admin_name','=',$admin_name)->first();
        // 数据库是否有数据
        // dd($info->id);
        if(count($info)==1) {
            // echo 'aaa';
            // 检测密码
            if(Hash::check($admin_password,$info->admin_password)){
                // 检测状态
                if($info->admin_status==1) {
                    // echo '登录成功';
                    // 把用户名存储在session
                    session(['admin_name'=>$admin_name]);
                    // 获取登录后台的所有全限

                    $sql="select n.nname,n.cname,n.way from role_node as rn,node as n where rn.nid = n.id  and rn.rid={$info->id}";
                    // 执行
                    $list=DB::select($sql);
                    // dd($list);
                    // 初始化
                    // 让所有登录后台的用户都有访问后台首页修改个人密码修改个人手机号码的权限
                     if (count($list)==0) {
                        // 首页
                        $nodelist['AdminController'][]='index';
                        // 个人密码修改
                        $nodelist['MasterController'][]='admineditpwd';
                        $nodelist['MasterController'][]='adminupdatepwd';
                        // 个人手机号修改
                        $nodelist['MasterController'][]='admineditpho';
                        $nodelist['MasterController'][]='adminupdatepho';

                    } else {

                        foreach ($list as $key=>$value) {
                            // var_dump($key);
                            // var_dump($value->cname);
                            // var_dump($value->way);
                            // 把所有去权限信息写进$nodelsit
                            $nodelist[$value->cname][]=$value->way;
                            // 如果有个方法create则会有store
                            if($value->way=='create') {
                                $nodelist[$value->cname][]='store';
                            }
                            // 如果有edit 则会有update
                            if ($value->way=='edit') {
                                $nodelist[$value->cname][]='update';
                            }
                            //
                        }
                    }

                    // 把所有信息存在session
                session(['nodelist'=>$nodelist]);
                // $a=session('nodelsit');
                // var_dump($a);
                            // var_dump($nodelsit);

                    // exit;
                    return redirect('/admin')->with('success','登录成功');
                }else {

                    return redirect('/admin')->with('error','你的账号也被禁用，请联系超级管理员');
                }

            }else{
                return back()->with('error','密码不正确');
                //echo '密码不正确';
            }

        }else{
            return back()->with('error','用户不存在');
            //echo '用户名不存在';
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
        //
    }
}

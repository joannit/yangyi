<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use App\Http\Requests\Master\MasterCreate;
use App\Http\Requests\Master\Updatepwd;
use App\Http\Requests\Master\Updatepho;
class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 管理员首页
    public function index(Request $request)
    {
        //
        $admin_name=$request->input('admin_name');
        $data=DB::table('admin')->join('admin_role as ar','admin.id','=','ar.aid')->join('role as r','r.id','=','ar.rid')->select('admin.*','r.rname')->orderBy('id','asc')->where('admin_name','like','%'.$admin_name.'%')->get();
// dd($data);

        return view("Admin.Master.index",['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 管理员添加
    public function create()
    {
        //
        // echo 111;
        return view("Admin.Master.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // 执行管理员添加
    public function store(MasterCreate $request)
    {

        // dd($request->all());
        $pwd=$request->input('admin_password');
        $rid=$request->input('rid');
        // dd($rid);
        $data=$request->except('_token','admin_repassword','admin_password','rid');

       $data['admin_password']=Hash::make($pwd);
    // dd($data);
       $lastid=DB::table('admin')->insertGetid($data);

       if ($lastid) {
        // 管理员后插入用户角色表
       $bool=Db::table('admin_role')->insert(['aid'=>$lastid,'rid'=>$rid]);
       // 用户权限节点表插入默认进入首页的权限
       DB::table('role_node')->insert([['rid'=>$lastid,'nid'=>'1'],['rid'=>$lastid,'nid'=>"18"],['rid'=>$lastid,'nid'=>"19"],['rid'=>$lastid,'nid'=>"20"],['rid'=>$lastid,'nid'=>"21"]]);



       if ($bool) {
        return redirect('/admin/master')->with('success','添加成功');
            } else {
                // 如果插入管理员角色表失败则删除新添加添加的管理员信息
                DB::table('admin')->where('id','=',$lastid)->delete();
                return back()->with('error','添加失败');
            }


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
    // 管理员修改
    public function edit($id)
    {
        //
        // echo $id;
    // $data=DB::table('admin')->where('id','=',$id)->first();
    // dd($data);
    $data=DB::table('admin as a')->join('admin_role as ar','a.id','=','ar.aid')->where('a.id','=',$id)->select('a.*','ar.*')->first();
    // dd($data);
        return view('Admin.Master.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 执行更新
    public function update(Request $request, $id)
    {
        //
        // echo $id;
        $rid['rid']=$request->input('rid');
        $status['admin_status']=$request->input('admin_status');
        // dd($rid,$id,$status);
        // 修改状态
        $bool=DB::table('admin')->where('id','=',$id)->update($status);
        // echo $bool;
        // 修改管理等级
        $booll=DB::table('admin_role')->where('aid','=',$id)->update($rid);
    // dd($bool,$booll);
        if ($bool==1 && $booll==1) {
            return redirect('/admin/master')->with('success','成功修改管理员状态和修改管理员等级');
        } elseif ($bool==1 && $booll==0) {
            return redirect('/admin/master')->with('success','成功修改管理员状态');
        } elseif($bool ==0 && $booll==1) {
            return redirect('/admin/master')->with('success','成功修改管理员等级');
        } else{
            return redirect('/admin/master')->with('error','未作修改或者修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 删除管理员
    public function destroy($id)
    {
        // 删除个人信息
        if ($id!=0) {
            $bool=DB::table('admin')->where('id','=',$id)->delete();
            // 删除等级关联节点表
            $booll=DB::table('admin_role')->where('aid','=',$id)->delete();
            // 删除权限节点关联
            $boolll=DB::table('role_node')->where('rid','=',$id)->delete();
            if ($bool) {
                return redirect('/admin/master')->with('success','删除成功');
            } else {
                return redirect('error','删除失败');
            }
        }
    }


    // 后台用户信息修改
    public function admineditpwd()
    {
        // echo 111;
       $name=session('admin_name');
       // dd($name);
           if ($name) {
            $info = DB::table('admin')->where('admin_name','=',$name)->first();
            // dd($info);
             return view('Admin.Master.admineditpwd',['info'=>$info]);
            } else {
                return redirect('/admin')->with('error','执行失败');
            }

        }
        // 执行密码更新
    public function adminupdatepwd (Updatepwd $request)
    {
           // dd($request->all());
            // 旧密码
        $oldpwd=$request->input('oldpassword');
           // 新密码
        $newpwd=Hash::make($request->input('newpassword'));
        $id=$request->input('id');
        $data=DB::table('admin')->where('id','=',$id)->first();

            // dd($data);
            // 检测旧密码是否一样
        $bool=Hash::check($oldpwd,$data->admin_password);
        if ($bool) {
                $booll=DB::table('admin')->where('id','=',$id)->update(['admin_password'=>$newpwd]);
                if($booll) {
                    return redirect('/admin')->with('success','修改密码成功');
                }else {
                   return redirect('/admin')->with('error','修改密码失败');
                }
        } else {

                return back('/admin')->with('error','旧密码错误');
        }


    }

        // 手机号修改
    public function admineditpho ()
    {
        $name=session('admin_name');
       // dd($name);
           if ($name) {
            $info = DB::table('admin')->where('admin_name','=',$name)->first();
            // dd($info);
             return view('Admin.Master.admineditpho',['info'=>$info]);
            } else {
                return redirect('/admin')->with('error','执行失败');
            }
    }
    // 执行手机号修改
    public function adminupdatepho (Updatepho $request)
    {
        // echo 111;
        $phone=$request->input('admin_phone');

        $id=$request->input('id');
        // dd($phone,$id);
        $booll=DB::table('admin')->where('id','=',$id)->update(['admin_phone'=>$phone]);
        if($booll) {
            return redirect('/admin')->with('success','修改成功');
        }else {
            return redirect('/admin')->with('error','修改失败');
        }

    }

}

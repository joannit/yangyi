<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class PowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 分配权限
    public function edit($id)
    {
        //
        // dd($request->all()) ;
        // dd($id);
        $admin=DB::table('role_node')->join('node','node.id','=','role_node.nid')->where('role_node.rid','=',$id)->get();
        // dd($admin);
        foreach ($admin as $val) {
            // $data[]=$val;
            $data[]=$val->id;
            //
        }
        // exit;
        // dd($rid);
        // dd($data);
        $node=DB::table('node')->get();
        // dd($node);
        return view('Admin.Power.setpower',['data'=>$data,'node'=>$node,'id'=>$id]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 执行权限分配
    public function update(Request $request, $id)
    {
        //
    // echo $id;
        $node=$request->input('node');
        // id不能为空防止后面的数据操作失误
        if (empty($id) || count($node)==0){

            return back()->with('error','操作失误，不能给空权限');

        } else {

            // 重新配权限 先删除原来的数据
            $bool=DB::table('role_node')->where('rid','=',$id)->delete();
            if($bool) {
               // 插入新分配的权限
                foreach ($node as $value) {
                    DB::table('role_node')->insert(['rid'=>$id,'nid'=>$value]);
                    // var_dump($value);
                }
                return redirect('/admin/master')->with('success','分配权限成功,被修改的管理员下次登录时生效');
//
            }

        // dd($request->input("node"));
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

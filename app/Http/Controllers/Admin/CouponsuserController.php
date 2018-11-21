<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CouponsuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {	
    	$k=$request->input('keywords');
    	$data=DB::table('couponsuser')->join('user','couponsuser.uid','=','user.id')->join('coupons','couponsuser.ponsid','=','coupons.id')->select('couponsuser.id as cpid','user.id as usid','coupons.id as cid','user.user_name as uname','coupons.pname as pname','couponsuser.p_status as p_status')->where('pname','like','%'.$k.'%')->orderBy('cpid','asc')->paginate(3);
    	//dd($data);
        return view('Admin.Coupons.couponsuser',['data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {	
    	$data=DB::table('coupons')->get();
        return view('Admin.Coupons.adds',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name=$request->input('user_name');
        $id=$request->input('pname');
        //将获取的名字匹配数据
        $data=DB::table('user')->where('user_name','=',$name)->get();
        if(count($data)){ 
        	foreach($data as $value){ 

        	$uid=$value->id;
        	}
        	$res['uid']=$uid;
        	$res['ponsid']=$id;
        	$datas=DB::table('couponsuser')->insert($res);
        	if($datas){ 

        		return redirect('/couponsuser')->with('success','分配成功');
        	}else{ 
        		return back()->with('error','分配失败');
        	}
        }else{
        	return back()->with('error','该用户不存在');
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
        $data=DB::table('couponsuser')->where('id','=',$id)->delete();
        if($data){ 
        	return redirect('/couponsuser')->with('success','删除成功');
        }else{ 
        	return redirect('/couponsuser')->with('error','删除失败');
        }
    }
}

<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class HomeresetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Home.Reset.reset");
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
    //验证手机号
     public function dophones(Request $request)
    { 
    	$phone=$request->input('user_phone');
    	//var_dump($phone);
    	$data=DB::table('user')->where('user_phone','=',$phone)->first();

    	if($data){ 

    		echo 1;
    	}else{ 
    		echo 2;
    	}
    }
    public function phones(Request $request)
    { 
    	$phone=$request->input('user_phone');
    	//return $phone;
    	//dd($request->all());
    	sendphone($phone);
    }
    public function code(Request $request)
    { 
    	$code=$request->input('code');
    	if(\Cookie::get('param') && !empty($code)){

    		if(\Cookie::get('param')==$code){ 

    			echo 1;//验证码正确
    		}else{ 
    			echo 2;//验证码不匹配
    		}

    	}elseif(empty($code)){ 
    		echo 3;//验证码为空
    	}else{ 
    		echo 4;//验证码过期
    	}
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
    public function doreset(Request $request)
    { 

    	$data=$request->except(['_token','smscode']);

    	$data['user_password']=Hash::make($data['user_password']);

    	//var_dump($data);exit;

    	$reset=DB::table('user')->insert($data);

    	if($reset){ 

    		return redirect("/homelogin")->with('success','注册成功,请登录');
    	}else{ 

    		return back()->with('error','注册失败,请认真检查');
    	}
    }
}

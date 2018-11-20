<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

use Hash;
class HomeLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Home.Login.login");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //验证名字
    public function loginname(Request $request)
    { 
    	$name=$request->input('user_name');

    	$data=DB::table('user')->where('user_name','=',$name)->first();

    	//var_dump($data);

    	if(count($data)){ 

    		echo 1;
    	}else{ 

    		echo 2;
    	}

    }
    //验证密码
    public function loginpassword(Request $request)
    { 
    	$pwd=$request->input('user_password');
    	//return $pwd;
    	
    	//return $password;
    	//var_dump()
    	$name=$request->input('user_name');
    	//return $name;
    	$data=DB::table('user')->where('user_name','=',$name)->first();
    	//return $data['user_password'];
    	//return $data;
    	//return $data->user_password;
    	//$user_password=Hash::make($data->user_password);

    	//return $user_password;
    	if(Hash::check($pwd,$data->user_password)){ 

    		echo 1;
    	}else{ 
    		echo 2;
    	}
    }
    public function create(Request $request)
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
       // $data=$request->all();

        //var_dump($data);
        $name=$request->input('user_name');

        $password=$request->input('user_password');

        //var_dump($password);exit;

        $data=DB::table('user')->where('user_name','=',$name)->first();

        if(count($data) && Hash::check($password,$data->user_password)){

        		session(['id'=>$data->id]);
        		session(['user_name',$data->user_name]);
				return redirect("/")->with('success','登录成功');
        }else{
        	return back()->with('error','用户名或密码错误');
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
        //
    }
}

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

        $data=DB::table('user')->where('user_name','=',$name)->first();
        $user=[];
        if(count($data)){

        	if(Hash::check($password,$data->user_password)){
            // 把用户名和id存入session中
           		 $user['id'] = $data->id;
            	$user['name'] = $data->user_name;
            	session(['user' => $user]);
				return redirect("/");
			}else{ 
				return back()->with('error','密码有误');
			}
        }else{
        	return back()->with('error','用户名错误');
        }


    }

    public function outlogin()
    {
       // 清除session
       session()->pull('user');
       echo'<script>alert("退出成功！");location="/login"</script>';

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

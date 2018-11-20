<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

use Config;
//引入表单校验类
use App\Http\Requests\AdminAdventedit;

class AdventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$k=$request->input('keywords');
        $advent=DB::table('advent')->where('url','like',"%".$k."%")->orderBy('id','asc')->paginate(2);

      // dd($advent);
        return view("Admin.Advent.advent",['advent'=>$advent,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.Advent.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    	$request->flash();
        $data=$request->except(['_token']);

      // dd(Config::get('app.app_upload'));
        //图片上传
	        if($request->hasFile('pic')){ 
	        //设置文件格式
	        $filetype=['jpg','png','gif'];
	       	//获取上传文件的名字
	        $ext=$request->file('pic')->getClientOriginalExtension();
	        //随机图片的名字
	        $name=time()+rand(1,9999);
	        if(in_array($ext,$filetype)){
	        //把上传的图片移动到指定的位置下
	        $request->file('pic')->move(Config::get('app.app_upload'),$name.'.'.$ext);
	        //处理
	        $data['pic']=trim(Config::get('app.app_upload')."/".$name.".".$ext,'.');
	        

	        	if(DB::table('advent')->insert($data)){ 
	        		return redirect('/adminadvent')->with('success','添加成功');
	        	}
	        }else{ 
	        	return redirect('/adminadvent/create')->with('error','输入正确的图片格式');
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
       //$id=$id;
        $data=DB::table('advent')->where('id','=',$id)->first();

        return view("Admin.Advent.edit",['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminAdventedit $request, $id)
    {
        //$id=$id;

        //echo $id;exit;
        //修改图片
        $info=DB::table('advent')->where('id','=',$id)->first();

       //dd($info);
        $path=".".$info->pic;
        $data=$request->except(['_token','_method']);
        //$data1=
       //dd($data);
        if($request->hasFile('pic')){ 
        	//设置文件的类型
        	$filetype=['jpg','png','gif'];
        	//获取后缀
        	$ext=$request->file('pic')->getClientOriginalExtension();
        	//随机文件名字
        	$name=time()+rand(1,9999);
        	if(in_array($ext,$filetype)){ 
        		$request->file('pic')->move(Config::get('app.app_upload'),$name.".".$ext);
        		$data['pic']=trim(Config::get('app.app_upload')."/".$name.".".$ext,'.');
        		if(DB::table('advent')->where('id','=',$id)->update($data)){ 
        			unlink($path);
        			return redirect("/adminadvent")->with('success','修改成功');
        		}
        	}else{ 
        		return redirect("/adminadvent/{{$id}}/edit")->with('error','图片格式不正确,必须为jpg,png,gif');
        	}
        }else{ 
        	if(DB::table('advent')->where('id','=',$request->input('id'))->update($data)){

        		return redirect('/adminadvent')->with('success','修改成功');
        	}else{ 
        		//dd(DB::table('advent')->where('id','=',$request->input('id'))->update($data));
        		return redirect('/adminadvent')->with('error','修改失败');	
        	}
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
        $id=$id;
        $info=DB::table('advent')->where('id','=',$id)->first();
        //获取pic
      // dd($info->pic);
        $path=".".$info->pic;

        if(DB::table('advent')->where('id','=',$id)->delete()){ 
        	unlink($path);
        	return redirect('adminadvent')->with('success','删除成功');
        }else{ 
        	return redirect("/adminshop")->with('error','删除失败');
        }
    }
}

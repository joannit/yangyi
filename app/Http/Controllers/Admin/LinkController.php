<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

use Mail;
class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $k=$request->input('keywords');
       $data=DB::table('link')->where('linkname','like',"%".$k."%")->paginate(2);

       return view("Admin.Link.link",['data'=>$data,'request'=>$request->all()]);
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
    public function edit($id)
    {
        $data=DB::table('link')->where('id','=',$id)->first();

        return view('Admin.Link.edit',['data'=>$data]);
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
    	$id=$id;
        $data=$request->except(['_token','_method']);
       	
       

       //	dd($datas);

       	$link=DB::table('link')->where('id','=',$id)->update($data);
		$datas=DB::table('link')->where('id','=',$id)->first();
       	//dd($datas);
		//dd($datas->status);
		$email=$datas->email;
		//dd($email);
       	if($link){ 
       		if($datas->status==1){
	       		Mail::raw('审核通过,请前往页面查看',function($message)use($email){
		       		//发送主题
					$message->subject('审核结果');
					//接收方
					$message->to($email);
	       		});
	       	}else{ 
	       		Mail::raw('审核未通过',function($message)use($email){
	       			//发送主题
					$message->subject('审核结果');
					//接收方
					$message->to($email);
	       		});
	       	}
      		return redirect("/admin/link")->with('success','修改成功');

       	}else{ 

       		return back()->with('error','修改失败');
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
        $data=DB::table('link')->where('id','=',$id)->delete();
        if($data){ 
        	return redirect("/admin/link")->with('success','删除成功');
        }else{ 
        	return redirect("/admin/link")->with('error','删除失败');
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\Amincouponsinsert;
use App\Http\Requests\Amincouponsedit;
class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$k=$request->input('keywords');
    	switch($k){ 
    		case '满减':
    			$k= 0;
    			break;
    		case '打折':
    			$k= 1;
    			break;
    	}
    	//dd($k);
    	$data=DB::table('coupons')->where('type','like','%'.$k.'%')->orderBy('id','asc')->paginate(3);
    	//dd($data);
        return view('Admin.Coupons.coupons',['data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       	return view('Admin.Coupons.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Amincouponsinsert $request)
    {
        $data=$request->except(['_token']);
        $data['number']=time();
        $res=DB::table('coupons')->insert($data);
        if($res){ 
        	return redirect("/coupons")->with('success','添加成功');
        }else{ 
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
    public function edit($id)
    {
        $data=DB::table('coupons')->where('id','=',$id)->first();

        return view('Admin.Coupons.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Amincouponsedit $request, $id)
    {
        $data=$request->except(['_method','_token']);
        //dd($data);
        if(DB::table('coupons')->where('id','=',$id)->update($data)){

        	return redirect('/coupons')->with('success','修改成功');

        }else{ 

        	return back()->withInput()->with('error','修改失败,可能原因->数据未做改变');
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
        $data=DB::table('coupons')->where('id','=',$id)->delete();
        if($data){ 
        	return redirect('/coupons')->with('success','删除成功');
        }else{ 
        	return redirect('/coupons')->with('error','删除失败');
        }
    }

    //时间比较
    public function timess(Request $request)
    { 
    	//$time=$request->input('time');
    	//echo $time;exit;
    	$times=strtotime('2018-11-20');
    	$time=time();
    	var_dump($time);
    	var_dump($times);
    }
}

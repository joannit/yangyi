<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
class AdminimagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
         $k=$request->input('keywords');

        //轮播图列表
        $data=DB::table("images")->where('ID','like','%'.$k.'%')->orderBY('id','asc')->paginate(5);
        //加载
        //
        // dd($data);
        return view("Admin.images.index",['data'=>$data,'request'=>$request->all]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('Admin.images.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //判断是否具有文件上传
        if($request->hasFile('pic')){
        //初始化名字
        $name=time()+rand(1,10000);
        //获取上传文件后缀
        $ext=$request->file("pic")->getClientOriginalExtension();
        // dd($ext);//移动到指定的目录下（提前在public下新建uploads目录）
        $request->file("pic")->move("./uploads",$name.".".$ext);
        if(DB::table('images')->insert( ['pic'=>$name.'.'.$ext] )){
            return redirect('/adminimages')->with('success','添加成功'); 
       }else{
            return redirect('/adminimages')->with('error','未做修改');
       }
        
        
    }else{
        return redirect('/adminimages')->with('error','未上传图片');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 加载修改页面
        $data = DB::table('images')->where('id','=',$id)->first();
       
        return view('Admin.images.edit',['data'=>$data]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(request $request, $id)
    {
        /// 处理修改
        $data=($request->except('_token','_method'));
        $row = DB::table('images')->where('id','=',$id)->first();
        // 获取旧图片名
        $pic = $row->pic;
        // 检测是否有图片上传
        if($request->hasFile('pic')){
            // 设置文件格式
            $filetype = ['jpg','png'];
            $ext=$request->file("pic")->getClientOriginalExtension();
            // 检测格式是否正确
            if(in_array($ext,$filetype)){
                $name = '2018'.uniqid().'.'.$ext;
                // 处理上传的图片名
                $data['pic']=$name;
                if(DB::table('images')->where('id','=',$id)->update($data)){
                // 将上传的图片移入文件夹中
                $request->file("pic")->move("./uploads",$name);
                // 删除旧图片
                unlink('./uploads/'.$pic);
                return redirect('/adminimages')->with('success','修改成功');
                } 
             }else{
                return redirect('/adminimages/create')->with('error','请上传jpg或png格式图片');

             }                 
        }else{
            // 没有图片上传
            $data=($request->except('_token','_method','pic'));
            if(DB::table('images')->where('id','=', $id) ->update($data)){
                return redirect('/adminimages')->with('success','修改成功');    
            }else{
                return redirect('/adminimages')->with('error','未做修改');
            }
            
        }
    }
    /**
     * Remove the specified resource from storage.
          * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //删除
        $data=DB::table("images")->where("id",'=',$id)->first();
        $pic=$data->pic;

        //var_dump($id);exit;
         if(DB::table("images")->where("id",'=',$id)->delete()){
            unlink('./uploads/'.$pic);
            return redirect('/adminimages');
            }
    }

}

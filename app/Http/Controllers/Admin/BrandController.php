<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

// 添加品牌上传验证
use App\Http\Requests\Brand\BrandRequest;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // dd($request->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd($request->all());
        $id=$request->input('id');
        // dd($id);
        return view('Admin.Brand.create',['tid'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        $request->flash();
       $tid=$request->input('tid');

        //处理商品添加
        $data=($request->except('_token','bpic'));
        // 检测是否有文件上传
        // dd($request->hasFile('bpic'));
        if($request->hasFile('bpic')){
            // 设置文件格式
            $filetype = ['jpg','png'];
            // 后缀
            $ext=$request->file("bpic")->getClientOriginalExtension();
            // dd($ext);
            $name = date('Ym',time()).uniqid().'.'.$ext;
            // dd($name);
            if(in_array($ext,$filetype)){
                $data['bpic']=$name;
                // dd($data);

                // dd($result);
                if(DB::table('brand')->insert($data)) {
                // 将上传的图片移入文件夹中
                    // dd($tid);
                $request->file("bpic")->move("./uploads/brand",$name);
                return redirect('/admin/brand/'.$tid)->with('success','添加成功');
                } else {
                    return back()->with('error','未知错误,添加失败');
                }
            }else{
                return back()->with('error','请上传jpg或png格式图片');
            }
        } else {
            return back()->with('error','选择上传图片');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // 品牌首页
    public function show(Request $request,$id)
    {
        // $id=0;
        // 搜索品牌名字关键字
        $keywords=$request->input('keywords');
        // dd($keywords);
        // dd($id);
        if (empty($id)) {
            return back()->with('error','操作失败');
        }
        // 搜索所属类 查询类名放置标题
        $name=DB::table('type')->where('id','=',$id)->first()->name;
        // dd($name);
        $data=DB::table('brand')->where('tid','=',$id)->where('name','like','%'.$keywords.'%')->paginate(4);
        // dd($data);
        return view('Admin.Brand.index',['data'=>$data,'request'=>$request,'name'=>$name,'id'=>$id]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 品牌修改
    public function edit($id)
    {

        // echo $id;
        $data=DB::table('brand')->where('id','=',$id)->first();
        // dd($data);
        return view('Admin.Brand.edit',['data'=>$data]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, $id)
    {
        //
        // dd($request->input('name'),$id);
        $data['name']=$request->input('name');
        $tid=$request->input('tid');
        // dd($tid);


        // 判断是否有新图片上传 如果有则替换旧图片
        if($request->hasFile('bpic')){
            // 设置文件格式
            $filetype = ['jpg','png'];
            // 后缀
            $ext=$request->file("bpic")->getClientOriginalExtension();
            // dd($ext);
            $name = date('Ym',time()).uniqid().'.'.$ext;
            // dd($name);
            if(in_array($ext,$filetype)){
                $data['bpic']=$name;
                // dd($data);
                    // 查询旧图片
               $oldbpic=DB::table('brand')->where('id','=',$id)->first()->bpic;
               // 删除旧图
               // dd($data);
                @unlink('./uploads/brand/'.$oldbpic);
                if(DB::table('brand')->where('id','=',$id)->update($data)) {
                // 将新上传的图片移入文件夹中
                $request->file("bpic")->move("./uploads/brand",$name);

                return redirect('/admin/brand/'.$tid)->with('success','修改成功');
                } else {
                    return back()->with('error','未知错误,修改失败');
                }
            }else{
                return back()->with('error','格式不正确，请上传jpg或png格式图片');
            }
        } else {

            // 没有没有上传新图
             if(DB::table('brand')->where('id','=',$id)->update($data)){

                return redirect('/admin/brand/'.$tid)->with('success','修改成功');
                } else {
                    return back()->with('error','修改失败，可能品牌名未做修改');
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
        //
            // echo $id;
       $bpic= DB::table('brand')->where('id','=',$id)->first()->bpic;
       // dd($data);
        if ($bpic) {
            if (DB::table('brand')->where('id','=',$id)->delete()) {
                @unlink('./uploads/brand/'.$bpic);
                return back()->with('success','删除成功');
            } else {
                return back()->with('error','删除失败');
            }
        } else {
            return redirect('/admin')->with('error','未知错误');
        }

    }
}

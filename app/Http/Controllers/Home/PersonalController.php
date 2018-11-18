<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// 导入模型
use App\Models\Home\Users;
use DB;
// 导入Hash
use Hash;
class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = session('user')['id'];
        
        // 查询个人信息
        $user_info = DB::table('user')->join('user_info','user.id','=','user_info.uid')->select('user.user_level','user_info.*')->where('user.id','=',$id)->first();
        // dd($user_info);
        // 加载个人中心首页
        if($user_info){
            return view('Home.Personal.index',['user_info'=>$user_info]);
        }else{
            $user_info=array();
             return view('Home.Personal.index',['user_info'=>$user_info]);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $info=Users::where('uid','=',$id)->get();
        // 个人资料
        if(count($info)>0){
            return view('Home.Personal.dataedit',['info'=>$info[0]]);
        }else{
            return view('Home.Personal.data');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 文件上传方法
    public function uploads($request,$pic)
    {
        $ext = $request->file($pic)->getClientOriginalExtension();
        $filename = '2018'.uniqid().'.'.$ext;
        // 判断图片格式
        if($ext == 'jpg' || $ext == 'png'){
            return $filename;
           }else{
            return false ;
           }
    }

    // 个人资料修改
    public function update(Request $request, $id)
    {
        $data = $request->except('_token','_method');
        $info = Users::where('uid','=',$id)->get();
        // 有数据处理修改操作 
        if(count($info)>0){
            // 如果有图片上传
            if($request->hasFile('pic')){
                $info = Users::where('uid','=',$id)->get();
                // 获取旧图片名
                $file = $info[0]->pic;
                // 处理图片名
                $result = $this->uploads($request,'pic');
            if($result){
                    $data['pic'] = '/uploads/user/'.$result;
                    if(Users::where('uid','=',$id)->update($data)){
                        $request->file('pic')->move('./uploads/user/',$result);
                        unlink('.'.$file);
                        echo '<script>alert("修改成功！");location="/personal/'.$id.'/edit"</script>';
                    }else{
                        echo '<script>alert("修改失败！");location="/personal/'.$id.'/edit"</script>';
                    }
                }else{
                    echo '<script>alert("图片上传失败！");location="/personal/'.$id.'/edit"</script>';
                }
            }else{
                // 没有图片上传
               if(Users::where('uid','=',$id)->update($data)){
                    echo '<script>alert("修改成功！");location="/personal/'.$id.'/edit"</script>';
                }else{
                     echo '<script>alert("修改失败！");location="/personal/'.$id.'/edit"</script>';
                } 
            }
                
        }else{
        // 没有数据做添加操作
        $data['uid']=$id;
        // 如果有图片上传
        if($request->hasFile('pic')){
            $result = $this->uploads($request,'pic');
                if($result){
                    $data['pic'] = '/uploads/user/'.$result;
                    if(Users::create($data)){
                        $request->file('pic')->move('./uploads/user/',$result);
                        echo '<script>alert("修改成功！");location="/personal/'.$id.'/edit"</script>';
                    }else{
                        echo '<script>alert("修改失败！");location="/personal/'.$id.'/edit"</script>';
                    }
                }else{
                    echo '<script>alert("图片上传失败！");location="/personal/'.$id.'/edit"</script>';
                }
            }else{
            // 没有图片上传
                if(Users::create($data)){
                        echo '<script>alert("修改成功！");location="/personal/'.$id.'/edit"</script>';
                }else{
                        echo '<script>alert("修改失败！");location="/personal/'.$id.'/edit"</script>';
                    }
            
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
    }



    // 加载收货地址
    public function address()
    {
        $id = session('user')['id'];
        // 获取当前用户所有地址
        $info = DB::table('address')->where('uid','=',$id)->get();
        return view('Home.Personal.address',['info'=>$info]);
    }

    // ajax城市级联
    public function city(Request $request)
    {
    // echo json_encode($request->all());
        $upid  = $request->input('upid');
        $data = DB::table('district')->where('upid','=',$upid)->get();
        echo json_encode($data);
    }
    // 处理收货地址添加
    public function createadd(Request $request)
    {
       $add = $request->input('city');
       $addinfo = $request->input('address_info');
       $str ='/请选择/';
       $bool=preg_match($str,$add);
       // 地址正则
        if($bool){
            echo '<script>alert("地址选择有误");location="/paddress"</script>';
            exit;
        }
        // 拼接地址
        $address = $add.$addinfo;
        $data=$request->except('_token','address_info','city');
        $data['address'] = $address;
        $data['uid']=session('user')['id'];
        if(DB::table('address')->insert($data)){
            echo '<script>alert("添加成功！");location="/paddress"</script>';
        }else{
            echo '<script>alert("添加失败！");location="/paddress"</script>';
        }
    }

    // 修改地址为默认方法
    public function default($id){
        // 把当前用户所有地址设为非默认
        DB::table('address')->where('uid','=',session('user')['id'])->update(['default' => 0]);
        // 把选择地址id设为默认
        DB::table('address')->where('id','=',$id)->update(['default' => 1]);
        return  redirect('/paddress');

    }
    // 删除地址
    public function deladdress($id)
    {
        if(DB::table('address')->where('id','=',$id)->delete()){
            return  redirect('/paddress');
        }else{
            echo '<script>alert("删除失败！");location="/paddress"</script>';
        }
    }
    // 修改地址
    public function editadd($id)
    {
        $info = DB::table('address')->where('id','=',$id)->first();
        return view('Home.Personal.addressedit',['info'=>$info]);
    }
    // 处理收货地址修改
    public function doeditadd(Request $request)
    {
        $id = $request->input('id');
        $add = $request->input('city');
        $addinfo = $request->input('address_info');
        $str ='/请选择/';
        $bool=preg_match($str,$add);
            // 地址正则
            if($bool){
                echo '<script>alert("地址选择有误");location="/paddress/editadd/'.$id.'"</script>';
                exit;
            }
            // 拼接地址
            $address = $add.$addinfo;
            $data=$request->except('_token','address_info','city','id');
            $data['address'] = $address;
        if(DB::table('address')->where('id','=',$id)->update($data)){
            echo '<script>alert("修改成功！");location="/paddress"</script>';
        }else{
            echo '<script>alert("修改失败！");location="/paddress/editadd/'.$id.'"</script>';
        }
    }
    // 处理密码修改
    public function editpwd()
    {
        // 加载修改密码页面
        return view('Home.Personal.editpwd');
    }
    // 验证密码
    public function editpwds(Request $request)
    {
        $pwd = $request->input('user_password');
        $p=DB::table('user')->where('id','=',session('user')['id'])->value('user_password');
        if(Hash::check($pwd,$p)){
            return view('Home.Personal.restpwd');
        }else{
           echo '<script>alert("原密码输入不正确");location="/editpwd"</script>';
        }
    }
    // 处理密码修改
    public function doeditpwd(Request $request)
    {
        $p = Hash::make($request->input('user_password'));
        if(DB::table('user')->where('id','=',session('user')['id'])->update(['user_password'=>$p])){
            // 清除session
            session()->pull('user');
            echo '<script>alert("修改成功,请重新登录!");location="/login"</script>'; 
        }else{
            echo '<script>alert("修改失败!");location="/editpwd"</script>'; 
        }
    }
}

@extends('Home.Personal.public')
@section('right')


<div class="pull-right">
                <div class="user-content__box clearfix bgf">
                    <div class="title">账户信息-物流查询</div>
                    <form action="" class="user-addr__form form-horizontal" role="form">
                       <div class="help-block">选择快递公司：<span class="cr"></span>
                       <select style="width: 150px;height: 30px;" id="type">
                        
                           <option value="zhongtong">中通</option>
                           <option value="yunda">韵达</option>

                       </select>
                       </div>
                       <br>
                        <div class="input-group col-sm-6">
                            <input class="form-control" placeholder="快递单号" type="text">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button">查询</button>
                            </span>
                        </div>
                        <div class="help-block">例如，您可以输入：<span class="cr">40105060123</span></div>
                        <div class="query-result__box"></div>
                        <script>

                            $(document).ready(function(){
                                // 模拟查询请求
                                $('.btn-primary').on('click',function() {
                                    var type = $('#type').val();
                                    var postid = $('.form-control').val();
                                    $.get('/doexpress',{type:type,postid:postid},function(data){
                                        console.log(data);
                                        $('.query-result__box').html('');
                                        $str = '';
                                        $.each(data.data,function(i,val){
                                        $str = $str + '<tr>';
                                        $str = $str + '<td> '+val.time+' </td>';
                                        $str = $str + '<td> '+val.context+' </td>';
                                        $str = $str + '</tr>';
                                        });
                                       $('.query-result__box').html('').append($str);
                                    },'json');
                            
                                });
                               });
                              

                                    // if ($('.form-control').val() == '40105060123') {
                                    //     $('.query-result__box').html('');
                                    // } else {
                                    //     $('.query-result__box').html(`
                                    //         <div class="no-date">
                                    //             <p class="cr">很抱歉，您的快递单号暂时没有查询结果！</p>
                                    //             <p class="fz12 c6">您可以检查下快递单号是否正确</p>
                                    //         </div>
                                    //     `);
                                    // }
                               
                           
                        </script>
                    </form>
                </div>
            </div>
@endsection
@section('title','个人资料')

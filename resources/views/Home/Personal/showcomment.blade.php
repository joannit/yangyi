@extends('Home.Personal.public')
@section('right')
<div class="pull-right">
        <div class="user-content__box clearfix bgf">
          <div class="title">订单中心-商品评价</div>
        </div>
          <div class="modify_div">
            <form action="" class="evaluate-form__box" method="post">
              
              <table class="table table-bordered">
                <tbody><tr>
                  <th scope="row">评价等级</th>
                  <td class="user-form-group fz0">
                    <label><input name="level" value="1" checked="" type="radio" @if($info->level==1) checked @endif><i class="iconfont icon-radio"></i> <span>好评</span></label>
                    <label><input name="level" value="2" type="radio" @if($info->level==2) checked @endif ><i class="iconfont icon-radio"></i> <span>中评</span></label>
                    <label><input name="level" value="3" type="radio" @if($info->level==3) checked @endif><i class="iconfont icon-radio"></i> <span>差评</span></label>
                  </td>
                </tr>
                <tr>
                  <th scope="row">评价商品</th>
                  <td><textarea rows="5" placeholder="请输入您对该商品的评价~" name="content" disabled="">{{$info->content}}</textarea></td>
                </tr>
                <tr>
                  <th scope="row">商家回复</th>
                  <td>{!!$info->recontent!!}</td>
                </tr>
              </tbody></table>
              <div class="checkbox">
              </div>
              </form>
              <script>
                $(document).ready(function(){
                  var tmpl = '<li class="uploader__file"><input name="i[]" accept="image/*" type="file"><i>&times;</i></li>',
                    $uploader_files = $('.uploader__files'),
                    $uploader_input = $('.uploader__input'),
                    $uploader_size = $('.uploader__size span');
                  $uploader_input.on('click',function() {
                    var size = $uploader_files.find('li').length;
                    if (size >= 5) {return DJMask.msg("最多上传5张图片！");}
                    var $input = $(tmpl);
                    $uploader_files.append($input);
                    $uploader_size.html(size + 1);
                    $input.on('click','i',function() {
                      $(this).parent().remove();
                      $uploader_size.html($uploader_files.find('li').length);
                    });
                    $input.on('change','input',function(e) {
                      var src, url = window.URL || window.webkitURL || window.mozURL, files = e.target.files, that = this;
                      for (var i = 0, len = files.length; i < len; ++i) {
                        var file = files[i];
                        if (url) {
                          src = url.createObjectURL(file);
                        } else {
                          src = e.target.result;
                        }
                        $input.css({'background-image':'url('+src+')'}).addClass('active');
                      }
                    });
                    $input.find('input').click();
                  })
                });
              </script>
            
          </div>
        </div>
      </div>
@endsection
@section('title','个人中心')
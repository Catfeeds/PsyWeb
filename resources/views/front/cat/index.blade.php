@extends('front.partial.base')

@section('css')
<style>
ul.activity-list {
    list-style-type: none;
    padding: 0;
}

ul.activity-list li {
    display: inline-block;
    width: 100%;
    margin-bottom: 30px;
    /*padding-bottom: 20px;*/
    border-bottom: 1px solid #eff0f4;
}

ul.activity-list .avatar img {
    float: left;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    -webkit-border-radius: 50%;
}
ul.activity-list .activity-desk {
    margin-left: 70px;
}

ul.activity-list .activity-desk h5 {
    color: #2a323f;
}

ul.activity-list .activity-desk h5 a {
    font-weight: 500;
}

.activity-desk .album a {
    float: left;
    margin-right: 10px;
    width: 170px;
    height: 110px;
    overflow: hidden;
    margin-bottom: 10px;
}

.activity-desk .album a img {
    width: 100%;
}
</style>

@endsection

@include('front.cat.seo')

@section('content')
<div class="wrap-b pt-30 pb-50">
    <div class="wrap clearfix main">
                <div class="left fl clearfix">
                        <div class="left-left fl">
                                
                                <!--.侧边导航-->
                                    <div class="sidenav">
                                        <h3 class="sidenav-head">{!! $category->name !!}</h3>
                                    </div>

                                <!--/.侧边导航-->
                                
                        </div>

                        <div class="left-main fr">
                                
                                <!--.文章列表-->
                                    <div class="ls-list mb-30">               
                                        <div id="_elm" data-id="6721" data-page="1" data-channel="9">
                     
                                            <div class="news-wrapper">
                                                @foreach ($posts as $post)
                                                        <div class="ma-modone clearfix nbt pt-0"><a href="/post/{!! $post->id !!}" target="_blank" class="fl ma-modone-left"><img src="{!! $post->image !!}" class="all-img"></a><div class="ma-modone-right fl"><a href="/post/{!! $post->id !!}" target="_blank" class="ma-modone-right-title">{!! $post->name !!}</a><div class="ma-modone-right-content">{!! $post->brief !!}<a href="/post/{!! $post->id !!}" target="_blank" class="a-hover">[详细]</a></div><div class="ma-modone-right-time">{!! $post->created_at !!}</div></div></div>
                                                @endforeach
     

                                            </div>
                                        </div>
                                    </div>
                                <!--/.文章列表-->
                                
                                <!--.翻页
                                    <div class="wrap-list-paging mt-20">
                                       <p><span class="current">1</span><a href="list_6721_2.html">2</a><a href="list_6721_3.html">3</a><a href="list_6721_4.html">4</a> ...&nbsp;&nbsp;<a href="list_6721_93.html">93</a><a href="list_6721_2.html">下一页</a><a href="list_6721_93.html">末页</a></p>
                                    </div>-->
                                <!--/.翻页-->
                                @if($category->slug=='PsychologyGuide')
                                <!--心事吐槽-->
                                   <div class="row">
                                      <div class="col-md-12">
                                        <div class="panel">
                                          <header class="panel-heading" style="color: #666;font-size: 24px;"> 心事吐槽  </header>
                                          <div class="panel-body" style="display: block;" id="team-table" data-status="show">
                                            <ul class="activity-list">

                                              @foreach($message as $item)
                                                <li>
                                                  <div class="avatar"> <a href="javascript:;"><img src="{!! empty($item->realiseUserImg)?'/uploads/touuxiang.jpg':$item->realiseUserImg !!}"></a> </div>
                                                  <div class="activity-desk">
                                                    <h5><a href="javascript:;">{!! $item->name !!}:</a> <span>{!! $item->info !!}</span></h5>
                                                    <p class="text-muted">发布时间:{!! $item->created_at !!}</p>
                                                  </div>
                                                </li>
                                              @endforeach
                                                
                                     
                                            
                                              
                                            </ul>
                                            <form class="form-horizontal" id="knowledge-comment-form" action="" novalidate="novalidate">
                                              <a name="commenta"></a>
                                              <div class="form-group">
                                                <div class="col-sm-12">
                                                  <textarea name="comment" id="content" rows="6" class="form-control" placeholder="我要吐槽……"></textarea>
                                                  <br>
                                              
                                                  <button type="button" id="comment_add"  class="btn btn-primary pull-right">我要吐槽</button>
                                                </div>
                                              </div>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                <!--/心事吐槽-->
                                @endif
                                
                        </div>
                </div>


                <div class="right fr">
                    
                    <!--.搜索-->
                       <form class="search clearfix"  action="/">
                            <input type="text" name="word" class="fl search-inp" placeholder="请输入关键字">
                  
                            <button class="fl search-btn" type="submit">
                                搜索
                            </button>
                        </form>
                    <!--/.搜索-->
                    
                    
                    <!--.图片广告-->
                        <div style="margin-bottom: 20px">
                            <fh-ad-plus fh-ad-pid="27"></fh-ad-plus>
                        </div>
                    <!--/.图片广告-->
                    
         @include('front.partial.right')
                    
                </div>
                </div>
                </div>
            </div>
</div>
@endsection

@section('js')
<script src="{{ asset('layer_mobile/layer.js') }}"></script>
<script type="text/javascript">
  //吐槽评论点击接口
  $('#comment_add').click(function(){
    //获取评论内容
    var contents=$('#content').val();
        if(contents==''){
          alert('请输入评论内容!');
          return false;
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
        $.ajax({
            url: '/auth/messageBoard',
            type: 'POST',
            data:{content:contents},
            success: function(data) {
              //data 服务器传过来的数据
              if(data.code==0){

                //alert('评论成功');
                //无刷新插入数据
                $('.activity-list').append('<li><div class="avatar"><a href="javascript:;"><img src="/uploads/touuxiang.jpg"></a></div><div class="activity-desk"><h5><a href="javascript:;">'+data.message.name+':</a><span>'+data.message.info+'</span></h5><p class="text-muted">发布时间:'+data.message.created_at+'</p></div></li>');
                //清空输入框
                $('#content').val('');

              }
            }
          });
  });

</script>
@endsection
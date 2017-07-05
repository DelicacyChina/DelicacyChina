<div class="space_wrap">
    <div class="space_info w">
        <div class="mod clear">
            <div class="pic">
                <a href="">
                    <img class="imgLoad" src="{{$user->icon}}"  width="150" height="150" alt="">
                </a>
            </div>
            <div class="detail">
                <div class="subname">
                    <em><a href="">{{$user->u_username}}</a></em>
                    <i class="space_icon" id="icon_sex"></i>
                    <br>
                    <i class="messagenum">{{$user->created_at}}</i>
                </div>
            </div>
            @if(!(isset(Auth::user()->id) && Auth::user()->id == $user->id))
                <div class="subbtn left">
                    <a href="javascript:void(0)" class="attention" user-id="{{$user->id}}" id="att">
                        <span class="num1">
                            <i class="space_icon"></i>关注
                        </span>
                        <span class="num2">
                            <i class="space_icon"></i>已关注</span>
                        <span class="num3">
                            <i class="space_icon"></i>互相关注</span>
                        <span class="num4">&nbsp;|&nbsp;</span>
                        <span class="num5">取消</span>
                    </a>
                    <a href="javascript:void(0);" id="sixin" class="letter" data-id="6591561">发私信</a>
                    <div class="ui-dialog-inner" data-dom="inner" style="display: none; position: absolute;left:250px;top:85px">

                        <div class="ui-dialog-header" data-dom="header">
                            <div class="ui-dialog-title-outer">
                                <div id="ui-dialog-title-artDialog14988946716070" data-dom="title" class="ui-dialog-title">发私信</div>
                                <a class="ui-dialog-close" href="javascript:;" data-dom="close" title="取消"></a>
                            </div>
                        </div>
                        <div class="ui-dialog-main" data-dom="main" style="width: 500px; height: auto;">
                            <div id="ui-dialog-content-artDialog14988946716070" data-dom="content" class="ui-dialog-content">
                                <div id="sixin_c">
                                    <div class="sixin_more clear">
                                        <span id="infolastword">还可以输入<b>200</b>字</span>
                                    </div>
                                    <textarea id="sixin_msg">
                                </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="ui-dialog-footer" data-dom="footer">
                            <div class="ui-dialog-buttons" data-dom="buttons">
                                <a href="javascript:;"  id="fasong" class="ui-dialog-button ui-dialog-button-on">发送</a>
                                <a href="javascript:;" class="ui-dialog-button">取消</a>
                            </div>
                        </div>
                    </div>

                </div>
                @if(isset($friend[0]))
                    <script>
                         $('#att').attr('class','setattention')
                    </script>
                @endif
            @endif
        </div>
    </div>
</div>
<div class="space_nav_wrap">
    <ul>
        <li><a title="菜谱" href="{{url('home/center/index/'.$user->id)}}" id="recipe">菜谱</a></li>
        <li><a title="话题" href="{{url('home/center/pai/'.$user->id)}}" id="pai">话题</a></li>
        <li><a title="日志" href="{{url('home/center/blog/'.$user->id)}}" id="blog">日志</a></li>
        <li><a title="h好友" href="{{url('home/center/friend/'.$user->id)}}" id="friend">好友</a></li>
    </ul>
</div>

<script>
    var sex = "{{$user->sex}}"
    if(sex==1){
        $('#icon_sex').addClass('man')
    }  else {
        $('#icon_sex').addClass('woman')
    }

    // 未关注 点击变关注
    $('.subbtn ').on('click','#attr',function(){
        var fid = "{{$user->id}}"
        $.ajax({
            url:'{{url("home/personal/center/friend/addFriend")}}',
            data:{fid:fid},
            type:'get',
            success:function(data){
                alert('关注成功');
                $('#attr').attr('class','setattention');
            }
        })
    })
    $('.subbtn ').on('click','.setattention',function(){
        var fid = "{{$user->id}}"
        $.ajax({
            url:'{{url("home/personal/center/friend/delFriend")}}',
            data:{fid:fid},
            type:'get',
            success:function(data){
                alert('取消成功');
                $('#attr').attr('class','attention');
            }
        })
    })
</script>
<script>

    $('.letter').click(function(){
        $('.ui-dialog-inner').show(600);
    })

    $('#fasong').click(function(){
        var msg = $('#sixin_msg').val();
        var fid =  "{{$user->id}}"
        $.ajax({
            url:"{{url('home/personal/center/friend/sendLetter')}}",
            type:'get',
            data:{fid:fid,msg:msg},
            dataType:'json',
            success:function (data) {
                alert('发送成功');
                $('.ui-dialog-inner').hide(600)
                //window.location.reload();
            }
        })
    })

    $('.ui-dialog-close').click(function(){
        $('.ui-dialog-inner').hide(600)
    })

    $('.ui-dialog-button').click(function(){
        $('.ui-dialog-inner').hide(600)
    })
</script>
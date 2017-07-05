@extends('layouts.home')
@section('title','注册')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('home/css/login.css')}}">
    <script type="text/javascript" src="{{url('admin/js/jquery1.42.min.js')}}"></script>
@endsection
@section('content')
    <img class="vegas-background" src="{{url('home/images/register.jpg')}}" style="position: fixed; left: 0px; top: -282.664px; width:100%; height:1080px; bottom: auto; right: auto;">
    <div class="loginbox">
        <div class="loginbox_h">
            <a href="{{url('home/register')}}" class="on" >注册</a>
            <a href="{{url('home/login')}}" >登录</a>
        </div>
        <div class="loginbox_c">
            <form id="registerform" onsubmit="return false" name="loginform" action="{{url('home/doregister')}}" method="post">
                {{csrf_field()}}
                <div class="loginbox_l">
                    <div id="message">
                        <span id="messName"></span>
                        <span id="messEmail"></span>
                    </div>
                    <ul class="mform_r">
                        <li><label for="username" >昵  称：</label><input type="text" name="u_username" id="name"   /></li>
                        <li><label for="email" >邮  箱：</label><input type="email" name="u_email" id="email"   /></li>
                        <li><label for="password" >密  码：</label><input type="password" name="password" id="password" /></li>
                        <li style="border:0;"><label for="password" >确认密码：</label><input type="password" name="repassword" id="repassword" /></li>
                    </ul>
                    <input type="submit" id="loginbtn" class="loginbtn" value="注&nbsp;册"/>
                </div>
            </form>
        </div>
    </div>
    <script>
        $('#name').blur(function(){
            token = "{{csrf_token()}}"
            $.ajax({
                url:'{{url("home/register/checkname")}}',
                data:{name:$('#name').val(),_token:token},
                type:'post',
                success:function(data){
                    if(data == 0){
                        $('#messName').html('用户名存在')
                    } else {
                        $('#messName').html('')
                    }
                }
            })
        })
        $('#email').blur(function(){
            token = "{{csrf_token()}}"
            $.ajax({
                url:'{{url("home/register/checkemail")}}',
                data:{email:$('#email').val(),_token:token},
                type:'post',
                success:function(data){
                    if(data == 0){
                        $('#messEmail').html('邮箱已存在')
                    } else {
                        $('#messEmail').html('')
                    }
                }
            })
        })
        $('#loginbtn').click(function(){
            var flag = true;
            if($('#messName').html()!=''){
                flag = false
            }
            if($('#messEmail').html()!=''){
                flag = false
            }
            var password = $('#password').val()
            var repassword = $('#repassword').val()
            if( $('#name').val() == '')
            {
                alert('用户名不能为空')
                flag = false
            }

            if($('#email').val().indexOf('@') < 0)
            {
                alert('邮箱格式不正确')
                flag = false
            }
            if (password == '')
            {
                alert('密码不能为空')
                flag = false
            }
            if(password !== repassword)
            {
                alert('两次密码不一致')
                flag = false
            }
            if(flag){
                 $('#registerform').attr('onsubmit','true');
            }
        })
    </script>
@endsection
@section('footer')
@endsection



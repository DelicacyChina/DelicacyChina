@extends('layouts.home')
@section('title','登录中心')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('home/css/login.css')}}">
    <script type="text/javascript" src="{{url('admin/js/jquery1.42.min.js')}}"></script>
@endsection
@section('content')
    <img class="vegas-background" src="{{url('home/images/register.jpg')}}" style="position: fixed; left: 0px; top: -282.664px; width:100%; height:1080px; bottom: auto; right: auto;">
    <div class="loginbox">
        <div class="loginbox_h">
            <a href="{{url('home/register')}}" >注册</a>
            <a href="{{url('home/login')}}" class="on">登录</a>
        </div>
        <div class="loginbox_c" style="height: 300px;">
            <form id="loginform" name="loginform" onsubmit="return false" action="{{url('home/dologin')}}" method="post">
                <div class="loginbox_l">
                    <a href="{{url('home/personal/setting/foundPwd')}}">找回密码</a>
                    <ul class="mform_r">
                        {{csrf_field()}}
                        <li><label for="username" >用户名：</label><input type="text" name="u_username" id="username"   /></li>
                        <li>
                            <label for="password" >密码：
                            </label><input type="password" name="password" id="password" />
                        </li>
                        <li><label for="yzm" >验证 :</label><input type="text" name="yzm" id="yzm"/></li>
                        <p align="center">
                            <img src="{{url(captcha_src())}}" class="yzm-img" id="yzmimg" onclick="this.src = '{{url(captcha_src())}}?'+Math.random()"/>
                        </p>
                    </ul>
                    <input type="submit" id="loginbtn" class="loginbtn" value="登&nbsp;录"/>
                </div>
            </form>
        </div>
    </div>
    <script>
        $('#yzm').blur(function(){
            var token = "{{csrf_token()}}"
            $.ajax({
                url:'/home/login/yzm',
                data:{'yzm':$('#yzm').val(),_token:token} ,
                type:'post',
                async:true,
                success:function(data){
                    if(!data){
                        alert('验证码不正确');
                        $('#yzm').val('');

                    }
                },
                error:function(){
                }
            })
        })
        $()
        $('#loginbtn').click(function(){

            var flag = true;
            var yzm = $('#name').val()
            var u_username = $('#username').val()
            var password = $('#password').val()
            if(u_username== '')
            {
                alert('用户名不能为空')
                flag = false
            }
            if (password == '') {
                alert('密码不能为空')
                flag = false
            }
            if (yzm == '') {
                alert('验证码不能为空')
                flag = false
            }
            if(flag){
                $('#loginform').attr('onsubmit','true');
            }
        })
    </script>
@endsection
@section('footer')
@endsection

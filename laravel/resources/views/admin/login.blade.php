<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>系统登录</title>
    <link href="{{url('admin/css/login.css')}}" rel="stylesheet" rev="stylesheet" type="text/css" media="all" />
    <link href="{{url('admin/css/demo.css')}}" rel="stylesheet" rev="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="{{url('admin/js/jquery1.42.min.js')}}"></script>
    <script type="text/javascript" src="{{url('admin/js/jquery.SuperSlide.js')}}"></script>
    <script type="text/javascript" src="{{url('admin/js/Validform_v5.3.2_min.js')}}"></script>

</head>

<body>


<div class="header">
    <h1 class="headerLogo"><a title="Delicacy China后台管理系统" target="_blank" href="http://sc.chinaz.com/"><img alt="logo" src="/admin/images/logo.gif"></a></h1>
    <div class="headerNav">
        <a target="_blank" href="http://sc.chinaz.com/">美食中国</a>
        <a target="_blank" href="http://sc.chinaz.com/">关于我们</a>
        <a target="_blank" href="http://sc.chinaz.com/">开发团队</a>
        <a target="_blank" href="http://sc.chinaz.com/">意见反馈</a>
        <a target="_blank" href="http://sc.chinaz.com/">帮助</a>
    </div>
</div>

<div class="banner">

    <div class="login-aside">
        <div id="o-box-up"></div>
        <div id="o-box-down"  style="table-layout:fixed;">
            <div class="error-box" id="error-box">
                @unless(empty($messpwd))
                    {{$messpwd}}
                @endunless
            </div>

            <form class="registerform" id="registerForm" action="/admin/doLogin" method="post">
                <div class="fm-item">
                    <label for="logonId" class="form-label">DelicacyChina登陆</label>
                    <input type="text" placeholder="输入用户名" maxlength="100" id="username" class="i-text" name="a_username">
                    <div class="ui-form-explain"></div>
                    <div class="error-box" id="error-username">
                        @if($errors->has('a_username'))
                              {{$errors->first('a_username')}}
                        @endif
                    </div>
                </div>

                <div class="fm-item">
                    <label for="logonId" class="form-label">登陆密码</label>
                    <input type="password" placeholder="输入验证码" maxlength="100" id="password" name="a_pwd" class="i-text" datatype="*" errormsg="请设置密码！">
                    <div class="ui-form-explain"></div>
                    <div class="error-box" id="error-pwd">
                        @if($errors->has('a_pwd'))
                            {{$errors->first('a_pwd')}}
                        @endif
                    </div>
                </div>

                <div class="fm-item pos-r">
                    <label for="logonId" class="form-label">验证码</label>
                    <input type="text" placeholder="验证码" maxlength="100" id="yzm" name='yzm' class="i-text yzm" nullmsg="请输入验证码！" errormsg="验证码不正确请重新输入" >
                    <div class="ui-form-explain"><img src="{{url(captcha_src())}}" class="yzm-img" id="yzmimg" onclick="this.src = '{{url(captcha_src())}}?'+Math.random()"/></div>
                    <div class="error-box" id="error-yzm">
                        @if($errors->has('yzm'))
                            {{$errors->first('yzm')}}
                        @endif
                    </div>
                </div>

                <div class="fm-item">
                    <label for="logonId" class="form-label"></label>
                    <input type="submit" value="" tabindex="4" id="send-btn" class="btn-login">
                    <div class="ui-form-explain"></div>
                </div>
                <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}">
            </form>

        </div>

    </div>

    <div class="bd">
        <ul>
            <li style="background:url({{url('admin/images/bg.jpg')}}) #CCE1F3 center 0 no-repeat;"></li>
        </ul>
    </div>

    <div class="hd"><ul></ul></div>
</div>

<div class="banner-shadow"></div>

<div class="footer">
    <p>Copyright &copy; 2017.Company name All rights reserved.</p>
</div>
<script type="text/javascript" src="{{url('admin/js/login.js')}}"></script>
</body>
</html>

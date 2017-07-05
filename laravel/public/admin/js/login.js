
    $(".i-text").focus(function () {
        $(this).addClass('h-light');
    });

    $(".i-text").focusout(function () {
        $(this).removeClass('h-light');
    });

   $('#username').focus(function () {
       $('#error-username').html('');
   })

    $("#username").focusout(function () {
        var username = $(this).val();
        if (username == '') {
            $('#error-username').html('用户名不能为空');
        }
    });


    $("#password").focus(function () {
            $('#error-pwd').html('');
    });

    $("#password").focusout(function () {
        var username = $(this).val();
        if (username == '') {
            $('#error-pwd').html('密码不能为空');
        }
    });


    $("#yzm").focus(function () {
            $('#error-yzm').html('');
    });

    // 验证码验证
    $('#yzm').blur(function(){
        $.ajax({
            url:'/admin/captcha',
            type:'post',
            data:{yzm:$('#yzm').val(),_token:$('#_token').val()},
            success:function(data){
                if(!data){
                    $('#error-yzm').html('验证码不正确')
                } else {
                    $('#error-yzm').html('')
                }
            }
        })
    });

    $('#username').blur(function(){
        $.ajax({
            url:'/admin/username',
            type:'post',
            data:{username:$('#username').val(),_token:$('#_token').val()},
            success:function(data){
                if(!data){
                    $('#error-username').html('用户名不存在')
                } else {
                    $('#error-username').html('')
                }
            }
        })
    })

    $('#registerForm').submit(function(){
        if($('#error-username').html()!=='' || $('#error-pwd').html()!=='' || $('#error-yzm').html()!==''){
            if($('#username').val() ==''){
                $('#error-username').html('用户名不能为空');
            }
            if($('#password').val() == ''){
                $('#error-pwd').html('密码不能为空');
            }
            if($('#yzm').val() == ''){
                $('#error-yzm').html('验证码不能为空');
            }
            return false;
        } else {
            console.log(1)
            return true;
        }
    })

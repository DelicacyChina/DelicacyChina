@extends('layouts.home')
@section('title','修改密码')
@section('css')
	<link rel="stylesheet" type="text/css" href="{{url('home/css/editPwd.css')}}">
@endsection
@section('content')
	<!-- 主框架 -->
<div class="w_main clear">
@include('layouts.personal')
 	<!-- 右侧 -->
	<div class="mod_right">
		@include('layouts.setting')
		<script>
			$('#setting').attr('class','on')
			$('#mod_location').find('a').eq(2).attr('class','on')
		</script>
		<form  id="J_form" action="{{url('home/personal/setting/checkPwd')}}" method="post">
			<div class="mr_edit mr_edit_center clear">
				<ul>
					<li>
						<label>当前密码</label><br>
						<input class="inputS" id="J_password" name="password" type="password" autocomplete="off">
						{{csrf_field()}}
					</li>
					<li>
						<label>新密码</label><br>
						<input class="inputS" id="J_password_new" name="newpassword1" type="password" autocomplete="off">&nbsp;&nbsp;<span class="tip">密码为7-14个字符</span>
					</li>
					<li>
						<label>确认密码</label><br>
						<input class="inputS" id="J_password_new_2" name="newpassword2" type="password" autocomplete="off">
					</li>
				</ul>
				<input name="submit" value="保存修改" class="btn1" type="submit">
			</div>
			<div class="mr_edit mr_edit_fixed clear">
				<ul>
				</ul>
			</div>
		</form>
	</div><!-- 右侧结束 -->
</div>
	<script>
		$(function(){
			 $('#J_form').submit(function(){
			 	if($('#J_password_new').val()==''){
			 		alert('密码不能为空')
			 		return false;
				}
				if($('#J_password_new').val() != $('#J_password_new_2').val()){
					alert('两次密码不一致')
					return false
				}
				if($('#J_password').val() == $('#J_password_new').val()){
					alert('新密码不能和原密码一致')
					return false;
				}
			 })
		})
	</script>
@endsection
@section('footer')
@endsection



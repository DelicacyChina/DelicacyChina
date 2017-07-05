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
			$('#mod_location').find('a').eq(3).attr('class','on')
		</script>
		<form  id="J_form" action="{{url('home/personal/setting/answer')}}">
			<div class="mr_edit mr_edit_center clear">
				<ul>
					<li>
						<label>密保问题1</label><br>
						<input class="inputS" id="J_password" name="question1" type="text" value='你母亲的名字' readonly>
						
					</li>
					<li>
						<label>你的答案</label><br>
						<input class="inputS" id="J_password_new1" name="answer1" type="text">&nbsp;&nbsp;<span class="tip"></span>
					</li>
					<li>
						<label>密保问题2</label><br>
						<input class="inputS" id="J_password" name="question2" type="text" value='你父亲的名字' readonly>
						
					</li>
					<li>
						<label>你的答案</label><br>
						<input class="inputS" id="J_password_new2" name="answer2" type="text">&nbsp;&nbsp;<span class="tip"></span>
					</li>
					<li>
						<label>密保问题3</label><br>
						<input class="inputS" id="J_password" name="question3" type="text" value='你好朋友的名字' readonly>
						
					</li>
					<li>
						<label>你的答案</label><br>
						<input class="inputS" id="J_password_new3" name="answer3" type="text">&nbsp;&nbsp;<span class="tip"></span>
					</li>
					<li>
						<label>你的用户名</label><br>
						<input class="inputS" id="J_password_new4" name="name" type="text">&nbsp;&nbsp;<span class="tip"></span>
					</li>
				</ul>
				<input name="submit" value="保存设置" class="btn1" type="submit">
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
			 	if($('#J_password_new1').val()==''){
			 		alert('请填入你的答案')
			 		return false;
				}
				if($('#J_password_new2').val()==''){
					alert('请填入你的答案')
					return false
				}
				if($('#J_password_new3').val() ==''){
					alert('请填入你的答案')
					return false;
				}
				if($('#J_password_new4').val() ==''){
					alert('请填入你的用户名')
					return false;
				}
			 })
		})
	</script>
@endsection
@section('footer')
@endsection

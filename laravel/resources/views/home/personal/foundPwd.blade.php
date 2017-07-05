@extends('layouts.home')
@section('title','找回密码')
@section('css')
	<link rel="stylesheet" type="text/css" href="{{url('home/css/editPwd.css')}}">
@endsection
@section('content')
	<!-- 主框架 -->
<div class="w_main clear">
 	<!-- 右侧 -->
	<div class="mod_right">
		<div id="mod_location">
		    <div class="mod_location clear">
		        <div class="left">
		            <a>密码重置</a>
		        </div>
		    </div>
		</div>
		<form  id="J_form" action="{{url('home/personal/setting/reset')}}">
		<!-- {{csrf_field()}} -->
			<div class="mr_edit mr_edit_center clear">
				<ul>
					
					<li>
						<label>密保问题1</label><br>
						<input class="inputS" id="J_password" name="question1" type="text" value='{{$qu[0]->question}}'>&nbsp;&nbsp;<span style='color: red'>*</span>
						
					</li>
					<li>
						<label>你的答案</label><br>
						<input class="inputS" id="J_password_new" name="answer1" type="text">&nbsp;&nbsp;<span class="tip"></span>
					</li>
					<li>
						<label>密保问题2</label><br>
						<input class="inputS" id="J_password" name="question2" type="text" value='{{$qu[1]->question}}'>&nbsp;&nbsp;<span style='color: red'>*</span>
						
					</li>
					<li>
						<label>你的答案</label><br>
						<input class="inputS" id="J_password_new" name="answer2" type="text">&nbsp;&nbsp;<span class="tip"></span>
					</li>
					<li>
						<label>密保问题3</label><br>
						<input class="inputS" id="J_password" name="question3" type="text" value='{{$qu[2]->question}}'>&nbsp;&nbsp;<span style='color: red'>*</span>
						
					</li>
					<li>
						<label>你的答案</label><br>
						<input class="inputS" id="J_password_new" name="answer3" type="text">&nbsp;&nbsp;<span class="tip"></span>
					</li>
					<li>
						<label>你的用户名</label><br>
						<input class="inputS" id="J_password_new4" name="name" type="text">&nbsp;&nbsp;<span class="tip"></span>
					</li>
				</ul>
				<input name="submit" value="确认提交" class="btn1" type="submit">
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



@extends('layouts.home')
@section('title','我的设置')
@section('css')
	<link rel="stylesheet" href="{{url('home/css/mySettings.css')}}">
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
				$('#mod_location').find('a').eq(0).attr('class','on')
			</script>
			<form action="{{url('/home/personal/setting/edit')}}" id="J_form"  enctype="multipart/form-data" method="post">
				{{csrf_field()}}
				<div class="mr_edit mr_edit_center clear">
					<ul>

						<li>
							<label>头像</label><br>
							<img class="imgLoad" src="{{$user->icon}}" width=120 height=120 id="img"/><br>
							<input type="file"  name="face" id="doc" multiple="multiple"  style="width:150px;" onchange="setImagePreviews();" accept="image/*" />
						</li>
						<li>
							<label>性别</label><br>
							<input type="hidden" id="things_type1" name="sex" value="1">
							<div class="things_type1 clear">
								<input type='radio' class="on" name='sex' value='1' {{$user->sex==1?'checked':''}}>&nbsp;&nbsp;男&nbsp;&nbsp;
								<input type='radio' class="on" name='sex' value='2' {{$user->sex==2?'checked':''}}>&nbsp;&nbsp;女&nbsp;&nbsp;
							</div>
						</li>
						
						<li>
							<label>电子邮箱</label><br>
							<input name="email" class="inputM" type="email" id="J_email" value="{{$user->u_email}}" readonly>
						</li>

						<li>
							<label>个人签名</label><br>
							<input name="motto" class="inputL" type="text" id="J_sign" value="{{$user->motto}}">
						</li>
						<input name="dob" type="hidden" class="" value="4870181531">
						<input name="uiue" type="hidden" class="" value="10332443">
					</ul>
					<input name="save_submit" value="保存修改" class="btn1" type="submit">
				</div>
				<div class="mr_edit mr_edit_fixed clear">
					<ul>
					</ul>
				</div>
			</form>
		</div><!-- 右侧结束 -->
	</div>
	<script type="text/javascript">

		//下面用于多图片上传预览功能

		function setImagePreviews(avalue) {
			var docObj = document.getElementById("doc");
			var fileList = docObj.files;
			for (var i = 0; i < fileList.length; i++) {
				if (docObj.files && docObj.files[i]) {
					$('#img').attr('src',window.URL.createObjectURL(docObj.files[i]))
				}
			}
			return true;
		}
	</script>
@endsection
@section('footer')
@endsection
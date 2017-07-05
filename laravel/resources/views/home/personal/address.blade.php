@extends('layouts.home')
@section('title','收货地址')
@section('css')
	<link rel="stylesheet" type="text/css" href="{{url('home/css/address.css')}}">
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
			$('#mod_location').find('a').eq(1).attr('class','on')
		</script>
		<form action="{{url('/home/personal/setting/editAddress')}}" id="J_form"  enctype="multipart/form-data" method="post">
			{{csrf_field()}}
			<input type="hidden" name="uid" value="{{Auth::user()->id}}">
			<div class="mr_edit mr_edit_center clear">
				@if(isset($add[0]))
					<div>
						<p>收件人:{{$add[0]->name}}</p>
						<p>手机号:{{$add[0]->phone}}</p>
						<p>地址:
							<span id="addprov">{{$add[0]->prov}}</span>
							<span id="addcity">{{$add[0]->city}}</span>
							<span id="addarea">{{$add[0]->area}}</span>
						</p>
						<p>详细地址:{{$add[0]->detail}}</p>
						<a href="{{url('home/personal/setting/delAddress')}}">删除</a>
					</div>
				@endif
				<ul>
					<li>
						<label class="must">收件人</label><br>
						<input name="name" id="J_realname" class="inputS" type="text" value="">
					</li>
					<li>
						<label class="must">省/市/区</label><br>
						<select id="province" name="prov">
							
						</select>
						<select id="city" name="city" style="display:none">
					
						</select>
						<select id="piecearea" name="area" style="display:none;">
					
						</select>
					</li>
					<li>
						<label class="must">详细地址</label><br>
						<input name="detail" class="inputL" id="J_address" value="" type="text">
					</li>
					<li>
						<label class="must">手机号码</label><br>
						<input name="phone" id="J_tel" class="inputS" type="text" value="">
					</li>
					<input type="hidden" name="suid" value=""/> 
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
@endsection
@section('footer')
@endsection
@section('js')
	<script>
		$(function () {
			$.ajax({
				url:'{{url("home/personal/setting/getAddress")}}',
				type:'get',
				success:function(data){
					$(data).find('province').each(function(){
						if($(this).attr('provinceID') == $('#addprov').html()){
							$('#addprov').html($(this).attr('province'))
						}
					})
					$(data).find('City').each(function(){
						if($(this).attr('CityID') == $('#addcity').html()){
							$('#addcity').html($(this).attr('City'))
						}
					})
					$(data).find('Piecearea').each(function(){
						if($(this).attr('PieceareaID') == $('#addarea').html()){
							$('#addarea').html($(this).attr('Piecearea'))
						}
					})
				},
				dataType:'xml'
			})
			var xml = ''
			$.ajax({
				url:'{{url("home/personal/setting/getAddress")}}',
				type:'get',
				async:false,
				success:function (data) {
					xml = data;
					var pros = $(data).find('province');
					pros.each(function () {
						var proId = $(this).attr('provinceID');
						var proName = $(this).attr('province');
						$("#province").append("<option value="+proId+">"+proName+"</option>");
					});
				},
				dataType:'xml'
			})
			$("#province").change(function () {
				$("#city").show();
				$("#piecearea").show();
				$("#city").empty();
				var index = $(this).val().substr(0,2);
				var citys = $(xml).find('City[CityID^='+index+']');
				if (citys.length == 0)
				{
					$("#city").hide();
					$("#piecearea").hide();
					return;
				}
				citys.each(function () {
					var cityId = $(this).attr('CityID');
					var cityName = $(this).attr('City');
					$("#city").append("<option value="+cityId+">"+cityName+"</option>");
				});
				$("#city").trigger('change');
			});

			$("#city").change(function () {
				$("#piecearea").show();
				$("#piecearea").empty();
				var index = $(this).val().substr(0,4);
				var pies = $(xml).find('Piecearea[PieceareaID^='+index+']');
				if (pies.length == 0)
				{
					$("#piecearea").hide();
					return;
				}
				pies.each(function () {
					var pieId = $(this).attr('PieceareaID');
					var pieName = $(this).attr('Piecearea');
					$("#piecearea").append("<option value="+pieId+">"+pieName+"</option>");
				});
			});

			$("#province").trigger('change');
			$("#city").trigger('change');
		})
	</script>
@endsection


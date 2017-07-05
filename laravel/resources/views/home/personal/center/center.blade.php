@extends('layouts.home')
@section('title','个人空间-菜谱')
@section('css')

@endsection
@section('content')
<!-- 主框架 -->                                                                              "
@include('home.personal.center.comment')
<script>
  $('#recipe').addClass('on')
</script>
<div class="wrap">
    <div class="w clear">
        <div class="ui_title mt10">
          <div class="ui_title_wrap clear">
            <h3 class="on">{{$user->u_username}}的菜谱</h3>
            <a target="_blank" class="right" href="">篇数{{$caipuscount}}</a>
          </div>
        </div>
        <div class="big4_list clear mt10">
          <ul>
            @foreach($caipus as $caipu)
            <li>
              <a title="{{$caipu->recipe_name}}" href="{{url('home/personal/recipe/recipeDetail/'.$caipu->id)}}">
                <i>
                  <img alt="{{$caipu->recipe_name}}" class="imgLoad" src="{{$caipu->face}}"  style="display: block;">
                </i>
                <p>{{$caipu->recipe_name}}</p>
              </a>
            </li>
            @endforeach
          </ul>
        </div>
    </div>
</div>
@endsection


@extends('layouts.home')
@section('title','魔方')
@section('css')
    <link rel="stylesheet" href="{{url('home/css/mofang.css')}}">
    <script src="{{url('assets/js/jquery.tmpl.js')}}"></script>
@endsection
@section('content')
    <div class="sliderh">
        <div id="sliderh" style="width:100%">
            <ul>
                <li class="show1" style="width:100%;background:url({{$banimg}}) no-repeat center">
                    <h1>
                        <a href="" title="形态各异的面" id="mof_h1">{{$ban->banner_title }}</a>
                    </h1>
                </li>
            </ul>
        </div>
    </div>
    <div class="msb">
        <input type="hidden" id="mof_fcover" value="">
        <input type="hidden" id="mof_domain" value="">
        <div class="recipeArction clear">
            <p id="mof_desc">{{$ban->introduces}}</p>
        </div>

        @foreach($neirong as $key => $value)
            <div class="mo">
                <h2>{{$key}}</h2>
                <input type="hidden" value="{{$value[1]}}">
            </div>
            <p>
                {{$value[0]}}
            </p>
            <div class="msb_list clear">
                <ul>

                </ul>
            </div>
        @endforeach

    </div>
@endsection
@section('js')
    <script type="text/html" id="recipe-box">
        <li>
            <div>
                <a title="${name}" href="{{url('home/recipe/sysRecipeDetail/${id}')}}">
                    <img src="${pic}" class="imgLoad" width=230 height=230 />
                    <span>${name}</span>
                </a>
            </div>
        </li>
    </script>
   <script>
       var i = 0;
       $('.mo').each(function(){
           var data = $(this).find('input[type=hidden]').val();
           var obj = $(this).next().next().find('ul')[0]
           $.ajax({
               url:'http://api.jisuapi.com/recipe/search',
               data:{keyword:data,num:8,appkey:'eb5eaa404c272bab'},
               type:'get',
               dataType:'jsonp',
               success:function(data){
                      data = data.result.list;
                      $('#recipe-box').tmpl(data).appendTo(obj)
               }
           })
       })
   </script>
@endsection

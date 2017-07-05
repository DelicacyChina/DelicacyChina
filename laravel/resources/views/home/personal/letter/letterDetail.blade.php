@extends('layouts.home')
@section('title','私信')
@section('css')
    <link rel="stylesheet" href="{{url('home/css/sixin.css')}}">
@endsection
@section('content')
    <!-- 主框架 -->
    <div class="w_main clear">
        @include('layouts.personal')


    <!-- 右侧 -->
        <div class="mod_right">
            @include('home.personal.letter.letter')
            @if($letter->guard==1)
            <script>
                $('#letter').attr('class','on')
                $('.mod_location').find('a').eq(1).attr('class','on')
            </script>
            @else
                <script>
                    $('#letter').attr('class','on')
                    $('.mod_location').find('a').eq(0).attr('class','on')
                </script>
            @endif

            <div  id="xianshimsg" style="height: 200px; width: 600px;border: 1px solid #CCCCCC; margin-left: 30px;margin-top: 120px;font-size: 16px " >
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$letter->content}}
            </div>
            <div style="margin-top: 20px;margin-left: 600px;">
                 <a  href="#" onclick="self.location=document.referrer;" style="font-size: 24px;color: #00B7EE; ">返回</a>
            </div>

        </div><!-- 右侧结束 -->
    </div>
@endsection
@section('footer')
@endsection
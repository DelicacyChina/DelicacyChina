<div class="mod_left">
    <div class="menu_wrap">
        <ul>
            <li>
                <a  href="{{url('home/center/index/'.Auth::user()->id)}}">会员<br>中心</a>
            </li>
            <li>
                <a  href="{{url('home/personal/recipe/index')}}" id="recipe">菜谱</a>
            </li>
            <li>
                <a  href="{{url('home/personal/talk/index')}}" id="talk">话题</a>
            </li>
            <li>
                <a   href="{{url('home/personal/blog/index')}}" id="blog">日志</a>
            </li>
            <li>
                <a  href="{{url('home/personal/letter/index')}}" id="letter">通知</a>
            </li>
            <li>
                <a  href="{{url('home/personal/collect/index')}}" id="collect">收藏</a>
            </li>
            <li>
                <a  href="{{url('home/personal/setting/index')}}" id="setting">账户<br>设置</a>
            </li>
        </ul>
    </div>
</div>

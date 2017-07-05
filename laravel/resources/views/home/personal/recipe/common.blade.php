
    <div class="ui_newlist_1 get_num mt60 clear" id="J_list">
        <ul>
            @foreach($recipes as $r)
                <li>
                    <div class="left">
                        <div class="pic">
                            <a href="">
                                <img class="imgLoad" src="{{$r->face}}" width="180" height="180" style="display: block;">
                            </a>
                        </div>

                        <div class="detail">
                            <h2>
                                <a title="hongsaorou" href="">{{$r->recipe_name}}</a>
                            </h2>
                            <p class="subline">{{$r->updated_at}}</p>

                        </div>
                        <input type="hidden" value="{{$r->id}}" name="rid">

                    </div>
                    <div class="right">
                        <a href="{{url('/home/personal/recipe/show/'.$r->id)}}">编辑</a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

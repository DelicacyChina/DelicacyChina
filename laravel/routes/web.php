<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','Home\IndexController@index');



// 前台管理
Route::group(['prefix'=>'/home','namespace'=>'Home\\'],function(){
    // 前台
    Route::get('/index','IndexController@index');
    // 前台登陆
    Route::get('/login','IndexController@login');
    // 验证码
     Route::post('/login/yzm','IndexController@checkYzm');
    // 验证
    Route::post('/dologin','IndexController@doLogin');
    // 退出
    Route::get('/logout','IndexController@logout');
    // 查看头像
    Route::get('/icon/{id}','IndexController@icon');
    // 菜谱分类
    Route::get('/recietype','IndexController@recipetype');
    // 问答
    Route::get('/question','IndexController@question');
    // banner
    Route::get('/mofang/{id}','IndexController@mofang');

    // 前台注册
    Route::get('/register','IndexController@register');
    Route::post('/doregister','IndexController@doregister');
    Route::post('/register/checkname','IndexController@checkName');
    Route::post('/register/checkemail','IndexController@checkEmail');
    // 邮箱验证
    Route::get('/mailBox','MailBoxController@check');

    // 菜谱分类
    Route::group(['prefix'=>'/recipe'],function(){
        Route::get('/sysRecipeClass','SysRecipeController@sysRecipeClass') ;
        Route::get('/sysRecipeList/{rid}','SysRecipeController@sysRecipeList');
        Route::get('/sysRecipeDetail/{rid}','SysRecipeController@sysRecipeDetail');
    });
    // 各页面详情
    // 话题详情
    Route::get('/personal/talk/talkDetail/{tid}','Personal\TalkController@talkDetail');
    // 日志详情
    Route::get('/personal/blog/blogDetail/{bid}','Personal\BlogController@blogDetail');
    // 菜谱详情
    Route::get('personal/recipe/recipeDetail/{id}','Personal\RecipeController@recipeDetail');
    // 个人主页
    Route::group(['prefix'=>'center','namespace'=>'Personal\\'],function(){
        // 首页
        Route::get('/index/{uid}','CenterController@index');
        Route::get('/pai/{uid}','CenterController@pai');
        Route::get('/blog/{uid}','CenterController@blog');
        Route::get('/friend/{uid}','CenterController@friend');
    });
    // 密码找回
    Route::get('/personal/setting/foundPwd','Personal\SettingController@foundPwd');
    Route::get('/personal/setting/reset','Personal\SettingController@reset');

    // 材料分类
    Route::get('/yuanliao','IndexController@yuanliao');

    // 个人中心
    Route::group(['prefix'=>'/personal','namespace'=>'Personal\\','middleware'=>'checkLogin'],function(){
        // 话题
        Route::group(['prefix'=>'/talk'],function(){
            Route::get('/index','TalkController@index');
            Route::get('/addTalk','TalkController@addTalk');
            Route::post('/add','TalkController@add');

            // 遍历话题
            Route::get('/retalk','TalkController@retalk');

            // 话题评论
            Route::get('/talkEvaluate','TalkController@talkEvaluate');
            // 删除话题
            Route::get('/delTalk/{tid}','TalkController@delTalk');
        });
        // 个人设置
        Route::group(['prefix'=>'/setting'],function(){
            Route::get('/index','SettingController@index');
            Route::post('/edit','SettingController@edit');
            // 地址管理
            Route::get('/address','AddressController@address');
            Route::get('/getAddress','AddressController@getAddress');
            Route::post('/editAddress','AddressController@editAddress');
            Route::get('/delAddress','AddressController@delAddress');
            // 修改密码
            Route::get('/pwd','SettingController@pwd');
            Route::post('/checkPwd','SettingController@checkPwd');
            Route::get('/editPwd','SettingController@editPwd');
            // 设置密保
            Route::get('/setAnswer','SettingController@setAnswer');
            Route::get('/answer','SettingController@answer');


        });

        //  日志
        Route::group(['prefix'=>'/blog'],function(){
            Route::get('/index','BlogController@index');
            Route::get('/blogPending','BlogController@blogPending');
            Route::get('/blogFaild','BlogController@blogFaild');
            Route::get('/add','BlogController@add');
            Route::post('/addBlog','BlogController@addBlog');
            // 查看待审核日志
            Route::get('/show/{bid}','BlogController@show');
            // 编辑日志
            Route::get('/editBlog/{bid}','BlogController@editBlog');
            //  修改
            Route::post('/edit','BlogController@edit');

            // 喜欢
            Route::get('/like','BlogController@like');
            // 不喜欢
            Route::get('/delLike','BlogController@delLike');

        });

        // 菜谱模块
        Route::group(['prefix'=>'/recipe'],function(){
            Route::get('/index','RecipeController@index') ;
            Route::get('/recipePending','RecipeController@recipePending');
            Route::get('/addRecipe','RecipeController@addRecipe');
            Route::get('/recipeFaild','RecipeController@recipeFaild');
            // 添加菜谱
            Route::post('/add','EditRecipeController@add');
            // 查看菜谱
            Route::get('/show/{rid}','EditRecipeController@show');
            // 修改菜谱
            Route::get('/alertView/{rid}','EditRecipeController@alertView');
            Route::post('/alert/{rid}','EditRecipeController@alert');
            // 删除菜谱
            Route::get('/del/{rid}','EditRecipeController@del');
        }) ;

        // 私信模块
        Route::group(['prefix'=>'/letter'],function(){
            Route::get('/index','LetterController@index');
            Route::get('/sysindex','LetterController@sysindex');
            // 私信详情
            Route::get('/detail/{id}','LetterController@show');
            // 删除私信
            Route::get('/del/{id}','LetterController@del');
        }) ;

        // 收藏
        Route::group(['prefix'=>'/collect'],function(){
            Route::get('/index','CollectController@index');
            // 菜单的收藏
            Route::get('/recipeCollect','CollectController@recipeCollect');
            // 删除收藏
            Route::get('/delCollect/{id}','CollectedController@delCollect');
        });

        // 关注
        Route::group(['prefix'=>'/center/friend'],function(){
            // 加关注
            Route::get('/addFriend','CenterController@addFriend');
            Route::get('/delFriend','CenterController@delFriend');
            //发送私信
            Route::get('/sendLetter','CenterController@sendLetter');
        });

    });
});


// 后台路由管理
Route::group(['prefix'=>'/admin','namespace'=>'Admin\\'],function(){
    // 登陆路由
    Route::get('/login','IndexController@login');
    Route::post('/captcha','IndexController@captcha');
    Route::post('/username','IndexController@username');
    Route::post('/doLogin','IndexController@doLogin');
    Route::get('/logout','IndexController@logout');

    // 用户管理
    Route::group(['prefix'=>'/user','namespace'=>'User\\'],function(){
        // 会员路由
        Route::get('/list/{uid?}','UserController@index');
        Route::post('/add','UserController@add');
        Route::get('/changeStatus','UserController@changeStatus');
        Route::get('/findRecipe','UserController@findRecipe');
        Route::post('/edit','UserController@edit');
        Route::get('/del','UserController@del');
    });

    // 分类管理
    Route::group(['prefix'=>'/category','namespace'=>'Category\\'],function(){
       // 菜单路由
        Route::get('/recipe/list/{pid?}','RecipeController@index');
        Route::post('/recipe/add','RecipeController@add');
        Route::get('/recipe/changeStatus','RecipeController@changeStatus');
        Route::get('/recipe/findRecipe','RecipeController@findRecipe');
        Route::post('/recipe/edit','RecipeController@edit');
        Route::get('/recipe/del','RecipeController@del');

        //食材路由
        Route::group(['prefix'=>'/food'],function(){
            Route::get('/list/{pid?}','FoodController@index');
            Route::post('/add','FoodController@add');
            Route::get('/changeStatus','FoodController@changeStatus');
            Route::get('/findFood','FoodController@findFood');
            Route::post('/edit','FoodController@edit');
            Route::get('/del','FoodController@del');

            //食材图片管理
            Route::group(['prefix'=>'/img'],function(){
                Route::get('/list','FoodImgController@index');
                Route::post('/uploadImg','FoodImgController@uploadImg');
            });
        });
    });

    // 网站视图管理
    Route::group(['prefix'=>'/manageWeb','namespace'=>'ManageWeb\\'],function(){
        Route::group(['prefix'=>'/banner'],function (){
            Route::get('/list','BannerController@index');
            Route::get('/changeStatus','BannerController@changeStatus');
            Route::post('/uploadBanner','BannerController@uploadBanner');

            //banner文章管理
            Route::get('/article','BannerArticleController@article');
            Route::get('/article/add','BannerArticleController@addArticle');
            Route::get('/article/list','BannerArticleController@listInfo');
            Route::get('/article/detail/{id}','BannerArticleController@detail');
            //  添加文章
            Route::post('/article/add','BannerArticleController@add');
        });
    });

    // 审核管理
    Route::group(['prefix'=>'/pending','namespace'=>'Pending\\'],function(){
        // 文章审核
        Route::get('/recipe/index','RecipeController@index');
        Route::get('/recipe/detail/{rid}','RecipeController@recipeDetail');
        // 发布审核
        Route::post('/recipe/pending','RecipeController@recipePending');

        // 日志审核
        Route::get('/blog/index','BlogController@index');
        Route::get('/blog/detail/{bid}','BlogController@blogDetail');
        // 发布审核
        Route::post('/blog/pending','BlogController@blogPending');
    });

});
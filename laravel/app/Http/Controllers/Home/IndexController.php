<?php

namespace App\Http\Controllers\Home;

use App\Models\Banner;
use App\Models\BannerArticle;
use App\Models\Blog;
use App\Models\BlogImg;
use App\Models\CategoryFood;
use App\Models\CategoryRecipe;
use App\Models\MailBox;
use App\Models\Recipe;
use App\Models\Talk;
use App\Models\TalkImg;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use \Mail;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function login()
    {
        return view('home.login');
    }

    // 验证码是否正确
    public function checkYzm()
    {
        $yzm = $_POST['yzm'];
        echo captcha_check($yzm);
    }

    // 验证登陆
    public function doLogin(Request $request)
    {
        // 验证用户身份
        $user = User::where('u_username',$request->u_username)
            ->where('status',1)
            ->get();
        if(isset($user[0])){
            if(Auth::attempt(['u_username'=>$request->u_username,'password'=>$request->password])){
                return redirect('/home/personal/setting/index');
            } else {
                echo '<script>alert("密码不正确,请重新输入");window.history.go(-1)</script>';
                die;
            }
        }  else {
            echo '<script>alert("用户不存在,请先注册");window.history.go(-1)</script>';
            die;
        }

    }

    // 退出
    public function logout()
    {
        Auth::logout();
        return "<script>alert('退出成功');window.location.href='/home/login'</script>";
    }

    // 跳转注册
    public function register()
    {
        return view('home.register');
    }

    // 注册验证用户名
    public function checkname(Request $request)
    {
        $user = User::where('u_username',$request->name)->get();
        if(isset($user[0]->id)){
            return 0;
        }
        return 1;
    }

    // 注册验证邮箱
    public function checkEmail(Request $request)
    {
        $user = User::where('u_email',$request->email)->get();
        if(isset($user[0]->id)){
            return 0;
        }
        return 1;
    }


    // 注册功能
    public function doregister(Request $request)
    {
        $user = User::where('u_email',$request->u_email)->get();
        if(isset($user[0])){
            if ($user[0]->status == 0) {
                $now = time();
                $old = strtotime($user[0]->created_at);
                $t = $now - $old;
                if($t>60){
                    User::where('u_email',$request->u_email)->delete();
                }  else {
                    echo '<script>alert("用户还没有激活,请先去激活");window.history.go(-1)</script>';
                    die;
                }
            }  else {
                echo '<script>alert("用户已存在,请去登陆");window.location.href="/home/login"</script>';
                die;
            }

        }
        // 添加用户
        $user = User::create($request->all());
        //邮箱激活操作**************************
        $uid = $user->id;      //获取最新插入的id
        $activationcode = md5($user.time());  //获取邮箱验证时的随机串
        $data = ['email'=>$user->u_email, 'name'=>$user->u_username, 'uid'=>$uid, 'activationcode'=>$activationcode];
        Mail::send('layouts.activemail', $data, function($message) use($data)//use用于引入function外面的数据  activemail是指定的视图
        {
            $message->to($data['email'], $data['name'])->subject('欢迎注册美食中国账号');
        });
        MailBox::create([
            'uid'=>$uid,
            'activationcode'=>$activationcode
        ]);
        return '<script>alert("注册成功,请去邮箱验证");window.history.go(-1)</script>';
    }

    //前台首页
    public function index(Request $request){
        $results = Recipe::where('status',1)->limit(8)
            ->orderby('updated_at','desc')
            ->get();

        $slides = Recipe::all();

        $blogs = Blog::select('blogs.*','u_username')
            ->join('users','blogs.uid','users.id')
            ->get();




        foreach($blogs as $blog)
        {
            $blogimgs = BlogImg::where('bid',$blog->id)->get();
            if (isset($blogimgs[0])){
                $blogimg[$blog->id]['img'] = $blogimgs[0]->img;
            }
        }


        $talks = Talk::select('talks.*','u_username','icon')
            ->join('users','talks.uid','users.id')
            ->join('user_infos','talks.uid','user_infos.uid')
            ->get();

        foreach ($talks as $talk)
        {
            $imgs = TalkImg::where('tid',$talk->id)->get();
            if(isset($imgs[0])){
                foreach($imgs as $i)
                {
                    $img[$talk->id][] = $i->img;
                }
            }
        }

        $bans =  Banner::all();

        $foods = CategoryFood::where('food_parentId','1')->where('status','1')
            ->select('category_foods.*','category_food_imgs.img_url')
            ->leftJoin('category_food_imgs','category_foods.id','category_food_imgs.food_id')
            ->get();

        $crecipes = CategoryRecipe::limit(8)->get();
        $cfoods = CategoryFood::where('food_parentId','>','0')->limit(8)->get();


        return view('home/index')->with('results',$results)
            ->with('talks',$talks)
            ->with('img',$img)
            ->with('bans',$bans)
            ->with('foods',$foods)
            ->with('crecipes',$crecipes)
            ->with('cfoods',$cfoods)
            ->with('slides',$slides)
            ->with('blogs',$blogs)
            ->with('blogimg',$blogimg);
    }


    //前台菜谱分类
    public function recipetype(){
        $recipes =  CategoryRecipe::all()->where('recipe_parentId','0');
        $recipes2 = CategoryRecipe::all()->where('recipe_path','>','0');

        return view('home/recipe-type')->with('recipes',$recipes)->with('recipes2',$recipes2);
    }

    // 问答
    public function question(){
        return view('home.question.question');
    }

    //魔方
    public function mofang($id)
    {
        $ban =  Banner::where('id',$id)->get()[0];



        $arts = BannerArticle::where('banner_id',$id)->get();
        foreach($arts as $art)
        {
            $neirong[$art->article_title][0] = $art->contents;
            $neirong[$art->article_title][1] = $art->article_key;
        }



        return view('home/banner/mofang')->with('banimg',$ban->banner_img)
            ->with('ban',$ban)
            ->with('neirong',$neirong);

    }

    // 原料
    public function yuanliao(){
        $yuanliaos = CategoryFood::where('food_parentId','0')->where('status','1')->get();

        foreach($yuanliaos as $yuanliao)
        {
            $yuanliaoos[$yuanliao->food_name] = CategoryFood::where('food_parentId',$yuanliao->id)->where('status','1')->get();

        }
        return view('home/yuanliao')->with('yuanliaoos',$yuanliaoos);
    }
}

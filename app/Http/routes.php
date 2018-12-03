<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

	//Route::get('/code/{tmp}','CodeController@code');
	//Route::get('/login','DemoController@index');
	//Route::post('/dologin','DemoController@doLogin');
	
//==========================================================================================前台路由	
//主页-------
Route::get('/',"jingdian\JingdianController@index");	

//网站后台登录路由设置--
Route::get('/admin',"Admin\LoginController@login");  //加载登陆页面
Route::get('/admin/logout',"Admin\LoginController@logout");//执行后台退出页面
Route::post('/admin/doLogin',"Admin\LoginController@doLogin"); //执行登陆
Route::get('/admin/code/{tmp}',"CodeController@code");//验证码处理


//网站前台路由设置--
Route::get('/Web',"Web\RegisterController@index");  //查看用户信息页面
Route::delete('/Web/{id}','Web\RegisterController@destroy');//执行删除页面
Route::get('/Web/denglu',"Web\LoginController@login");  //加载登陆页面
Route::post('/Web/dologin',"Web\LoginController@dologin");  //执行登陆页面
Route::get('/admin/index',"Admin\IndexController@index");//加载后台主页面
Route::get('/Web/logout',"Web\LoginController@logout");  //执行退出登陆
Route::get('/Web/add',"Web\RegisterController@create");  //添加用注册页面
Route::post('/aa',"Web\RegisterController@store"); //执行添加页面
Route::get('/aa/{id}/edit',"Web\RegisterController@edit"); //执行修改页面
Route::post('/aa/{id}',"Web\RegisterController@update"); //更新修改页面
Route::get('/password',"Web\RegisterController@password");//加载密码修改
Route::post('/pass/{id}',"Web\RegisterController@pass");//执行密码修改
Route::post('/passajax','Web\RegisterController@ajax');
Route::get('/email','admin\MailController@index');
Route::get('/kangmuang','admin\MailController@index2');
//前台新闻路由设置  --
Route::get('/xinwenhome','Web\NewslistController@index');
Route::get('/xinwenliebiao',"Admin\IndexController@index1"); //新闻列表页
Route::get('/xinwenxiangqing',"Admin\IndexController@index2"); //新闻详情页
Route::get('/jingquliebiao','Admin\IndexController@index3');//景区新闻列表页
Route::get('/jingquxiangqing','Admin\IndexController@index4');//景区新闻详情页
Route::get('/bendiliebiao','Admin\IndexController@index5');//本地新闻列表页
Route::get('/bendixiangqing','Admin\IndexController@index6');//本地新闻详情页


//网站后台必须在登陆后才可访问的路由组设置


//门票路由 ===
Route::get('/goupiao',"goupiao\GoupiaoController@index");
Route::get('/goupiaolist',"goupiao\GoupiaoController@indexlist");
Route::get('/goupiaodetail',"goupiao\GoupiaoController@indexdetail");

//酒店购票 ===
Route::get('/goupiaohotellist',"goupiao\GoupiaohotelController@indexlist");
Route::get('/goupiaohotellist2',"goupiao\GoupiaohotelController@indexlist2");
Route::get('/goupiaohoteldetail',"goupiao\GoupiaohotelController@indexdetail");

//跟团游购票 ===
Route::get('/goupiaolinelist',"goupiao\GoupiaolineController@indexlist");
Route::get('/goupiaolinelist2',"goupiao\GoupiaolineController@indexlist2");
Route::get('/goupiaolinedetail',"goupiao\GoupiaolineController@indexdetail");

//Route::get("/mm","admin\goupiao\GoupiaoController@aa");
//Route::get('/admin/login',"Admin\LoginController@login");

//显示景点详情页评论 ====
Route::get('/jingdianpinglun1',"jingdianpinglun\JingpingController@pinglun1");

//景点详情页点赞===
Route::get('/jingdiannum/{id}',"jingdianpinglun\JingpingController@jingdiannum");




//购票订单处理 ===
Route::group(['middleware'=>['order']],function(){
	//景点门票预定
	Route::get('/goupiaopay',"goupiao\GoupiaoController@indexpay");
	Route::post('/goupiaodopay',"goupiao\GoupiaoController@indexdopay");
	Route::get('/goupiaoorder',"goupiao\GoupiaoController@indexorder");
	Route::get('/goupiaoajax',"goupiao\GoupiaoController@indexajax");
	Route::get('/goupiaomail',"goupiao\GoupiaoController@indexsendmail");
	//酒店门票预定
	Route::get('/goupiaopayhotel',"goupiao\GoupiaohotelController@indexpay");
	Route::post('/goupiaodopayhotel',"goupiao\GoupiaohotelController@indexdopay");
	Route::get('/goupiaohotelmail',"goupiao\GoupiaohotelController@indexsendmail");
	//跟团游票预定
	Route::get('/goupiaopayline',"goupiao\GoupiaolineController@indexpay");
	Route::post('/goupiaodopayline',"goupiao\GoupiaolineController@indexdopay");
	Route::get('/goupiaolinemail',"goupiao\GoupiaolineController@indexsendmail");
	
	//评论处理
	Route::get('/jingdianpinglun',"jingdianpinglun\JingpingController@pinglun");
	
});

//景点列表页 ===
Route::get('/jingdianlist',"jingdian\JingdianController@indexlist");
Route::get('/jingdiandetail',"jingdian\JingdianController@indexdetail");

//个人中心的订单
Route::get('/centerorder',"goupiao\GoupiaoController@centerorder");
Route::get('/orderpay',"goupiao\GoupiaoController@orderpay");
Route::get('/orderpay1',"goupiao\GoupiaohotelController@orderpay");
Route::get('/orderpay2',"goupiao\GoupiaolineController@orderpay");



//周边信息 -- 
Route::get('/zhoubian/zhulist',"zhoubian\ZhuController@zhulist");
Route::get('/zhoubian/zhulists',"zhoubian\ZhuController@zhulists");
Route::get('/zhoubian/zhulistd',"zhoubian\ZhuController@zhulistd");
Route::get('/zhoubian/chilist',"zhoubian\ChiController@chilist");
Route::get('/zhoubian/chilists',"zhoubian\ChiController@chilists");
Route::get('/zhoubian/chilistd',"zhoubian\ChiController@chilistd");
Route::get('/zhoubian/wanlist',"zhoubian\WanController@wanlist");
Route::get('/zhoubian/wanlists',"zhoubian\WanController@wanlists");
Route::get('/zhoubian/wanlistd',"zhoubian\WanController@wanlistd");
Route::get('/zhoubian/zoulistd',"zhoubian\ZouController@zoulistd");
Route::get('/zhoubian/zoulist',"zhoubian\ZouController@zoulist");
Route::get('/zhoubian/mailists',"zhoubian\MaiController@mailists");
Route::get('/zhoubian/mailistd',"zhoubian\MaiController@mailistd");
Route::get('/zhoubian/mailist',"zhoubian\MaiController@mailist");
Route::get('/zhoubian/youlist',"zhoubian\YouController@youlist");
Route::get('/zhoubian/youlists',"zhoubian\YouController@youlists");
Route::get('/zhoubian/youlistd',"zhoubian\YouController@youlistd");
Route::get('/zhoubian/wanxiangqing/{id}',"zhoubian\WanController@wanxiangqing");
Route::get('/zhoubian/zhuxiangqing/{id}',"zhoubian\ZhuController@zhuxiangqing");
Route::get('/zhoubian/maixiangqing/{id}',"zhoubian\MaiController@maixiangqing");
Route::get('/zhoubian/chixiangqing/{id}',"zhoubian\ChiController@chixiangqing");
Route::get('/zhoubian/youxiangqing/{id}',"zhoubian\YouController@youxiangqing");
Route::get('/zhoubian/zouxiangqing/{id}',"zhoubian\ZouController@zouxiangqing");
Route::get('/zhoubian/jingdian/{id}',"zhoubian\YouController@jingdian");
Route::get('/zhoubian/pinglun',"zhoubian\PingController@pinglun");
Route::get('/admin/zhoubian/fankui',"admin\zhoubian\FkController@addfankui");

//互动论坛 ----

Route::get('/blog','Blog\BlogController@index');
Route::get('/blog/new','Blog\BlogController@news');
Route::get('/blog/hot','Blog\BlogController@hot');
Route::get('/blog_prise','Blog\BlogPriseController@stroe');
Route::get('/admin_blogp','Blog\BlogAdminController@index');
Route::get('/admin_delp/{id}','Blog\BlogAdminController@del');
Route::get('/admin_delc/{id}','Blog\BlogAdminController@delc');
Route::get('/admin_blogc','Blog\BlogAdminController@blogc');
Route::get('/admin_links','Blog\BlogAdminController@links');
Route::get('/admin_linkadd','Blog\BlogAdminController@linkadd');
Route::post('/link_doadd','Blog\BlogAdminController@linkdoadd');
Route::get('/links_edit/{id}','Blog\BlogAdminController@linkedit');
Route::post('/link_doedit','Blog\BlogAdminController@linkdoedit');
Route::get('/admin_dell/{id}','Blog\BlogAdminController@linkdel');
Route::get('/admin_blogpic','Blog\BlogAdminController@admin_blogpic');
Route::get('/blogpic_add','Blog\BlogAdminController@blogpic_add');
Route::post('/blogpic_doadd','Blog\BlogAdminController@blogpic_doadd');
Route::post('//blogpic_doedit','Blog\BlogAdminController@blogpic_doedit');
Route::get('/blog_delpic/{id}','Blog\BlogAdminController@delpic');
Route::get('/blogpic_edit/{id}','Blog\BlogAdminController@blogpic_edit');

Route::get('/xinwenhome','Web\NewslistController@index');
//登陆才能进入论坛----  
Route::group(['middleware'=>['login']],function(){
	Route::resource('/blog_work','blog\BlogController');
	Route::resource('/blog_comment','blog\BlogCommentController');
	Route::resource('blog_reply','blog\BlogReplyController');
	Route::get('/vita','Vita\VitaController@index');
	Route::get('/vita_post','Vita\VitaController@post');
	Route::get('/show_more{id}','Blog\BlogController@more');
});

//==============================================================================================后台路由
Route::group(['prefix'=>'admin','middleware'=>'myauth'], function (){
    //后台会员登陆退出模块--
    Route::resource('type', 'Admin\TypeController');//后台增删改页面
    Route::resource('users',"Admin\UserController");//后台增删改页面
    Route::resource('role', 'Admin\RoleController');//后台增删改页面
    Route::resource('node', 'Admin\NodeController');//后台增删改页面

    Route::get('users/loadRole/{uid}',"Admin\UserController@loadRole");
    Route::post('users/saveRole',"Admin\UserController@saveRole");
    
    Route::get('role/loadNode/{rid}',"Admin\RoleController@loadNode");
    Route::post('role/saveNode',"Admin\RoleController@saveNode");
	Route::get('/index',"Admin\IndexController@index");//加载后台主页面
    Route::get('/logout',"Admin\LoginController@logout");//执行后台退出页面
   

    //新闻动态
    Route::get('/xinwen','Admin\XinwenController@index');//浏览路由
    Route::delete('/xinwen/{id}','Admin\XinwenController@destroy');//删除路由
    Route::get('/xinwen/{id}/edit','Admin\XinwenController@edit');//加载修改表单路由
    Route::post('/abaw/{zz}','Admin\XinwenController@update');//执行修改路由
    Route::get('/abaw/add',"Admin\XinwenController@create");//加载添加路由
    Route::resource('abaw',"Admin\XinwenController");//执行添加路由
    //景区新闻-
    Route::get('/jingqu','Admin\JingquController@index');//浏览路由
    Route::delete('/jingqu/{id}','Admin\JingquController@destroy');//删除路由
    Route::get('/jingqu/{id}/edit','Admin\JingquController@edit');//加载修改表单路由
    Route::post('/init/{zz}','Admin\JingquController@update');//执行修改路由
    Route::get('/init/add',"Admin\JingquController@create");//加载添加路由
    Route::resource('init',"Admin\JingquController");//执行添加路由
    //本地新闻--
    Route::get('/bendi','Admin\BendiController@index');//浏览路由
    Route::delete('/bendi/{id}','Admin\BendiController@destroy');//删除路由
    Route::get('/bendi/{id}/edit','Admin\BendiController@edit');//加载修改表单路由
    Route::post('/get/{zz}','Admin\BendiController@update');//执行修改路由
    Route::get('/get/add',"Admin\BendiController@create");//加载添加路由
    Route::resource('get',"Admin\BendiController");//执行添加路由
	
	
	//后台管理前台  ======
	Route::get('/indexedit',"admin\qiantai\QiantaiController@index");
	Route::post('/indexdoedit',"admin\qiantai\QiantaiController@edit");
	Route::get('/indexlunbo',"admin\qiantai\QiantaiController@lunbo");
	Route::post('/indexlunboadd',"admin\qiantai\QiantaiController@lunboadd");
	Route::post('/indexlunboedit/{id}',"admin\qiantai\QiantaiController@lunboedit");
	Route::get('/indexlunbodelete/{id}',"admin\qiantai\QiantaiController@lunbodelete");
	Route::resource('/indexlive',"admin\qiantai\QiantailiveController");
	//后台订单管理
	Route::get('/order',"admin\order\OrderController@index");
	Route::get('/y_delete11',"admin\goupiao\GoupiaodeleteController@delete11");
	
	//后台风景类别管理 ==
	Route::resource('/jingdiantype',"admin\jingdian\TypeController");
	Route::get('/jingdiantype1',"admin\jingdian\TypeController@add");
	Route::get('/jingdiantype11',"admin\jingdian\TypeController@insert");
	Route::resource('/jingdiandetail',"admin\jingdian\GoodsController");
	Route::get('/y_delete10',"admin\goupiao\GoupiaodeleteController@delete10");
	
	
   //门票购票后台 ===
    Route::resource('/goupiao',"admin\goupiao\GoupiaoController");
    Route::get('/y_delete1',"admin\goupiao\GoupiaodeleteController@delete1");
    Route::resource('/goupiao1',"admin\goupiao\GoupiaoController1");
	Route::get('/y_delete2',"admin\goupiao\GoupiaodeleteController@delete2");
    Route::resource('/goupiaolist',"admin\goupiao\GoupiaoControllerlist");
	Route::get('/y_delete3',"admin\goupiao\GoupiaodeleteController@delete3");
    Route::resource('/goupiaodetail',"admin\goupiao\GoupiaoControllerdetail");
	Route::get('/y_delete4',"admin\goupiao\GoupiaodeleteController@delete4");
    Route::resource('/goupiaodetailpic',"admin\goupiao\GoupiaoControllerdetailpic");
	Route::get('/y_delete9',"admin\goupiao\GoupiaodeleteController@delete9");
   //酒店购票后台 ===
    Route::resource('/goupiaolisthotel',"admin\goupiao\GoupiaoControllerlisthotel");
	Route::get('/y_delete5',"admin\goupiao\GoupiaodeleteController@delete5");
    Route::resource('/goupiaodetailhotel',"admin\goupiao\GoupiaoControllerdetailhotel");
	Route::get('/y_delete6',"admin\goupiao\GoupiaodeleteController@delete6");
   //跟团游购票后台 ===
    Route::resource('/goupiaolistline',"admin\goupiao\GoupiaoControllerlistline");
	Route::get('/y_delete7',"admin\goupiao\GoupiaodeleteController@delete7");
    Route::resource('/goupiaodetailline',"admin\goupiao\GoupiaoControllerdetailline");
    Route::get('/y_delete8',"admin\goupiao\GoupiaodeleteController@delete8");
	
    //酒店管理

   //酒店管理...
    Route::get("zhoubian/zhu/index","Admin\zhoubian\ZhuController@index");
    Route::post('zhoubian/zhu/insert',"Admin\zhoubian\ZhuController@insert");
    Route::get("zhoubian/zhu/add","Admin\zhoubian\ZhuController@add");
    Route::get("zhoubian/zhu/delete/{id}","Admin\zhoubian\ZhuController@delete");
    Route::get("zhoubian/zhu/edit/{id}","Admin\zhoubian\ZhuController@edit");
    Route::post("zhoubian/zhu/update/{id?}","Admin\zhoubian\ZhuController@update");
    
    //餐饮商家管理...
    Route::get("zhoubian/chi/index","Admin\zhoubian\ChiController@index");
    Route::post('zhoubian/chi/insert',"Admin\zhoubian\ChiController@insert");
    Route::get("zhoubian/chi/add","Admin\zhoubian\ChiController@add");
    Route::get("zhoubian/chi/delete/{id}","Admin\zhoubian\ChiController@delete");
    Route::get("zhoubian/chi/edit/{id}","Admin\zhoubian\ChiController@edit");
    Route::post("zhoubian/chi/update/{id}","Admin\zhoubian\ChiController@update");
    
    //娱乐活动管理...
    Route::get("zhoubian/wan/index","Admin\zhoubian\WanController@index");
    Route::post('zhoubian/wan/insert',"Admin\zhoubian\WanController@insert");
    Route::get("zhoubian/wan/add","Admin\zhoubian\WanController@add");
    Route::get("zhoubian/wan/delete/{id}","Admin\zhoubian\WanController@delete");
    Route::get("zhoubian/wan/edit/{id}","Admin\zhoubian\WanController@edit");
    Route::post("zhoubian/wan/update/{id}","Admin\zhoubian\WanController@update");
    
    //特产管理....
    Route::get("zhoubian/mai/index","Admin\zhoubian\MaiController@index");
    Route::post('zhoubian/mai/insert',"Admin\zhoubian\MaiController@insert");
    Route::get("zhoubian/mai/add","Admin\zhoubian\MaiController@add");
    Route::get("zhoubian/mai/delete/{id}","Admin\zhoubian\MaiController@delete");
    Route::get("zhoubian/mai/edit/{id}","Admin\zhoubian\MaiController@edit");
    Route::post("zhoubian/mai/update/{id}","Admin\zhoubian\MaiController@update");
    
    //交通信息管理...
    
    Route::get("zhoubian/zou/index","Admin\zhoubian\ZouController@index");
    Route::post('zhoubian/zou/insert',"Admin\zhoubian\ZouController@insert");
    Route::get("zhoubian/zou/add","Admin\zhoubian\ZouController@add");
    Route::get("zhoubian/zou/delete/{id}","Admin\zhoubian\ZouController@delete");
    Route::get("zhoubian/zou/edit/{id}","Admin\zhoubian\ZouController@edit");
    Route::post("zhoubian/zou/update/{id}","Admin\zhoubian\ZouController@update");
    
    //经典路线类别管理...
    
    Route::get("zhoubian/you_type/index","Admin\zhoubian\You_typeController@index");
    Route::post('zhoubian/you_type/insert',"Admin\zhoubian\You_typeController@insert");
    Route::get("zhoubian/you_type/add","Admin\zhoubian\You_typeController@add");
    Route::get("zhoubian/you_type/delete/{id}","Admin\zhoubian\You_typeController@delete");
    Route::get("zhoubian/you_type/edit/{id}","Admin\zhoubian\You_typeController@edit");
    Route::post("zhoubian/you_type/update/{id}","Admin\zhoubian\You_typeController@update");
    
    //经典路线类别管理...
    
    Route::get("zhoubian/you/index","Admin\zhoubian\YouController@index");
    Route::post('zhoubian/you/insert',"Admin\zhoubian\YouController@insert");
    Route::get("zhoubian/you/add","Admin\zhoubian\YouController@add");
    Route::get("zhoubian/you/delete/{id}","Admin\zhoubian\YouController@delete");
    Route::get("zhoubian/you/edit/{id}","Admin\zhoubian\YouController@edit");
    Route::post("zhoubian/you/update/{id}","Admin\zhoubian\YouController@update");
    
    //信息反馈----
    Route::get('zhoubian/ckfankui',"admin\zhoubian\FkController@fankui");
    Route::get('zhoubian/ckfankui/edit/{id}',"admin\zhoubian\FkController@edit");
    Route::post('zhoubian/ckfankui/update/{id}',"admin\zhoubian\FkController@update");
    
    Route::get('zhoubian/biao',"admin\zhoubian\BiaoController@index");
    //轮播图管理
    Route::get('zhoubian/lb/index/',"admin\zhoubian\LunboController@lunbo");
    Route::get('zhoubian/lb/edit/{id?}',"admin\zhoubian\LunboController@edit");
    Route::get('zhoubian/lb/add/',"admin\zhoubian\LunboController@add");
    Route::post("zhoubian/lb/insert/","admin\zhoubian\LunboController@insert");
    Route::post("zhoubian/lb/update/{id?}","admin\zhoubian\LunboController@update");
    
    //富文本编辑器
    Route::post('/zhoubian/zbupload',"Admin\zhoubian\ZbController@upload");
});

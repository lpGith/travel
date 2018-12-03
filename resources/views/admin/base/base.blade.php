<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Simple Tables</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="{{asset('admins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="{{asset('admins/bootstrap/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="{{asset('admins/bootstrap/css/ionicons.min.css')}}" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="{{asset('admins/dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="{{asset('admins/dist/css/skins/_all-skins.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('admins/style/css/ch-ui.admin.css')}}">
    <link rel="stylesheet" href="{{asset('admins/style/font/css/font-awesome.min.css')}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="{{asset('admins/bootstrap/js/html5shiv.min.js')}}"></script>
        <script src="{{asset('admins/bootstrap/js/respond.min.js')}}"></script>
    <![endif]-->
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      
       <header class="main-header">
        <!-- Logo -->
        <a href="/admin/index" class="logo">
          <!-- 对于侧边栏迷你50x50像素迷你标志 -->
          <span class="logo-mini"><b>X</b>DL</span>
          <!-- 正常状态和移动设备标识 -->
          <span class="logo-lg">网站后台管理</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">切换导航</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">你有4条短信</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="{{asset('admins/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image"/>
                          </div>
                          <h4>
                            支持团队
                            <small><i class="fa fa-clock-o"></i> 5分钟</small>
                          </h4>
                          <p>为什么不买一个新的令人敬畏的主题？</p>
                        </a>
                      </li><!-- end message -->
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="{{asset('admins/dist/img/user3-128x128.jpg')}}" class="img-circle" alt="user image"/>
                          </div>
                          <h4>
                            AdminLTE 设计团队
                            <small><i class="fa fa-clock-o"></i> 2小时</small>
                          </h4>
                          <p>为什么不买一个新的令人敬畏的主题？</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="{{asset('admins/dist/img/user4-128x128.jpg')}}" class="img-circle" alt="user image"/>
                          </div>
                          <h4>
                            开发商
                            <small><i class="fa fa-clock-o"></i> 今天</small>
                          </h4>
                          <p>为什么不买一个新的令人敬畏的主题？</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="{{asset('admins/dist/img/user3-128x128.jpg')}}" class="img-circle" alt="user image"/>
                          </div>
                          <h4>
                            卖场部
                            <small><i class="fa fa-clock-o"></i> 昨天</small>
                          </h4>
                          <p>为什么不买一个新的令人敬畏的主题？</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="{{asset('admins/dist/img/user4-128x128.jpg')}}" class="img-circle" alt="user image"/>
                          </div>
                          <h4>
                            审稿人
                            <small><i class="fa fa-clock-o"></i>2天</small>
                          </h4>
                          <p>为什么不买一个新的令人敬畏的主题？</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">看到所有的消息</a></li>
                </ul>
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">你有10的通知</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5名新成员加入了今天
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-warning text-yellow"></i> 很长的描述，可能不适合页面，可能导致设计问题
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-red"></i> 5名新成员加入
                        </a>
                      </li>

                      <li>
                        <a href="#">
                          <i class="fa fa-shopping-cart text-green"></i> 25的盐。
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-user text-red"></i> 你改变你的用户名
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">查看所有</a></li>
                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">你有9个任务</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            设计一些按钮
                            <small class="pull-right">20%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% 完成</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            创造一个好的主题
                            <small class="pull-right">40%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">40% 完成</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            有些任务需要我去做
                            <small class="pull-right">60%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">60% 完成</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                           让美丽的转变
                            <small class="pull-right">80%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">80% 完成</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">查看所有任务</a>
                  </li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{asset('admins/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image"/>
                  <span class="hidden-xs">{{session("adminuser")->name}}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="{{asset('admins/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
                    <p>
                    {{session("adminuser")->name}}--{{session("adminuser")->email}}

                      <small>会员于2012-11</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">追随者</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">销售</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">朋友</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">简介</a>
                    </div>
                    <div class="pull-right">
                      <a href="{{URL('admin/logout')}}" class="btn btn-default btn-flat">退出</a>
                    </div>
                  </li>
                </ul>
              </li>
             
            </ul>
          </div>
        </nav>
      </header>
      
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{asset('admins/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>{{session("adminuser")->name}}</p>

              <a href="{{URL('admin/logout')}}"><i class="fa fa-circle text-success"></i> 退出</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">主导航</li>
            <li class=" treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>用户信息管理</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="{{URL('/Web/')}}"><i class="fa fa-circle-o"></i> 浏览用户信息</a></li>
              </ul>
            </li>
            <li class=" treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>后台管理员</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="{{URL('admin/users')}}"><i class="fa fa-circle-o"></i> 管理员信息</a></li>
                <li><a href="{{URL('admin/users/create')}}"><i class="fa fa-circle-o"></i> 添加管理员</a></li>
                <li><a href="{{URL('admin/role')}}"><i class="fa fa-circle-o"></i> 角色管理</a></li>
                <li><a href="{{URL('admin/node')}}"><i class="fa fa-circle-o"></i> 节点管理</a></li>
              </ul>
            </li>
			<li class=" treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>前台管理</span>
                <span class="label label-primary pull-right">1</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{URL('/admin/indexedit')}}"><i class="fa fa-circle-o"></i>修改主页展示</a></li>         
                <li><a href="{{URL('/admin/indexlunbo')}}"><i class="fa fa-circle-o"></i>修改主页轮播图片及文字展示</a></li>         
                <li><a href="{{URL('/admin/indexlive')}}"><i class="fa fa-circle-o"></i>修改主页张家界生活展示</a></li>         
             </ul> 
            </li>
			<li class=" treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>风景类别</span>
                <span class="label label-primary pull-right">6</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{URL('/admin/jingdiantype')}}"><i class="fa fa-circle-o"></i>风景景点分类</a></li>
                <li><a href="{{URL('/admin/jingdiantype/create')}}"><i class="fa fa-circle-o"></i> 添加父类id</a></li>
               
             </ul> 
            </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>景点详情</span>
                <span class="label label-primary pull-right">6</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{URL('/admin/jingdiandetail')}}"><i class="fa fa-circle-o"></i>景点详情浏览</a></li>
                <li><a href="{{URL('/admin/jingdiandetail/create')}}"><i class="fa fa-circle-o"></i> 景点详情添加</a></li>
               
             </ul> 
            </li>
			<li class=" treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>订单管理</span>
                <span class="label label-primary pull-right">6</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{URL('/admin/order')}}"><i class="fa fa-circle-o"></i>浏览订单</a></li>
               
             </ul> 
            </li>
			
			<li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>论坛管理</span>
                <span class="label label-primary pull-right">4</span>
              </a>
              <ul class="treeview-menu">
               <li><a href="{{URL('/admin_blogp')}}"><i class="fa fa-circle-o"></i>查看贴子</a></li>
                <li><a href="{{URL('/admin_blogc')}}"><i class="fa fa-circle-o"></i>查看评论</a></li>
                <li><a href="{{URL('/admin_links')}}"><i class="fa fa-circle-o"></i>友情链接</a></li>
                <li><a href="{{URL('/admin_blogpic')}}"><i class="fa fa-circle-o"></i>图片轮播管理</a></li>
              </ul> 
            </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i> <span>购票系统管理</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
             
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> 跟团游购票系统管理<i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="{{URL('/admin/goupiaolistline')}}"><i class="fa fa-circle-o"></i> 跟团游列表页购票</a></li>
					<li><a href="{{URL('/admin/goupiaolistline/create')}}"><i class="fa fa-circle-o"></i> 跟团游列表页购票添加</a></li>
					<li><a href="{{URL('/admin/goupiaodetailline')}}"><i class="fa fa-circle-o"></i> 跟团游详情页购票浏览</a></li>
					<li><a href="{{URL('/admin/goupiaodetailline/create')}}"><i class="fa fa-circle-o"></i> 跟团游详情页购票添加</a></li>
                  </ul>
                </li>
               <li>
                  <a href="#"><i class="fa fa-circle-o"></i> 景点门票购票系统管理<i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
					    <li><a href="{{URL('/admin/goupiao')}}"><i class="fa fa-circle-o"></i> 主页购票广告链接浏览</a></li>        
						<li><a href="{{URL('/admin/goupiao1')}}"><i class="fa fa-circle-o"></i> 主页购票图片浏览</a></li>
						<li><a href="{{URL('/admin/goupiaolist')}}"><i class="fa fa-circle-o"></i> 列表页购票</a></li>
						<li><a href="{{URL('/admin/goupiaodetail')}}"><i class="fa fa-circle-o"></i> 详情页购票浏览</a></li>
						<li><a href="{{URL('/admin/goupiaodetailpic')}}"><i class="fa fa-circle-o"></i> 详情页图片</a></li>
                  </ul>
                </li>
				<li>
                  <a href="#"><i class="fa fa-circle-o"></i> 酒店购票系统管理<i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
					<li><a href="{{URL('/admin/goupiaolisthotel')}}"><i class="fa fa-circle-o"></i> 酒店列表页购票</a></li>
					<li><a href="{{URL('/admin/goupiaolisthotel/create')}}"><i class="fa fa-circle-o"></i> 酒店列表页购票添加</a></li>
					<li><a href="{{URL('/admin/goupiaodetailhotel')}}"><i class="fa fa-circle-o"></i> 酒店详情页购票浏览</a></li>
					<li><a href="{{URL('/admin/goupiaodetailhotel/create')}}"><i class="fa fa-circle-o"></i> 酒店详情页购票添加</a></li>
				  </ul>
                </li>
              </ul>
            </li>
		   
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>周边信息管理</span>
                <span class="label label-primary pull-right">6</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{URL('/admin/zhoubian/zhu/index')}}"><i class="fa fa-circle-o"></i> 酒店管理</a></li>
                <li><a href="{{URL('/admin/zhoubian/chi/index')}}"><i class="fa fa-circle-o"></i> 餐饮商家管理</a></li>
                <li><a href="{{URL('/admin/zhoubian/mai/index')}}"><i class="fa fa-circle-o"></i> 特产推荐管理</a></li>
                <li><a href="{{URL('/admin/zhoubian/zou/index')}}"><i class="fa fa-circle-o"></i> 出行指南管理</a></li>
                <li><a href="{{URL('/admin/zhoubian/wan/index')}}"><i class="fa fa-circle-o"></i> 娱乐活动管理</a></li>
                <li><a href="{{URL('/admin/zhoubian/you_type/index')}}"><i class="fa fa-circle-o"></i> 经典路线管理</a></li>
                <li><a href="{{URL('/admin/zhoubian/you/index')}}"><i class="fa fa-circle-o"></i> 经典路线详情</a></li>
                <li><a href="{{URL('/admin/zhoubian/ckfankui')}}"><i class="fa fa-circle-o"></i> 信息反馈处理</a></li>
                <li><a href="{{URL('/admin/zhoubian/lb/index')}}"><i class="fa fa-circle-o"></i> 轮播图管理</a></li>
              </ul> 
            </li>
			
			<li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span></span>旅游咨询<i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="{{URL('/admin/abaw/add')}}"><i class="fa fa-circle-o"></i>添加新闻动态</a></li>
                <li class="active"><a href="{{URL('/admin/abaw/')}}"><i class="fa fa-circle-o"></i>浏览新闻动态</a></li>
                <li class="active"><a href="{{URL('/admin/init/add')}}"><i class="fa fa-circle-o"></i>添加景区动态</a></li>
                <li class="active"><a href="{{URL('/admin/init/')}}"><i class="fa fa-circle-o"></i>浏览景区动态</a></li>
                <li class="active"><a href="{{URL('/admin/get/add')}}"><i class="fa fa-circle-o"></i>添加本地动态</a></li>
                <li class="active"><a href="{{URL('/admin/get/')}}"><i class="fa fa-circle-o"></i>浏览本地动态</a></li>
              </ul>
            </li>
 
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        @yield('content')
        
      </div><!-- /.content-wrapper -->
      
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2016 <a href="http://yixiang.co">意象工作室</a>.</strong> All rights reserved.
      </footer>
      
      
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class='control-sidebar-bg'></div>
    </div><!-- ./wrapper -->
    
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('admins/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{asset('admins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>    
     <!-- xdl-model提示框模板 -->
    <div id="xdl-alert" class="modal">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <h5 class="modal-title"><i class="fa fa-exclamation-circle"></i> [Title]</h5>
          </div>
          <div class="modal-body small">
            <p>[Message]</p>
          </div>
          <div class="modal-footer" >
            <button type="button" class="btn btn-primary ok" data-dismiss="modal">[BtnOk]</button>
            <button type="button" class="btn btn-default cancel" data-dismiss="modal">[BtnCancel]</button>
          </div>
        </div>
      </div>
    </div>
    <!-- xdl-model-end -->
	
    <!-- Slimscroll -->
    <script src="{{asset('admins/plugins/slimScroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="{{asset('admins/plugins/fastclick/fastclick.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('admins/dist/js/app.min.js')}}" type="text/javascript"></script>    
	<!-- XDL-model-提示框 -->
    <script src="{{asset('admins/bootstrap/js/xdl-modal-alert-confirm.js')}}" type="text/javascript"></script>
	@if(session("err"))
        <script type="text/javascript">
            Modal.alert({msg: "{{session('err')}}",title: ' 信息提示',btnok: '确定',btncl:'取消'});
        </script>
    @endif

    <!-- AdminLTE 用于演示目的 -->
    <script src="{{asset('admins/dist/js/demo.js')}}" type="text/javascript"></script>
	@section('bianji')
	@show
	
  </body>
</html>

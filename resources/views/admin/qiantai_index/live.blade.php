@extends('admin.base.base')


@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
          <h1>
            信息输出表
            <small>preview of simple tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页生活控制表</a></li>
            <li><a href="#">生活信息</a></li>
            <li class="active">列表</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                   <div class="col-sm-9"><h3 class="box-title"><i class="fa fa-th"></i> 前台首页生活信息管理</h3></div>
			
				  <!-- 添加表单 -->
				  <div class="col-sm-3"><i class="fa fa-fw fa-plus-square"></i><button type="button" class="btn btn-flat btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">添加购票项目信息</button></div>
				
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<center><h2 class="btn  btn-info" id="exampleModalLabel"><b>前台首页生活信息管理</b></h2></center>
					  </div>
					  <div class="modal-body">
				  <form class="form-horizontal" action="{{URL('/admin/indexlive')}}" method="post" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
					  <div class="box-body">
						<div class="form-group">
						  <label for="inputPassword3" class="col-sm-2 control-label">主题名</label>
						  <div class="col-sm-4">
							<input type="text" name="live_name" class="form-control" id="inputPassword3" placeholder="主题名">
						  </div>
						</div>
						
						<div class="form-group">
						  <label for="inputEmail3" class="col-sm-2 control-label">图片</label>
						  <div class="col-sm-4">                        
							<input type="file" name="live_picname" class="form-control" id="inputPassword3" placeholder="图片">
						  </div>
						</div>
						
						<div class="form-group">
						  <label for="inputPassword3" class="col-sm-2 control-label">标题</label>
						  <div class="col-sm-4">
							<input type="text" name="live_title" class="form-control" id="inputPassword3" placeholder="标题">
						  </div>
						</div>
						<div class="form-group">
						  <label for="inputPassword3" class="col-sm-2 control-label">内容</label>
						  <div class="col-sm-4">
							<textarea type="text" name="live_content" class="form-control" id="inputPassword3" >内容</textarea>
						  </div>
						</div>
						<div class="form-group">
						  <label for="inputPassword3" class="col-sm-2 control-label">路径</label>
						  <div class="col-sm-4">
							<input type="text" name="live_href" class="form-control" id="inputPassword3" placeholder="路径" >
						  </div>
						</div>
					  </div>
					  <div class="box-footer">
					   <div class="col-sm-offset-2 col-sm-2">
							<input type="submit" class="btn  btn-primary" value="添加">
						</div>
						<div class="col-sm-2">
							<input type="submit" class="btn  btn-primary" value="重置">
						</div>
					  </div>
					</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-flat btn-danger" data-dismiss="modal">关闭</button>
					</div>
					</div>
					</div>
				</div>
				<!-- 添加表单结束 -->
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width:60px">id号</th>
                      <th>主题名</th>
                      <th>图片</th> 
                      <th>标题</th> 
                      <th>内容</th> 
                      <th>路径</th> 
                      <th style="width: 100px">操作</th>
                    </tr> 
					@foreach ($list as $xx)					
                    <tr>
                        <td>{{$xx->id}}</td>
                        <td>{{$xx->live_name}}</td>
                        <td><img src="/admins/uploads/s_{{$xx->live_picname}}"></td>
                        <td>{{$xx->live_title}}</td>
                        <td>{{$xx->live_content}}</td>
                        <td>{{$xx->live_href}}</td>
                        <td>
						   <a href="#"><button class="btn btn-xs btn-danger" onclick="doDel({{ $xx->id }})">删除</button></a>
                           <a href='/admin/indexlive/{{$xx->id}}/edit'><button class="lunbo_edit btn btn-xs btn-primary">编辑</button></a>
                        </td>
                    </tr>
					@endforeach	
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col --> 
          </div><!-- /.row -->
        </section><!-- /.content -->
		  <form action="" method="post" name="myform" style="display:none;">
		    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
			<input type="hidden" name="_method" value="delete">
		  </form>
       <script type="text/javascript" src="{{asset('./goupiaos1/jquery-1.11.3.min.js')}}"></script>
        <script type="text/javascript">
		
		function doDel(id){
            Modal.confirm({msg:"是否删除信息?"}).on(function(e){
              if(e){
                var form = document.myform;
                form.action = "{{URL('/admin/indexlive')}}/"+id;
                form.submit();
              }
            });
          }	
		</script>
    @endsection
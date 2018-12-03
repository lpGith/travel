@extends('admin.base.base')


@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
          <h1>
            信息输出表
            <small>preview of simple tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">购票图片信息</a></li>
            <li class="active">列表</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <div class="col-sm-9"><h3 class="box-title"><i class="fa fa-th"></i> 购票详情信息管理</h3></div>
				  <div class="col-sm-3"><i class="fa fa-fw fa-plus-square"></i><button type="button" class="btn btn-flat btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">添加购票项目信息</button></div>
				
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<center><h2 class="btn  btn-info" id="exampleModalLabel"><b>购票详情页添加表</b></h2></center>
					  </div>
					  <div class="modal-body">
						  <form class="form-horizontal" action="{{URL('/admin/goupiaodetail')}}" method="post" enctype="multipart/form-data">
							<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
							  <div class="box-body">
								<div class="form-group">
								  <label for="inputEmail3" class="col-sm-2 control-label">typeid</label>
								  <div class="col-sm-4">                        
									<select name="detail_typeid" class="form-control" id="inputEmail3">
									@foreach($data as $yy)
										<option value="{{$yy->id}}">{{$yy->list_name}}</option>
									@endforeach
									</select>
								  </div>
								</div>
								<div class="form-group">
								  <label for="inputPassword3" class="col-sm-2 control-label">预定须知</label>
								  <div class="col-sm-4">
									<textarea type="text" name="detail_xuzhi" class="form-control" id="inputPassword3" placeholder="预定须知"></textarea>
								  </div>
								</div>
								<div class="form-group">
								  <label for="inputPassword3" class="col-sm-2 control-label">景区介绍</label>
								  <div class="col-sm-4">
									<input type="text" name="detail_jieshao" class="form-control" id="inputPassword3" placeholder="景区介绍">
								  </div>
								</div>
								<div class="form-group">
								  <label for="inputPassword3" class="col-sm-2 control-label">景区介绍1</label>
								  <div class="col-sm-4">
									<input type="text" name="detail_jieshao1" class="form-control" id="inputPassword3" placeholder="景区介绍1">
								  </div>
								</div>
								<div class="form-group">
								  <label for="inputPassword3" class="col-sm-2 control-label">图1</label>
								  <div class="col-sm-4">
									<input type="file" name="detail_picname1" class="form-control" id="inputPassword3" placeholder="图1">
								  </div>
								</div>
								<div class="form-group">
								  <label for="inputPassword3" class="col-sm-2 control-label">图2</label>
								  <div class="col-sm-4">
									<input type="file" name="detail_picname2" class="form-control" id="inputPassword3" placeholder="图2">
								  </div>
								</div>
								<div class="form-group">
								  <label for="inputPassword3" class="col-sm-2 control-label">图3</label>
								  <div class="col-sm-4">
									<input type="file" name="detail_picname3" class="form-control" id="inputPassword3" placeholder="图3">
								  </div>
								</div>
								<div class="form-group">
								  <label for="inputPassword3" class="col-sm-2 control-label">图4</label>
								  <div class="col-sm-4">
									<input type="file" name="detail_picname4" class="form-control" id="inputPassword3" placeholder="图4">
								  </div>
								</div>
								<div class="form-group">
								  <label for="inputPassword3" class="col-sm-2 control-label">图5</label>
								  <div class="col-sm-4">
									<input type="file" name="detail_picname5" class="form-control" id="inputPassword3" placeholder="图5">
								  </div>
								</div>
								<div class="form-group">
								  <label for="inputPassword3" class="col-sm-2 control-label">图6</label>
								  <div class="col-sm-4">
									<input type="file" name="detail_picname6" class="form-control" id="inputPassword3" placeholder="图6">
								  </div>
								</div>
							  </div><!-- /.box-body -->
							  <div class="box-footer">
								<div class="col-sm-offset-2 col-sm-2">
									<input type="submit" class="btn  btn-primary" value="添加">
								</div>
								<div class="col-sm-2">
									<input type="submit" class="btn  btn-primary" value="重置">
								</div>
							  </div><!-- /.box-footer -->
							</form>
							</div>
							<div class="modal-footer">
							<button type="button" class="btn btn-flat btn-danger" data-dismiss="modal">关闭</button>
							</div>
						</div>
					</div>
				</div>
				
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width:60px">id号</th>
                      <th>typeid</th>
                      <th>预定须知</th>
                      <th>景区介绍</th>
                      <th>景区介绍1</th>
                      <th>图1</th>                      
                      <th>图2</th>
                      <th>图3</th>
                      <th>图4</th>
                      <th>图5</th>
                      <th>图6</th>
                      <th style="width: 100px">操作</th>
                    </tr> 
					@foreach ($list as $xx)
                    <tr>
                        <td>{{$xx->id}}</td>
                        <td>{{$xx->detail_typeid}}</td>
                        <td title="{{$xx->detail_xuzhi}}">{{mb_strcut($xx->detail_xuzhi,0,10)}}...</td>
                        <td title="{{$xx->detail_jieshao}}">{{mb_strcut($xx->detail_jieshao,0,10)}}...</td>
                        <td title="{{$xx->detail_jieshao1}}">{{mb_strcut($xx->detail_jieshao1,0,10)}}...</td>
                        <td><img src="/admins/uploads/s_{{$xx->detail_picname1}}"</td>
                        <td><img src="/admins/uploads/s_{{$xx->detail_picname2}}"/></td>
                        <td><img src="/admins/uploads/s_{{$xx->detail_picname3}}"</td>                      
                        <td><img src="/admins/uploads/s_{{$xx->detail_picname4}}"</td>                      
                        <td><img src="/admins/uploads/s_{{$xx->detail_picname5}}"</td>                      
                        <td><img src="/admins/uploads/s_{{$xx->detail_picname6}}"</td>                      
                        <td>
                            <a href="/admin/y_delete4?id={{$xx->id}}"><button class="btn btn-xs btn-danger">删除</button></a>
                             <a href="/admin/goupiaodetail/{{$xx->id}}/edit"><button class="btn btn-xs btn-primary">编辑</button></a>
                        </td>
                    </tr>
					@endforeach  
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                 
                </div>
              </div><!-- /.box -->

            </div><!-- /.col --> 
          </div><!-- /.row -->
        </section><!-- /.content -->
        
    @endsection
	
	
 
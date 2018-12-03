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
            <li><a href="#">酒店购票图片信息</a></li>
            <li class="active">添加详情页</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <div class="col-sm-9"><h3 class="box-title"><i class="fa fa-th"></i> 酒店购票详情信息管理</h3></div>
				  <div class="col-sm-3"><i class="fa fa-fw fa-plus-square"></i><button type="button" class="btn btn-flat btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">添加购票项目信息</button></div>
				
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<center><h2 class="btn  btn-info" id="exampleModalLabel"><b>酒店订票详情添加表</b></h2></center>
					  </div>
					  <div class="modal-body">
						  <form class="form-horizontal" action="{{URL('/admin/goupiaodetailhotel')}}" method="post" enctype="multipart/form-data">
							<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
							  <div class="box-body">
								<div class="form-group">
								  <label for="inputEmail3" class="col-sm-2 control-label">typeid</label>
								  <div class="col-sm-4">                        
									<select name="jiugoudetail_typeid" class="form-control" id="inputEmail3">
										@foreach($list as $yy)
										<option value="{{$yy->id}}">{{$yy->jiugou_name}}</option>
										@endforeach
									</select>
								  </div>
								</div>
								<div class="form-group">
								  <label for="inputPassword3" class="col-sm-2 control-label">早餐</label>
								  <div class="col-sm-4">
									<input type="text" name="jiugoudetail_zaocan" class="form-control" id="inputPassword3" placeholder="早餐">
								  </div>
								</div>
								<div class="form-group">
								  <label for="inputPassword3" class="col-sm-2 control-label">宽带</label>
								  <div class="col-sm-4">
									<input type="text" name="jiugoudetail_kuandai" class="form-control" id="inputPassword3" placeholder="宽带">
								  </div>
								</div>
								<div class="form-group">
								  <label for="inputPassword3" class="col-sm-2 control-label">政策</label>
								  <div class="col-sm-4">
									<input type="text" name="jiugoudetail_zhengce" class="form-control" id="inputPassword3" placeholder="政策">
								  </div>
								</div>
								<div class="form-group">
								  <label for="inputPassword3" class="col-sm-2 control-label">介绍</label>
								  <div class="col-sm-4">
									<textarea type="file" name="jiugoudetail_jieshao" class="form-control" id="inputPassword3" placeholder="介绍"></textarea>
								  </div>
								</div>
								<div class="form-group">
								  <label for="inputPassword3" class="col-sm-2 control-label">设施</label>
								  <div class="col-sm-4">
									<textarea type="text" name="jiugoudetail_sheshi" class="form-control" id="inputPassword3" placeholder="设施"></textarea>
								  </div>
								</div>
								<div class="form-group">
								  <label for="inputPassword3" class="col-sm-2 control-label">图1</label>
								  <div class="col-sm-4">
									<input type="file" name="jiugoudetail_picname1" class="form-control" id="inputPassword3" placeholder="图1">
								  </div>
								</div>
								<div class="form-group">
								  <label for="inputPassword3" class="col-sm-2 control-label">图2</label>
								  <div class="col-sm-4">
									<input type="file" name="jiugoudetail_picname2" class="form-control" id="inputPassword3" placeholder="图2">
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
				<form action="/admin/goupiaodetailhotel" method="get" class="form-inline">
					酒店设施:<input type="text" class="form-control" name="jiugoudetail_sheshi" /> 
					<input type="submit" class="btn btn-large btn-primary" value="搜索"/>
					<input type="button" onclick="window.location='/admin/goupiaodetailhotel'" class="btn btn-flat btn-primary" value="显示全部"/>
				</form>
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width:60px">id号</th>
                      <th>typeid</th>
                      <th>早餐</th>
                      <th>宽带</th>
                      <th>政策</th>
                      <th>介绍</th>                      
                      <th>设施</th>
                      <th>图1</th>
                      <th>图2</th>                    
                      <th style="width: 100px">操作</th>
                    </tr> 
					@foreach ($data as $xx)
                    <tr>
                        <td>{{$xx->id}}</td>
                        <td>{{$xx->jiugoudetail_typeid}}</td>
                        <td>{{$xx->jiugoudetail_zaocan}}</td>
                        <td>{{$xx->jiugoudetail_kuandai}}</td>
                        <td>{{$xx->jiugoudetail_zhengce}}</td>
                        <td title="{{$xx->jiugoudetail_jieshao}}">{{mb_strcut($xx->jiugoudetail_jieshao,0,10)}}...</td>
                        <td title="{{$xx->jiugoudetail_sheshi}}">{{mb_strcut($xx->jiugoudetail_sheshi,0,10)}}...</td>                       
                        <td><img src="/admins/uploads/s_{{$xx->jiugoudetail_picname1}}"></td>
                        <td><img src="/admins/uploads/s_{{$xx->jiugoudetail_picname2}}"/></td>             
                        <td>
                             <a href="/admin/y_delete6?id={{$xx->id}}"><button class="btn btn-xs btn-danger">删除</button></a>
                            <a href="/admin/goupiaodetailhotel/{{$xx->id}}/edit"><button class="btn btn-xs btn-primary">编辑</button></a>
                        </td>
                    </tr>
					@endforeach  
                  </table>
				   {!! $data->appends($where)->render() !!}
                </div><!-- /.box-body -->
               
              </div><!-- /.box -->

            </div><!-- /.col --> 
          </div><!-- /.row -->
        </section><!-- /.content -->
        
    @endsection
	
	
 